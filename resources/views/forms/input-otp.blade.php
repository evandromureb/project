<?php

use Livewire\Component;

return new class extends Component
{
    public string $code = '';

    public string $pin = '';

    public string $invite = '';

    public function save(): void
    {
        $this->validate([
            'code' => ['required', 'digits:6'],
            'pin' => ['required', 'digits:4'],
            'invite' => ['required', 'size:8', 'regex:/^[A-Z0-9]+$/'],
        ]);
    }

    public function resendCode(): void
    {
        // Demo: apenas confirma o evento no front.
    }
};
?>

@php
    $basicCode = <<<'BLADE'
<x-forms.input-otp label="Código de verificação" name="otp" />
BLADE;

    $cellClasses = 'box-border appearance-none text-center font-semibold tabular-nums text-foreground outline-none transition-colors placeholder:text-muted-foreground/50 disabled:cursor-not-allowed read-only:cursor-default [-moz-appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none rounded-lg border bg-card shadow-sm border-border focus:ring-2 focus:ring-offset-1 focus:border-primary focus:ring-primary h-11 w-10 text-base sm:w-11';

    $otpCells = function (int $length, string $idPrefix, string $mode = 'numeric') use (&$cellClasses): string {
        $pattern = match ($mode) {
            'alpha' => '[A-Za-z]*',
            'alphanumeric' => '[A-Za-z0-9]*',
            default => '[0-9]*',
        };
        $inputMode = $mode === 'numeric' ? 'numeric' : 'text';
        $html = '';
        for ($i = 0; $i < $length; $i++) {
            $autocomplete = $i === 0 ? 'one-time-code' : 'off';
            $html .= "\n            <input id=\"{$idPrefix}-{$i}\" type=\"text\" inputmode=\"{$inputMode}\" pattern=\"{$pattern}\" maxlength=\"1\" autocomplete=\"{$autocomplete}\" placeholder=\"·\" aria-label=\"Dígito ".($i + 1)." de {$length}\" class=\"{$cellClasses}\">";
        }

        return $html;
    };

    $basicHtml = <<<HTML
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label for="input-otp-otp-0" class="text-sm font-medium text-foreground">Código de verificação</label>
    </div>
    <input type="hidden" name="otp" value="">
    <div role="group" aria-label="Código de verificação" class="relative flex flex-wrap items-center gap-2 justify-start">{$otpCells(6, 'input-otp-otp')}
    </div>
</div>
HTML;

    $lengthCode = <<<'BLADE'
<x-forms.input-otp label="PIN" name="pin" :length="4" />
<x-forms.input-otp label="Código longo" name="long" :length="8" />
BLADE;

    $lengthHtml = <<<HTML
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3">
            <label for="input-otp-pin-0" class="text-sm font-medium text-foreground">PIN</label>
        </div>
        <input type="hidden" name="pin" value="">
        <div role="group" aria-label="PIN" class="relative flex flex-wrap items-center gap-2 justify-start">{$otpCells(4, 'input-otp-pin')}
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3">
            <label for="input-otp-long-0" class="text-sm font-medium text-foreground">Código longo</label>
        </div>
        <input type="hidden" name="long" value="">
        <div role="group" aria-label="Código longo" class="relative flex flex-wrap items-center gap-2 justify-start">{$otpCells(8, 'input-otp-long')}
        </div>
    </div>
</div>
HTML;

    $modesCode = <<<'BLADE'
<x-forms.input-otp mode="numeric" label="Numérico" name="m_num" />
<x-forms.input-otp mode="alpha" label="Letras" name="m_alpha" :length="4" />
<x-forms.input-otp mode="alphanumeric" label="Alfanumérico" name="m_alnum" :length="6" />
BLADE;

    $modesHtml = <<<HTML
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3">
            <label for="input-otp-m_num-0" class="text-sm font-medium text-foreground">Numérico</label>
        </div>
        <input type="hidden" name="m_num" value="">
        <div role="group" aria-label="Numérico" class="relative flex flex-wrap items-center gap-2 justify-start">{$otpCells(6, 'input-otp-m_num', 'numeric')}
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3">
            <label for="input-otp-m_alpha-0" class="text-sm font-medium text-foreground">Letras</label>
        </div>
        <input type="hidden" name="m_alpha" value="">
        <div role="group" aria-label="Letras" class="relative flex flex-wrap items-center gap-2 justify-start">{$otpCells(4, 'input-otp-m_alpha', 'alpha')}
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3">
            <label for="input-otp-m_alnum-0" class="text-sm font-medium text-foreground">Alfanumérico</label>
        </div>
        <input type="hidden" name="m_alnum" value="">
        <div role="group" aria-label="Alfanumérico" class="relative flex flex-wrap items-center gap-2 justify-start">{$otpCells(6, 'input-otp-m_alnum', 'alphanumeric')}
        </div>
    </div>
