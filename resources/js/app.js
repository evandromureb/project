import { initLayout } from './layout';
import './dropdown';
import './tabs';
import './accordion';
import './collapse';
import './modal';
import './drawer';
import './tooltip';
import './popover';
import './carousel';
import './calendar';
import './date-picker';
import './time-picker';
import './toast';
import './cookie-alert';
import './kanban';
import './pagination';
import './chart';
import './chart-apex';
import './chart-js';
import './chart-d3';
import './map';
import './code-editor';
import './example';
import './ui-docs';
import './scrollspy';
import './scroll';
import './sticky';
import './treeview';
import './countup';
import './form-input';
import './form-input-mask';
import './form-input-password';
import './form-input-number';
import './form-input-otp';
import './form-range';
import './form-color-picker';
import './form-input-tags';
import './form-textarea';
import './form-composer';
import './form-editor';
import './form-select';
import './form-select-autocomplete';
import './form-select-tags';
import './form-select-multi';
import './form-select-wizard';
import './form-wizard';
import './form-repeater';
import './form-input-upload';
import './form-input-image';
import './form-input-crop';
import './form-clipboard';
import './form-checkbox';
import './form-checkbox-group';
import './form-radio';
import './form-switch';
import './form-rating';

// `livewire:navigated` dispara tanto no carregamento inicial da página quanto
// após cada navegação via wire:navigate (que troca o <body> sem recarregar a
// página, então `DOMContentLoaded` não dispara de novo). `initLayout` é
// idempotente, então também é seguro chamá-la no load inicial via
// `DOMContentLoaded` para páginas em que o Livewire não está presente.
document.addEventListener('livewire:navigated', initLayout);

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initLayout, { once: true });
} else {
    initLayout();
}
