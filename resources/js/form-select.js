// JS puro (sem Alpine) para o <x-forms.select> na variante customizada.
//
// Por quê: o Livewire prefere preservar o mesmo nó do DOM entre re-renders
// (morph). Qualquer estado JS "congelado" na inicialização de um elemento
// (como a lista de opções de um x-data do Alpine) fica desatualizado quando
// o servidor recalcula opções diferentes depois — e é exatamente esse tipo
// de bug que causava o select de Tipo mostrar o rótulo errado após trocar o
// valor. Aqui não existe nenhum estado cacheado: os rótulos e as opções
// exibidas são sempre lidos direto do DOM (que o Blade recalcula a cada
// request), então não há nada para "congelar". A única interação client-side
// é delegada em `document`, então também não depende de nenhuma inicialização
// por elemento — funciona igual antes ou depois de qualquer morph.

function getRoot(el) {
    return el.closest('[data-select]');
}

function isMultiple(root) {
    return root.getAttribute('data-select-multiple') === '1';
}

function isSearchable(root) {
    return root.getAttribute('data-select-searchable') === '1';
}

function isDisabledOrReadonly(root) {
    return root.getAttribute('data-select-disabled') === '1' || root.getAttribute('data-select-readonly') === '1';
}

function getTrigger(root) {
    return root.querySelector('[data-select-trigger]');
}

function getMenu(root) {
    return root.querySelector('[data-select-menu]');
}

function getModelInput(root) {
    return root.querySelector('[data-select-model]');
}

function getSearchInput(root) {
    return root.querySelector('[data-select-search]');
}

function getOptions(root) {
    return Array.from(root.querySelectorAll('[data-select-option]'));
}

function getVisibleOptions(root) {
    return getOptions(root).filter((opt) => opt.style.display !== 'none' && ! opt.disabled);
}

function getSelectedValues(root) {
    return getOptions(root)
        .filter((opt) => opt.getAttribute('aria-selected') === 'true')
        .map((opt) => opt.dataset.value);
}

function optionLabel(optionEl) {
    const span = optionEl.querySelector('[data-select-option-label]');

    return span ? span.textContent.trim() : (optionEl.dataset.value ?? '');
}

function isOpen(root) {
    const menu = getMenu(root);

    return menu ? ! menu.classList.contains('hidden') : false;
}

function positionMenu(root) {
    const trigger = getTrigger(root);
    const menu = getMenu(root);

    if (! trigger || ! menu) {
        return;
    }

    const gap = 6;
    const vw = window.innerWidth;
    const vh = window.innerHeight;

    menu.style.visibility = 'hidden';
    menu.style.top = '0px';
    menu.style.bottom = '';
    menu.style.left = '0px';

    const rect = trigger.getBoundingClientRect();
    const width = Math.max(rect.width, 180);
    menu.style.width = width + 'px';

    const menuRect = menu.getBoundingClientRect();
    const spaceBelow = vh - rect.bottom;
    const placeUp = spaceBelow < menuRect.height + gap && rect.top > spaceBelow;
    const left = Math.max(8, Math.min(rect.left, vw - width - 8));

    menu.style.left = left + 'px';

    if (placeUp) {
        menu.style.bottom = (vh - rect.top + gap) + 'px';
    } else {
        menu.style.top = (rect.bottom + gap) + 'px';
    }

    menu.style.visibility = '';
}

function clearActive(root) {
    getOptions(root).forEach((opt) => opt.classList.remove('bg-muted'));
}

function setActive(root, optionEl) {
    clearActive(root);

    if (optionEl) {
        optionEl.classList.add('bg-muted');
        optionEl.scrollIntoView({ block: 'nearest' });
    }
}

function highlightSelectedOrFirst(root) {
    const visible = getVisibleOptions(root);
    const selected = visible.find((opt) => opt.getAttribute('aria-selected') === 'true');
    setActive(root, selected || visible[0] || null);
}

function moveActive(root, delta) {
    const visible = getVisibleOptions(root);

    if (visible.length === 0) {
        return;
    }

    const current = visible.findIndex((opt) => opt.classList.contains('bg-muted'));
    let next;

    if (current < 0) {
        next = delta > 0 ? 0 : visible.length - 1;
    } else {
        next = (current + delta + visible.length) % visible.length;
    }

    setActive(root, visible[next]);
}