</div>
HTML;

    $groupCode = <<<'BLADE'
<x-forms.input-otp
    label="Código agrupado"
    name="grouped"
    :length="6"
    :group="3"
    separator="–"
    hint="Formato 123–456"
/>
BLADE;

    $groupHtml = <<<HTML
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label for="input-otp-grouped-0" class="text-sm font-medium text-foreground">Código agrupado</label>
    </div>
    <input type="hidden" name="grouped" value="">
    <div role="group" aria-label="Código agrupado" aria-describedby="input-otp-grouped-hint" class="relative flex flex-wrap items-center gap-2 justify-start">
        {$otpCells(3, 'input-otp-grouped')}
        <span class="select-none px-0.5 font-medium text-muted-foreground text-base" aria-hidden="true">–</span>
        <input id="input-otp-grouped-3" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 4 de 6" class="{$cellClasses}">
        <input id="input-otp-grouped-4" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 5 de 6" class="{$cellClasses}">
        <input id="input-otp-grouped-5" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 6 de 6" class="{$cellClasses}">
    </div>
    <p id="input-otp-grouped-hint" class="text-xs text-muted-foreground">Formato 123–456</p>
</div>
HTML;

    $maskedCode = <<<'BLADE'
<x-forms.input-otp
    label="PIN mascarado"
    name="secret"
    :length="4"
    masked
    clearable
/>
BLADE;

    $maskedHtml = <<<HTML
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label for="input-otp-secret-0" class="text-sm font-medium text-foreground">PIN mascarado</label>
        <button type="button" class="inline-flex items-center gap-1 text-xs font-medium text-muted-foreground transition-colors hover:text-foreground disabled:pointer-events-none disabled:opacity-40" disabled>
            <i class="bi bi-x-circle leading-none" aria-hidden="true"></i>
            Limpar
        </button>
    </div>
    <input type="hidden" name="secret" value="">
    <div role="group" aria-label="PIN mascarado" class="relative flex flex-wrap items-center gap-2 justify-start">
        <input id="input-otp-secret-0" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" placeholder="·" aria-label="Dígito 1 de 4" class="{$cellClasses} [-webkit-text-security:disc] [text-security:disc]">
        <input id="input-otp-secret-1" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 2 de 4" class="{$cellClasses} [-webkit-text-security:disc] [text-security:disc]">
        <input id="input-otp-secret-2" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 3 de 4" class="{$cellClasses} [-webkit-text-security:disc] [text-security:disc]">
        <input id="input-otp-secret-3" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 4 de 4" class="{$cellClasses} [-webkit-text-security:disc] [text-security:disc]">
    </div>
</div>
HTML;

    $sizesCode = <<<'BLADE'
<x-forms.input-otp size="sm" label="Pequeno" name="otp_sm" />
<x-forms.input-otp size="md" label="Médio" name="otp_md" />
<x-forms.input-otp size="lg" label="Grande" name="otp_lg" />
BLADE;

    $cellBase = 'box-border appearance-none text-center font-semibold tabular-nums text-foreground outline-none transition-colors placeholder:text-muted-foreground/50 disabled:cursor-not-allowed read-only:cursor-default [-moz-appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none rounded-lg border bg-card shadow-sm border-border focus:ring-2 focus:ring-offset-1 focus:border-primary focus:ring-primary';

    $sizesHtml = <<<HTML
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3">
            <label for="input-otp-otp_sm-0" class="text-xs font-medium text-foreground">Pequeno</label>
        </div>
        <input type="hidden" name="otp_sm" value="">
        <div role="group" aria-label="Pequeno" class="relative flex flex-wrap items-center gap-1.5 justify-start">
            <input id="input-otp-otp_sm-0" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" placeholder="·" aria-label="Dígito 1 de 6" class="{$cellBase} h-9 w-9 text-sm">
            <input id="input-otp-otp_sm-1" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 2 de 6" class="{$cellBase} h-9 w-9 text-sm">
            <input id="input-otp-otp_sm-2" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 3 de 6" class="{$cellBase} h-9 w-9 text-sm">
            <input id="input-otp-otp_sm-3" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 4 de 6" class="{$cellBase} h-9 w-9 text-sm">
            <input id="input-otp-otp_sm-4" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 5 de 6" class="{$cellBase} h-9 w-9 text-sm">
            <input id="input-otp-otp_sm-5" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 6 de 6" class="{$cellBase} h-9 w-9 text-sm">
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3">
            <label for="input-otp-otp_md-0" class="text-sm font-medium text-foreground">Médio</label>
        </div>
        <input type="hidden" name="otp_md" value="">
        <div role="group" aria-label="Médio" class="relative flex flex-wrap items-center gap-2 justify-start">{$otpCells(6, 'input-otp-otp_md')}
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3">
            <label for="input-otp-otp_lg-0" class="text-sm font-medium text-foreground">Grande</label>
        </div>
        <input type="hidden" name="otp_lg" value="">
        <div role="group" aria-label="Grande" class="relative flex flex-wrap items-center gap-2.5 justify-start">
            <input id="input-otp-otp_lg-0" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" placeholder="·" aria-label="Dígito 1 de 6" class="{$cellBase} h-14 w-12 text-xl sm:w-14">
            <input id="input-otp-otp_lg-1" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 2 de 6" class="{$cellBase} h-14 w-12 text-xl sm:w-14">
            <input id="input-otp-otp_lg-2" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 3 de 6" class="{$cellBase} h-14 w-12 text-xl sm:w-14">
            <input id="input-otp-otp_lg-3" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 4 de 6" class="{$cellBase} h-14 w-12 text-xl sm:w-14">
            <input id="input-otp-otp_lg-4" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 5 de 6" class="{$cellBase} h-14 w-12 text-xl sm:w-14">
            <input id="input-otp-otp_lg-5" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 6 de 6" class="{$cellBase} h-14 w-12 text-xl sm:w-14">
        </div>
    </div>