function activateCurrent(root) {
    const active = root.querySelector('[data-select-option].bg-muted');

    if (active) {
        selectOption(root, active);
    }
}

function updateFloatingLabel(root) {
    const label = root.querySelector('[data-select-floating-label]');

    if (! label) {
        return;
    }

    const trigger = getTrigger(root);
    const hasValue = isMultiple(root)
        ? getSelectedValues(root).length > 0
        : (getModelInput(root)?.value ?? '') !== '';
    const focused = document.activeElement === trigger || (trigger?.contains(document.activeElement) ?? false);
    const active = focused || isOpen(root) || hasValue;

    const activeClasses = (label.dataset.labelActive || '').split(' ').filter(Boolean);
    const restClasses = (label.dataset.labelRest || '').split(' ').filter(Boolean);

    label.classList.remove(...activeClasses, ...restClasses);
    label.classList.add(...(active ? activeClasses : restClasses));
}

function filterOptions(root, query) {
    const q = query.trim().toLowerCase();
    let anyVisible = false;

    getOptions(root).forEach((opt) => {
        const label = optionLabel(opt).toLowerCase();
        const description = (opt.querySelector('[data-select-option-description]')?.textContent || '').toLowerCase();
        const value = (opt.dataset.value || '').toLowerCase();
        const match = q === '' || `${label} ${description} ${value}`.includes(q);

        opt.style.display = match ? '' : 'none';

        if (match) {
            anyVisible = true;
        }
    });

    root.querySelectorAll('[data-select-group-label]').forEach((groupLabel) => {
        let node = groupLabel.nextElementSibling;
        let hasVisible = false;

        while (node && ! node.hasAttribute('data-select-group-label')) {
            if (node.hasAttribute('data-select-option') && node.style.display !== 'none') {
                hasVisible = true;
            }

            node = node.nextElementSibling;
        }

        groupLabel.style.display = hasVisible ? '' : 'none';
    });

    const empty = root.querySelector('[data-select-empty]');

    if (empty) {
        empty.hidden = anyVisible;
    }

    clearActive(root);

    if (anyVisible) {
        highlightSelectedOrFirst(root);
    }
}

function closeMenu(root) {
    const menu = getMenu(root);
    const trigger = getTrigger(root);

    if (! menu || menu.classList.contains('hidden')) {
        return;
    }

    menu.classList.add('hidden');
    root.querySelector('[data-select-chevron]')?.classList.remove('rotate-180');

    if (trigger) {
        trigger.setAttribute('aria-expanded', 'false');
    }

    clearActive(root);
    updateFloatingLabel(root);
}

function closeAllExcept(exceptRoot) {
    document.querySelectorAll('[data-select]').forEach((root) => {
        if (root !== exceptRoot) {
            closeMenu(root);
        }
    });
}

function openMenu(root) {
    if (isDisabledOrReadonly(root) || isOpen(root)) {
        return;
    }

    const menu = getMenu(root);
    const trigger = getTrigger(root);

    if (! menu || ! trigger) {
        return;
    }

    closeAllExcept(root);

    menu.classList.remove('hidden');
    trigger.setAttribute('aria-expanded', 'true');
    root.querySelector('[data-select-chevron]')?.classList.add('rotate-180');
    positionMenu(root);

    const search = getSearchInput(root);

    if (search) {
        search.value = '';
        filterOptions(root, '');
        requestAnimationFrame(() => search.focus());
    } else {
        highlightSelectedOrFirst(root);
    }

    updateFloatingLabel(root);
}

function toggleMenu(root) {
    if (isOpen(root)) {
        closeMenu(root);
    } else {
        openMenu(root);
    }
}

function setModelValue(root, valueOrArray) {
    const input = getModelInput(root);

    if (! input) {
        return;
    }

    input.value = isMultiple(root) ? JSON.stringify(valueOrArray) : String(valueOrArray ?? '');
    input.dispatchEvent(new Event('input', { bubbles: true }));
}