</div>
HTML;

    $variantsCode = <<<'BLADE'
<x-forms.input-otp variant="default" label="Default" name="v_default" />
<x-forms.input-otp variant="filled" label="Filled" name="v_filled" />
<x-forms.input-otp variant="flush" label="Flush" name="v_flush" />
BLADE;

    $cellVariant = function (string $variant) use (&$cellBase): string {
        $variantCellClasses = match ($variant) {
            'filled' => 'border border-transparent bg-muted shadow-none',
            'flush' => 'rounded-none border-0 border-b-2 border-border bg-transparent shadow-none focus:ring-0',
            default => 'border bg-card shadow-sm',
        };
        $radius = $variant === 'flush' ? '' : 'rounded-lg ';
        $ring = $variant === 'flush' ? '' : 'focus:ring-2 focus:ring-offset-1 ';

        return trim("box-border appearance-none text-center font-semibold tabular-nums text-foreground outline-none transition-colors placeholder:text-muted-foreground/50 disabled:cursor-not-allowed read-only:cursor-default [-moz-appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none {$radius}{$variantCellClasses} border-border {$ring}focus:border-primary focus:ring-primary h-11 w-10 text-base sm:w-11");
    };

    $variantsHtml = <<<HTML
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3">
            <label for="input-otp-v_default-0" class="text-sm font-medium text-foreground">Default</label>
        </div>
        <input type="hidden" name="v_default" value="">
        <div role="group" aria-label="Default" class="relative flex flex-wrap items-center gap-2 justify-start">
            <input id="input-otp-v_default-0" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" placeholder="·" aria-label="Dígito 1 de 6" class="{$cellVariant('default')}">
            <input id="input-otp-v_default-1" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 2 de 6" class="{$cellVariant('default')}">
            <input id="input-otp-v_default-2" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 3 de 6" class="{$cellVariant('default')}">
            <input id="input-otp-v_default-3" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 4 de 6" class="{$cellVariant('default')}">
            <input id="input-otp-v_default-4" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 5 de 6" class="{$cellVariant('default')}">
            <input id="input-otp-v_default-5" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 6 de 6" class="{$cellVariant('default')}">
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3">
            <label for="input-otp-v_filled-0" class="text-sm font-medium text-foreground">Filled</label>
        </div>
        <input type="hidden" name="v_filled" value="">
        <div role="group" aria-label="Filled" class="relative flex flex-wrap items-center gap-2 justify-start">
            <input id="input-otp-v_filled-0" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" placeholder="·" aria-label="Dígito 1 de 6" class="{$cellVariant('filled')}">
            <input id="input-otp-v_filled-1" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 2 de 6" class="{$cellVariant('filled')}">
            <input id="input-otp-v_filled-2" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 3 de 6" class="{$cellVariant('filled')}">
            <input id="input-otp-v_filled-3" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 4 de 6" class="{$cellVariant('filled')}">
            <input id="input-otp-v_filled-4" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 5 de 6" class="{$cellVariant('filled')}">
            <input id="input-otp-v_filled-5" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 6 de 6" class="{$cellVariant('filled')}">
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3">
            <label for="input-otp-v_flush-0" class="text-sm font-medium text-foreground">Flush</label>
        </div>
        <input type="hidden" name="v_flush" value="">
        <div role="group" aria-label="Flush" class="relative flex flex-wrap items-center gap-2 justify-start">
            <input id="input-otp-v_flush-0" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" placeholder="·" aria-label="Dígito 1 de 6" class="{$cellVariant('flush')}">
            <input id="input-otp-v_flush-1" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 2 de 6" class="{$cellVariant('flush')}">
            <input id="input-otp-v_flush-2" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 3 de 6" class="{$cellVariant('flush')}">
            <input id="input-otp-v_flush-3" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 4 de 6" class="{$cellVariant('flush')}">
            <input id="input-otp-v_flush-4" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 5 de 6" class="{$cellVariant('flush')}">
            <input id="input-otp-v_flush-5" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 6 de 6" class="{$cellVariant('flush')}">
        </div>
    </div>
</div>
HTML;

    $statesCode = <<<'BLADE'
<x-forms.input-otp label="Sucesso" name="ok" state="success" value="123456" />
<x-forms.input-otp label="Erro" name="bad" error="Código inválido ou expirado." />
BLADE;

    $cellState = function (string $borderClass, string $ringClass) use (&$cellBase): string {
        return "box-border appearance-none text-center font-semibold tabular-nums text-foreground outline-none transition-colors placeholder:text-muted-foreground/50 disabled:cursor-not-allowed read-only:cursor-default [-moz-appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none rounded-lg border bg-card shadow-sm {$borderClass} focus:ring-2 focus:ring-offset-1 {$ringClass} h-11 w-10 text-base sm:w-11";
    };

    $statesHtml = <<<HTML
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3">
            <label for="input-otp-ok-0" class="text-sm font-medium text-foreground">Sucesso</label>
        </div>
        <input type="hidden" name="ok" value="123456">
        <div role="group" aria-label="Sucesso" class="relative flex flex-wrap items-center gap-2 justify-start">
            <input id="input-otp-ok-0" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" value="1" aria-label="Dígito 1 de 6" class="{$cellState('border-success', 'focus:border-success focus:ring-success')}">
            <input id="input-otp-ok-1" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="2" aria-label="Dígito 2 de 6" class="{$cellState('border-success', 'focus:border-success focus:ring-success')}">
            <input id="input-otp-ok-2" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="3" aria-label="Dígito 3 de 6" class="{$cellState('border-success', 'focus:border-success focus:ring-success')}">
            <input id="input-otp-ok-3" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="4" aria-label="Dígito 4 de 6" class="{$cellState('border-success', 'focus:border-success focus:ring-success')}">
            <input id="input-otp-ok-4" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="5" aria-label="Dígito 5 de 6" class="{$cellState('border-success', 'focus:border-success focus:ring-success')}">
            <input id="input-otp-ok-5" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="6" aria-label="Dígito 6 de 6" class="{$cellState('border-success', 'focus:border-success focus:ring-success')}">
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3">
            <label for="input-otp-bad-0" class="text-sm font-medium text-foreground">Erro</label>
        </div>
        <input type="hidden" name="bad" value="">
        <div role="group" aria-label="Erro" aria-describedby="input-otp-bad-error" class="relative flex flex-wrap items-center gap-2 justify-start">
            <input id="input-otp-bad-0" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" placeholder="·" aria-label="Dígito 1 de 6" aria-invalid="true" aria-describedby="input-otp-bad-error" class="{$cellState('border-danger', 'focus:border-danger focus:ring-danger')}">
            <input id="input-otp-bad-1" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 2 de 6" aria-invalid="true" aria-describedby="input-otp-bad-error" class="{$cellState('border-danger', 'focus:border-danger focus:ring-danger')}">
            <input id="input-otp-bad-2" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 3 de 6" aria-invalid="true" aria-describedby="input-otp-bad-error" class="{$cellState('border-danger', 'focus:border-danger focus:ring-danger')}">
            <input id="input-otp-bad-3" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 4 de 6" aria-invalid="true" aria-describedby="input-otp-bad-error" class="{$cellState('border-danger', 'focus:border-danger focus:ring-danger')}">
            <input id="input-otp-bad-4" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 5 de 6" aria-invalid="true" aria-describedby="input-otp-bad-error" class="{$cellState('border-danger', 'focus:border-danger focus:ring-danger')}">
            <input id="input-otp-bad-5" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 6 de 6" aria-invalid="true" aria-describedby="input-otp-bad-error" class="{$cellState('border-danger', 'focus:border-danger focus:ring-danger')}">
        </div>
        <p id="input-otp-bad-error" role="alert" class="text-xs text-danger">Código inválido ou expirado.</p>
    </div>
</div>
HTML;

    $colorsCode = <<<'BLADE'