function updateSingleDisplay(root, optionEl) {
    const label = root.querySelector('[data-select-label]');

    if (label) {
        label.textContent = optionLabel(optionEl);
        label.classList.remove('text-muted-foreground');
        label.classList.add('text-foreground');
    }

    const clearBtn = root.querySelector('[data-select-clear]');

    if (clearBtn) {
        clearBtn.classList.remove('hidden');
    }

    updateFloatingLabel(root);
}

function syncMultipleState(root) {
    const max = root.getAttribute('data-select-max-selected');
    const maxN = max === '' ? null : parseInt(max, 10);
    const selectedValues = getSelectedValues(root);

    setModelValue(root, selectedValues);

    getOptions(root).forEach((opt) => {
        const selected = opt.getAttribute('aria-selected') === 'true';
        opt.disabled = ! selected && maxN !== null && selectedValues.length >= maxN;
    });

    const clearBtn = root.querySelector('[data-select-clear]');

    if (clearBtn) {
        clearBtn.classList.toggle('hidden', selectedValues.length === 0);
    }

    updateFloatingLabel(root);
}

function selectOption(root, optionEl) {
    if (! optionEl || optionEl.disabled) {
        return;
    }

    const value = optionEl.dataset.value;

    if (isMultiple(root)) {
        const alreadySelected = optionEl.getAttribute('aria-selected') === 'true';
        const max = root.getAttribute('data-select-max-selected');
        const maxN = max === '' ? null : parseInt(max, 10);
        const current = getSelectedValues(root);

        if (! alreadySelected && maxN !== null && current.length >= maxN) {
            return;
        }

        optionEl.setAttribute('aria-selected', alreadySelected ? 'false' : 'true');
        optionEl.classList.toggle('bg-primary/10', ! alreadySelected);

        const check = optionEl.querySelector('[data-select-option-check]');

        if (check) {
            check.style.display = alreadySelected ? 'none' : '';
        }

        syncMultipleState(root);

        if (root.getAttribute('data-select-close-on-select') === '1') {
            closeMenu(root);
            getTrigger(root)?.focus();
        } else {
            positionMenu(root);
        }

        return;
    }

    getOptions(root).forEach((opt) => {
        const selected = opt === optionEl;
        opt.setAttribute('aria-selected', selected ? 'true' : 'false');
        opt.classList.toggle('bg-primary/10', selected);

        const check = opt.querySelector('[data-select-option-check]');

        if (check) {
            check.style.display = selected ? '' : 'none';
        }
    });

    updateSingleDisplay(root, optionEl);
    setModelValue(root, value);

    if (root.getAttribute('data-select-close-on-select') === '1') {
        closeMenu(root);
        getTrigger(root)?.focus();
    }
}

function clearSelection(root) {
    if (isDisabledOrReadonly(root)) {
        return;
    }

    getOptions(root).forEach((opt) => {
        opt.setAttribute('aria-selected', 'false');
        opt.classList.remove('bg-primary/10');
        opt.disabled = false;

        const check = opt.querySelector('[data-select-option-check]');

        if (check) {
            check.style.display = 'none';
        }
    });

    if (isMultiple(root)) {
        setModelValue(root, []);
    } else {
        setModelValue(root, '');

        const label = root.querySelector('[data-select-label]');

        if (label) {
            label.textContent = root.getAttribute('data-select-placeholder') || '';
            label.classList.remove('text-foreground');
            label.classList.add('text-muted-foreground');
        }
    }

    const clearBtn = root.querySelector('[data-select-clear]');

    if (clearBtn) {
        clearBtn.classList.add('hidden');
    }

    updateFloatingLabel(root);
}

function removeChipValue(root, value) {
    const option = getOptions(root).find((opt) => opt.dataset.value === value);

    if (option) {
        selectOption(root, option);
    }
}

let typeahead = '';
let typeaheadTimer = null;

function handleTypeahead(root, char) {
    typeahead += char.toLowerCase();
    clearTimeout(typeaheadTimer);
    typeaheadTimer = setTimeout(() => {
        typeahead = '';
    }, 600);

    const match = getOptions(root).find((opt) => ! opt.disabled && optionLabel(opt).toLowerCase().startsWith(typeahead));

    if (! match) {
        return;
    }

    if (! isOpen(root)) {
        openMenu(root);
    }

    setActive(root, match);
}