<x-forms.input-otp color="primary" label="Primary" name="c_primary" />
<x-forms.input-otp color="success" label="Success" name="c_success" />
<x-forms.input-otp color="warning" label="Warning" name="c_warning" />
<x-forms.input-otp color="danger" label="Danger" name="c_danger" />
<x-forms.input-otp color="info" label="Info" name="c_info" />
BLADE;

    $colorsHtml = <<<HTML
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3"><label for="input-otp-c_primary-0" class="text-sm font-medium text-foreground">Primary</label></div>
        <input type="hidden" name="c_primary" value="">
        <div role="group" aria-label="Primary" class="relative flex flex-wrap items-center gap-2 justify-start">{$otpCells(6, 'input-otp-c_primary')}
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3"><label for="input-otp-c_success-0" class="text-sm font-medium text-foreground">Success</label></div>
        <input type="hidden" name="c_success" value="">
        <div role="group" aria-label="Success" class="relative flex flex-wrap items-center gap-2 justify-start">
            <input id="input-otp-c_success-0" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" placeholder="·" aria-label="Dígito 1 de 6" class="{$cellState('border-border', 'focus:border-success focus:ring-success')}">
            <input id="input-otp-c_success-1" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 2 de 6" class="{$cellState('border-border', 'focus:border-success focus:ring-success')}">
            <input id="input-otp-c_success-2" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 3 de 6" class="{$cellState('border-border', 'focus:border-success focus:ring-success')}">
            <input id="input-otp-c_success-3" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 4 de 6" class="{$cellState('border-border', 'focus:border-success focus:ring-success')}">
            <input id="input-otp-c_success-4" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 5 de 6" class="{$cellState('border-border', 'focus:border-success focus:ring-success')}">
            <input id="input-otp-c_success-5" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 6 de 6" class="{$cellState('border-border', 'focus:border-success focus:ring-success')}">
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3"><label for="input-otp-c_warning-0" class="text-sm font-medium text-foreground">Warning</label></div>
        <input type="hidden" name="c_warning" value="">
        <div role="group" aria-label="Warning" class="relative flex flex-wrap items-center gap-2 justify-start">
            <input id="input-otp-c_warning-0" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" placeholder="·" aria-label="Dígito 1 de 6" class="{$cellState('border-border', 'focus:border-warning focus:ring-warning')}">
            <input id="input-otp-c_warning-1" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 2 de 6" class="{$cellState('border-border', 'focus:border-warning focus:ring-warning')}">
            <input id="input-otp-c_warning-2" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 3 de 6" class="{$cellState('border-border', 'focus:border-warning focus:ring-warning')}">
            <input id="input-otp-c_warning-3" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 4 de 6" class="{$cellState('border-border', 'focus:border-warning focus:ring-warning')}">
            <input id="input-otp-c_warning-4" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 5 de 6" class="{$cellState('border-border', 'focus:border-warning focus:ring-warning')}">
            <input id="input-otp-c_warning-5" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 6 de 6" class="{$cellState('border-border', 'focus:border-warning focus:ring-warning')}">
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3"><label for="input-otp-c_danger-0" class="text-sm font-medium text-foreground">Danger</label></div>
        <input type="hidden" name="c_danger" value="">
        <div role="group" aria-label="Danger" class="relative flex flex-wrap items-center gap-2 justify-start">
            <input id="input-otp-c_danger-0" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" placeholder="·" aria-label="Dígito 1 de 6" class="{$cellState('border-border', 'focus:border-danger focus:ring-danger')}">
            <input id="input-otp-c_danger-1" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 2 de 6" class="{$cellState('border-border', 'focus:border-danger focus:ring-danger')}">
            <input id="input-otp-c_danger-2" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 3 de 6" class="{$cellState('border-border', 'focus:border-danger focus:ring-danger')}">
            <input id="input-otp-c_danger-3" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 4 de 6" class="{$cellState('border-border', 'focus:border-danger focus:ring-danger')}">
            <input id="input-otp-c_danger-4" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 5 de 6" class="{$cellState('border-border', 'focus:border-danger focus:ring-danger')}">
            <input id="input-otp-c_danger-5" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 6 de 6" class="{$cellState('border-border', 'focus:border-danger focus:ring-danger')}">
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3"><label for="input-otp-c_info-0" class="text-sm font-medium text-foreground">Info</label></div>
        <input type="hidden" name="c_info" value="">
        <div role="group" aria-label="Info" class="relative flex flex-wrap items-center gap-2 justify-start">
            <input id="input-otp-c_info-0" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" placeholder="·" aria-label="Dígito 1 de 6" class="{$cellState('border-border', 'focus:border-info focus:ring-info')}">
            <input id="input-otp-c_info-1" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 2 de 6" class="{$cellState('border-border', 'focus:border-info focus:ring-info')}">
            <input id="input-otp-c_info-2" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 3 de 6" class="{$cellState('border-border', 'focus:border-info focus:ring-info')}">
            <input id="input-otp-c_info-3" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 4 de 6" class="{$cellState('border-border', 'focus:border-info focus:ring-info')}">
            <input id="input-otp-c_info-4" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 5 de 6" class="{$cellState('border-border', 'focus:border-info focus:ring-info')}">
            <input id="input-otp-c_info-5" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 6 de 6" class="{$cellState('border-border', 'focus:border-info focus:ring-info')}">
        </div>
    </div>
</div>
HTML;

    $resendCode = <<<'BLADE'
<x-forms.input-otp
    label="Verificação por SMS"
    name="sms"
    resend
    :resend-seconds="30"
    resend-label="Reenviar SMS"
    hint="Enviamos um código para o seu celular."
    center
    autofocus
/>
BLADE;

    $resendHtml = <<<HTML
<div class="flex w-full flex-col gap-1.5">
    <div class="flex flex-col items-center justify-between gap-3 sm:flex-row">
        <label for="input-otp-sms-0" class="text-sm font-medium text-foreground">Verificação por SMS</label>
    </div>
    <input type="hidden" name="sms" value="">
    <div role="group" aria-label="Verificação por SMS" aria-describedby="input-otp-sms-hint" class="relative flex flex-wrap items-center gap-2 justify-center">{$otpCells(6, 'input-otp-sms')}
    </div>
    <div class="flex flex-wrap items-center gap-2 text-xs justify-center">
        <button type="button" class="font-medium text-primary transition-colors hover:underline disabled:pointer-events-none disabled:no-underline disabled:opacity-50" disabled>
            <span>Reenviar em <span>30</span>s</span>
        </button>
    </div>
    <p id="input-otp-sms-hint" class="text-xs text-muted-foreground text-center">Enviamos um código para o seu celular.</p>
</div>
HTML;

    $disabledCode = <<<'BLADE'
<x-forms.input-otp label="Desabilitado" disabled value="123456" />
<x-forms.input-otp label="Readonly" readonly value="654321" />
<x-forms.input-otp label="Loading" loading />
BLADE;

    $cellDisabled = function (): string {
        return 'box-border appearance-none text-center font-semibold tabular-nums text-foreground outline-none transition-colors placeholder:text-muted-foreground/50 disabled:cursor-not-allowed read-only:cursor-default [-moz-appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none rounded-lg border bg-card shadow-sm border-border focus:ring-2 focus:ring-offset-1 focus:border-primary focus:ring-primary h-11 w-10 text-base sm:w-11 cursor-not-allowed opacity-60';
    };

    $disabledHtml = <<<HTML
<div class="flex w-full flex-col gap-4">
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3"><label class="text-sm font-medium text-foreground">Desabilitado</label></div>
        <input type="hidden" value="123456" disabled>
        <div role="group" aria-label="Desabilitado" class="relative flex flex-wrap items-center gap-2 justify-start">
            <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" value="1" aria-label="Dígito 1 de 6" disabled class="{$cellDisabled()}">
            <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="2" aria-label="Dígito 2 de 6" disabled class="{$cellDisabled()}">
            <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="3" aria-label="Dígito 3 de 6" disabled class="{$cellDisabled()}">
            <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="4" aria-label="Dígito 4 de 6" disabled class="{$cellDisabled()}">
            <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="5" aria-label="Dígito 5 de 6" disabled class="{$cellDisabled()}">
            <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="6" aria-label="Dígito 6 de 6" disabled class="{$cellDisabled()}">
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3"><label class="text-sm font-medium text-foreground">Readonly</label></div>
        <input type="hidden" value="654321">
        <div role="group" aria-label="Readonly" class="relative flex flex-wrap items-center gap-2 justify-start">
            <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" value="6" aria-label="Dígito 1 de 6" readonly class="{$cellClasses}">
            <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="5" aria-label="Dígito 2 de 6" readonly class="{$cellClasses}">
            <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="4" aria-label="Dígito 3 de 6" readonly class="{$cellClasses}">
            <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="3" aria-label="Dígito 4 de 6" readonly class="{$cellClasses}">
            <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="2" aria-label="Dígito 5 de 6" readonly class="{$cellClasses}">
            <input type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" value="1" aria-label="Dígito 6 de 6" readonly class="{$cellClasses}">
        </div>
    </div>
    <div class="flex w-full flex-col gap-1.5">
        <div class="flex items-center justify-between gap-3"><label class="text-sm font-medium text-foreground">Loading</label></div>
        <input type="hidden" value="" disabled>
        <div role="group" aria-label="Loading" class="relative flex flex-wrap items-center gap-2 justify-start">{$otpCells(6, 'input-otp-loading')}
            <span class="ms-1 inline-flex items-center text-muted-foreground" aria-hidden="true">
                <span class="inline-flex size-4 animate-spin rounded-full border-2 border-current border-t-transparent"></span>
            </span>
        </div>
    </div>
</div>
HTML;

    $roundedCode = <<<'BLADE'