function handleTriggerKeydown(root, event) {
    if (isDisabledOrReadonly(root)) {
        return;
    }

    const key = event.key;

    if (key === 'ArrowDown' || key === 'ArrowUp' || key === 'Enter' || key === ' ') {
        event.preventDefault();

        if (! isOpen(root)) {
            openMenu(root);

            return;
        }

        if (key === 'ArrowDown') {
            moveActive(root, 1);
        } else if (key === 'ArrowUp') {
            moveActive(root, -1);
        } else {
            activateCurrent(root);
        }

        return;
    }

    if (key === 'Escape' && isOpen(root)) {
        event.preventDefault();
        closeMenu(root);

        return;
    }

    if (! isSearchable(root) && key.length === 1 && ! event.ctrlKey && ! event.metaKey && ! event.altKey) {
        handleTypeahead(root, key);
    }
}

function handleSearchKeydown(root, event) {
    const key = event.key;

    if (key === 'ArrowDown') {
        event.preventDefault();
        moveActive(root, 1);

        return;
    }

    if (key === 'ArrowUp') {
        event.preventDefault();
        moveActive(root, -1);

        return;
    }

    if (key === 'Enter') {
        event.preventDefault();
        activateCurrent(root);

        return;
    }

    if (key === 'Escape') {
        event.preventDefault();
        closeMenu(root);
        getTrigger(root)?.focus();
    }
}

document.addEventListener('click', (event) => {
    const label = event.target.closest('[data-select-caption]');

    if (label) {
        const root = getRoot(label);
        const trigger = root ? getTrigger(root) : null;
        trigger?.focus();

        return;
    }

    const clearBtn = event.target.closest('[data-select-clear]');

    if (clearBtn) {
        event.stopPropagation();
        clearSelection(getRoot(clearBtn));

        return;
    }

    const removeChip = event.target.closest('[data-select-remove-chip]');

    if (removeChip) {
        event.stopPropagation();
        const chip = removeChip.closest('[data-select-chip]');
        const root = getRoot(removeChip);

        if (chip && root) {
            removeChipValue(root, chip.dataset.value);
        }

        return;
    }

    const option = event.target.closest('[data-select-option]');

    if (option) {
        event.preventDefault();
        const root = getRoot(option);

        if (root) {
            selectOption(root, option);
        }

        return;
    }

    const trigger = event.target.closest('[data-select-trigger]');

    if (trigger) {
        const root = getRoot(trigger);

        if (root) {
            toggleMenu(root);
        }

        return;
    }

    document.querySelectorAll('[data-select-menu]:not(.hidden)').forEach((menu) => {
        const root = getRoot(menu);

        if (root && ! root.contains(event.target)) {
            closeMenu(root);
        }
    });
});

document.addEventListener('input', (event) => {
    const search = event.target.closest('[data-select-search]');

    if (search) {
        const root = getRoot(search);

        if (root) {
            filterOptions(root, search.value);
        }
    }
});

document.addEventListener('keydown', (event) => {
    const trigger = event.target.closest('[data-select-trigger]');

    if (trigger) {
        const root = getRoot(trigger);

        if (root) {
            handleTriggerKeydown(root, event);
        }

        return;
    }

    const search = event.target.closest('[data-select-search]');

    if (search) {
        const root = getRoot(search);

        if (root) {
            handleSearchKeydown(root, event);
        }
    }
});

document.addEventListener('focusin', (event) => {
    const trigger = event.target.closest('[data-select-trigger]');

    if (trigger) {
        updateFloatingLabel(getRoot(trigger));
    }
});

document.addEventListener('focusout', (event) => {
    const trigger = event.target.closest('[data-select-trigger]');

    if (trigger) {
        const root = getRoot(trigger);
        setTimeout(() => updateFloatingLabel(root), 0);
    }
});

window.addEventListener('scroll', () => {
    document.querySelectorAll('[data-select-menu]:not(.hidden)').forEach((menu) => {
        const root = getRoot(menu);

        if (root) {
            positionMenu(root);
        }
    });
}, true);

window.addEventListener('resize', () => {
    document.querySelectorAll('[data-select-menu]:not(.hidden)').forEach((menu) => {
        const root = getRoot(menu);

        if (root) {
            positionMenu(root);
        }
    });
});