<x-forms.input-otp label="Arredondado" name="round" rounded :length="4" />
BLADE;

    $roundedHtml = <<<HTML
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label for="input-otp-round-0" class="text-sm font-medium text-foreground">Arredondado</label>
    </div>
    <input type="hidden" name="round" value="">
    <div role="group" aria-label="Arredondado" class="relative flex flex-wrap items-center gap-2 justify-start">
        <input id="input-otp-round-0" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="one-time-code" placeholder="·" aria-label="Dígito 1 de 4" class="box-border appearance-none text-center font-semibold tabular-nums text-foreground outline-none transition-colors placeholder:text-muted-foreground/50 disabled:cursor-not-allowed read-only:cursor-default [-moz-appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none rounded-full border bg-card shadow-sm border-border focus:ring-2 focus:ring-offset-1 focus:border-primary focus:ring-primary h-11 w-10 text-base sm:w-11">
        <input id="input-otp-round-1" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 2 de 4" class="box-border appearance-none text-center font-semibold tabular-nums text-foreground outline-none transition-colors placeholder:text-muted-foreground/50 disabled:cursor-not-allowed read-only:cursor-default [-moz-appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none rounded-full border bg-card shadow-sm border-border focus:ring-2 focus:ring-offset-1 focus:border-primary focus:ring-primary h-11 w-10 text-base sm:w-11">
        <input id="input-otp-round-2" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 3 de 4" class="box-border appearance-none text-center font-semibold tabular-nums text-foreground outline-none transition-colors placeholder:text-muted-foreground/50 disabled:cursor-not-allowed read-only:cursor-default [-moz-appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none rounded-full border bg-card shadow-sm border-border focus:ring-2 focus:ring-offset-1 focus:border-primary focus:ring-primary h-11 w-10 text-base sm:w-11">
        <input id="input-otp-round-3" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="1" autocomplete="off" placeholder="·" aria-label="Dígito 4 de 4" class="box-border appearance-none text-center font-semibold tabular-nums text-foreground outline-none transition-colors placeholder:text-muted-foreground/50 disabled:cursor-not-allowed read-only:cursor-default [-moz-appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none rounded-full border bg-card shadow-sm border-border focus:ring-2 focus:ring-offset-1 focus:border-primary focus:ring-primary h-11 w-10 text-base sm:w-11">
    </div>
</div>
HTML;

    $eventsCode = <<<'BLADE'
<x-forms.input-otp
    label="Com eventos"
    name="events"
    clearable
    x-on:otp-complete="$dispatch('toast', { message: 'OTP completo: ' + $event.detail.value })"
    x-on:otp-change="console.log($event.detail)"
/>
BLADE;

    $eventsHtml = <<<HTML
<div class="flex w-full flex-col gap-1.5">
    <div class="flex items-center justify-between gap-3">
        <label for="input-otp-events-0" class="text-sm font-medium text-foreground">Com eventos</label>
        <button type="button" class="inline-flex items-center gap-1 text-xs font-medium text-muted-foreground transition-colors hover:text-foreground disabled:pointer-events-none disabled:opacity-40" disabled>
            <i class="bi bi-x-circle leading-none" aria-hidden="true"></i>
            Limpar
        </button>
    </div>
    <input type="hidden" name="events" value="">
    <div role="group" aria-label="Com eventos" class="relative flex flex-wrap items-center gap-2 justify-start">{$otpCells(6, 'input-otp-events')}
    </div>
</div>
HTML;

@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            O componente <code>&lt;x-forms.input-otp&gt;</code> é o campo de código OTP/PIN completo:
            células por dígito, auto-avanço, colar, setas, mascara, agrupamento, reenvio com countdown,
            modos <code>numeric</code>/<code>alpha</code>/<code>alphanumeric</code> e binding Livewire
            via input oculto + eventos <code>otp-complete</code>, <code>otp-change</code> e
            <code>otp-resend</code>.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Básico" :code="$basicCode" :html="$basicHtml">
            <x-slot:description>
                Padrão de <code>6</code> dígitos numéricos com <code>autocomplete="one-time-code"</code>.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-otp label="Código de verificação" name="demo_otp" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos de código" :code="$lengthCode" :html="$lengthHtml">
            <x-slot:description>
                Use <code>:length</code> (1–12) para PIN de 4 ou códigos longos.
            </x-slot:description>
            <div class="flex w-full max-w-lg flex-col gap-4">
                <x-forms.input-otp label="PIN" name="demo_pin" :length="4" />
                <x-forms.input-otp label="Código longo" name="demo_long" :length="8" />
            </div>
        </x-ui.example>

        <x-ui.example title="Modos" :code="$modesCode" :html="$modesHtml">
            <x-slot:description>
                <code>numeric</code> (padrão), <code>alpha</code> e <code>alphanumeric</code>
                (letras em maiúsculas).
            </x-slot:description>
            <div class="flex w-full max-w-lg flex-col gap-4">
                <x-forms.input-otp mode="numeric" label="Numérico" name="demo_m_num" />
                <x-forms.input-otp mode="alpha" label="Letras" name="demo_m_alpha" :length="4" />
                <x-forms.input-otp mode="alphanumeric" label="Alfanumérico" name="demo_m_alnum" :length="6" />
            </div>
        </x-ui.example>

        <x-ui.example title="Agrupado com separador" :code="$groupCode" :html="$groupHtml">
            <x-slot:description>
                <code>:group="3"</code> + <code>separator</code> para visual 123–456.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-otp
                    label="Código agrupado"
                    name="demo_grouped"
                    :length="6"
                    :group="3"
                    separator="–"
                    hint="Formato 123–456"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Mascarado + limpar" :code="$maskedCode" :html="$maskedHtml">
            <x-slot:description>
                <code>masked</code> aplica <code>text-security</code> nas células (sem
                <code>type="password"</code>); <code>clearable</code> mostra o botão Limpar.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-otp
                    label="PIN mascarado"
                    name="demo_secret"
                    :length="4"
                    masked
                    clearable
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Reenvio com countdown" :code="$resendCode" :html="$resendHtml">
            <x-slot:description>
                <code>resend</code> + <code>resend-seconds</code>. Dispara
                <code>otp-resend</code> ao clicar.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-otp
                    label="Verificação por SMS"
                    name="demo_sms"
                    resend
                    :resend-seconds="30"
                    resend-label="Reenviar SMS"
                    hint="Enviamos um código para o seu celular."
                    center
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>sm</code>, <code>md</code> (padrão) e <code>lg</code>.
            </x-slot:description>
            <div class="flex w-full max-w-lg flex-col gap-4">
                <x-forms.input-otp size="sm" label="Pequeno" name="demo_otp_sm" />
                <x-forms.input-otp size="md" label="Médio" name="demo_otp_md" />
                <x-forms.input-otp size="lg" label="Grande" name="demo_otp_lg" />
            </div>
        </x-ui.example>

        <x-ui.example title="Variantes" :code="$variantsCode" :html="$variantsHtml">
            <x-slot:description>
                Mesmas variantes do input: <code>default</code>, <code>filled</code>, <code>flush</code>.
            </x-slot:description>
            <div class="flex w-full max-w-lg flex-col gap-4">
                <x-forms.input-otp variant="default" label="Default" name="demo_v_default" />
                <x-forms.input-otp variant="filled" label="Filled" name="demo_v_filled" />
                <x-forms.input-otp variant="flush" label="Flush" name="demo_v_flush" />
            </div>
        </x-ui.example>

        <x-ui.example title="Estados" :code="$statesCode" :html="$statesHtml">
            <x-slot:description>
                <code>state</code> ou <code>error</code> (também lê <code>$errors</code> pelo <code>name</code>).
            </x-slot:description>
            <div class="flex w-full max-w-lg flex-col gap-4">
                <x-forms.input-otp label="Sucesso" name="demo_ok" state="success" value="123456" />
                <x-forms.input-otp label="Erro" name="demo_bad" error="Código inválido ou expirado." />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores de foco" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Token de tema em <code>color</code> para o anel de foco.
            </x-slot:description>
            <div class="flex w-full max-w-lg flex-col gap-4">
                <x-forms.input-otp color="primary" label="Primary" name="demo_c_primary" />
                <x-forms.input-otp color="success" label="Success" name="demo_c_success" />
                <x-forms.input-otp color="warning" label="Warning" name="demo_c_warning" />
                <x-forms.input-otp color="danger" label="Danger" name="demo_c_danger" />
                <x-forms.input-otp color="info" label="Info" name="demo_c_info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Disabled / readonly / loading" :code="$disabledCode" :html="$disabledHtml">
            <div class="flex w-full max-w-lg flex-col gap-4">
                <x-forms.input-otp label="Desabilitado" disabled value="123456" />
                <x-forms.input-otp label="Readonly" readonly value="654321" />
                <x-forms.input-otp label="Loading" loading />
            </div>
        </x-ui.example>

        <x-ui.example title="Arredondado" :code="$roundedCode" :html="$roundedHtml">
            <x-slot:description>
                <code>rounded</code> aplica células em pílula.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-otp label="Arredondado" name="demo_round" rounded :length="4" />
            </div>
        </x-ui.example>

        <x-ui.example title="Eventos Alpine" :code="$eventsCode" :html="$eventsHtml">
            <x-slot:description>
                Escute <code>otp-complete</code>, <code>otp-change</code>, <code>otp-clear</code>
                e <code>otp-resend</code> no root do componente.
            </x-slot:description>
            <div class="w-full max-w-md">
                <x-forms.input-otp
                    label="Com eventos"
                    name="demo_events"
                    clearable
                    x-on:otp-complete="window.alert('OTP completo: ' + $event.detail.value)"
                />
            </div>
        </x-ui.example>

    </div>
</div>

    <x-ui.docs.api component="forms/input-otp/input-otp" title="x-forms.input-otp" />
</x-ui.docs>
