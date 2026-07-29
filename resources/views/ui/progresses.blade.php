<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    $defaultCode = <<<'BLADE'
        <x-ui.progress :value="0" />
        <x-ui.progress :value="25" />
        <x-ui.progress :value="50" />
        <x-ui.progress :value="75" />
        <x-ui.progress :value="100" />
        BLADE;

    $colorsCode = <<<'BLADE'
        <x-ui.progress :value="15" color="primary" />
        <x-ui.progress :value="25" color="success" />
        <x-ui.progress :value="50" color="info" />
        <x-ui.progress :value="75" color="warning" />
        <x-ui.progress :value="100" color="danger" />
        BLADE;

    $sizesCode = <<<'BLADE'
        <x-ui.progress :value="40" size="xs" color="primary" />
        <x-ui.progress :value="40" size="sm" color="primary" />
        <x-ui.progress :value="40" size="md" color="primary" />
        <x-ui.progress :value="40" size="lg" color="primary" />
        <x-ui.progress :value="40" size="xl" color="primary" />
        BLADE;

    $labelsCode = <<<'BLADE'
        <x-ui.progress :value="25" show-label size="lg" />
        <x-ui.progress :value="55" show-label label-position="outside" color="success" />
        <x-ui.progress :value="70" show-label label-position="end" color="info" />
        BLADE;

    $stripedCode = <<<'BLADE'
        <x-ui.progress :value="45" striped color="primary" />
        <x-ui.progress :value="60" striped color="success" />
        <x-ui.progress :value="75" striped animated color="info" />
        BLADE;

    $gradientCode = <<<'BLADE'
        <x-ui.progress :value="30" gradient color="primary" />
        <x-ui.progress :value="55" gradient color="success" />
        <x-ui.progress :value="80" gradient color="danger" />
        BLADE;

    $softCode = <<<'BLADE'
        <x-ui.progress :value="40" soft color="primary" />
        <x-ui.progress :value="55" soft color="success" />
        <x-ui.progress :value="70" soft color="warning" />
        BLADE;

    $stackedCode = <<<'BLADE'
        <x-ui.progress>
            <x-ui.progress.progress-bar :value="15" color="primary" />
            <x-ui.progress.progress-bar :value="30" color="success" />
            <x-ui.progress.progress-bar :value="20" color="info" />
        </x-ui.progress>
        BLADE;

    $segmentsCode = <<<'BLADE'
        <x-ui.progress :segments="[
            ['value' => 20, 'color' => 'danger'],
            ['value' => 25, 'color' => 'warning'],
            ['value' => 30, 'color' => 'success'],
        ]" />
        BLADE;

    $indeterminateCode = <<<'BLADE'
        <x-ui.progress indeterminate color="primary" />
        <x-ui.progress indeterminate striped animated color="info" />
        BLADE;

    $contentCode = <<<'BLADE'
        <x-ui.progress
            :value="30"
            color="secondary"
            soft
            show-label
            title="Atualização em progresso…"
            meta="1 min restante"
        />
        <x-ui.progress
            :value="82"
            color="danger"
            soft
            show-label
            title="Upload em andamento…"
            meta="25s restantes"
        />
        BLADE;

    $circleCode = <<<'BLADE'
        <x-ui.progress type="circle" :value="25" show-label color="primary" />
        <x-ui.progress type="circle" :value="55" show-label color="success" size="lg" />
        <x-ui.progress type="circle" :value="80" show-label color="danger" size="xl" />
        <x-ui.progress type="circle" indeterminate show-label color="info" />
        BLADE;

    $roundedCode = <<<'BLADE'
        <x-ui.progress :value="50" rounded="none" color="primary" />
        <x-ui.progress :value="50" rounded="sm" color="primary" />
        <x-ui.progress :value="50" rounded="md" color="primary" />
        <x-ui.progress :value="50" rounded="full" color="primary" />
        BLADE;

    $maxCode = <<<'BLADE'
        <x-ui.progress :value="3" :max="10" show-label label-position="end" color="primary" />
        <x-ui.progress :value="7" :max="10" show-label label="7 de 10" label-position="outside" color="success" />
        BLADE;

    $defaultHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-3">
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 0%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 50%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        HTML;

    $colorsHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-3">
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 15%" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-success text-success-foreground" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-info text-info-foreground" style="width: 50%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-warning text-warning-foreground" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-danger text-danger-foreground" style="width: 100%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        HTML;

    $sizesHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-3">
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-1 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 40%" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-1.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 40%" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 40%" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-4 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 40%" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 40%" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        HTML;

    $labelsHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-4">
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-4 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground text-xs" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" aria-valuetext="25%">
                        <span class="px-1">25%</span>
                    </div>
                </div>
            </div>

            <div class="ui-progress w-full">
                <div class="mb-1.5 flex items-center justify-between gap-3">
                    <span class="text-sm font-medium text-success">55%</span>
                </div>
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-success text-success-foreground" style="width: 55%" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <div class="ui-progress w-full">
                <div class="flex w-full items-center gap-3">
                    <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                        <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-info text-info-foreground" style="width: 70%" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="shrink-0 text-sm font-medium tabular-nums text-info">70%</span>
                </div>
            </div>
        </div>
        HTML;

    $stripedHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-3">
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground ui-progress-bar-striped" style="width: 45%" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-success text-success-foreground ui-progress-bar-striped" style="width: 60%" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-info text-info-foreground ui-progress-bar-striped ui-progress-bar-animated" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        HTML;

    $gradientHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-3">
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-gradient-to-r from-primary to-primary/70 text-primary-foreground" style="width: 30%" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-gradient-to-r from-success to-success/70 text-success-foreground" style="width: 55%" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-gradient-to-r from-danger to-danger/70 text-danger-foreground" style="width: 80%" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        HTML;

    $softHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-3">
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-primary/15">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 40%" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-success/15">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-success text-success-foreground" style="width: 55%" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-warning/15">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-warning text-warning-foreground" style="width: 70%" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        HTML;

    $roundedHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-3">
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-none bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 50%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-sm bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 50%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-md bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 50%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 50%" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        HTML;

    $stackedHtml = <<<'HTML'
        <div class="ui-progress w-full">
            <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted flex" role="group" aria-label="Progresso">
                <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 15%" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-success text-success-foreground" style="width: 30%" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-info text-info-foreground" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        HTML;

    $segmentsHtml = <<<'HTML'
        <div class="ui-progress w-full">
            <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted flex" role="group" aria-label="Progresso">
                <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-danger text-danger-foreground" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-warning text-warning-foreground" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-success text-success-foreground" style="width: 30%" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        HTML;

    $indeterminateHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-3">
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted ui-progress-indeterminate" role="progressbar" aria-busy="true" aria-valuemin="0" aria-valuemax="100" aria-label="Carregando">
                    <div class="ui-progress-bar h-full bg-primary" aria-hidden="true"></div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted ui-progress-indeterminate" role="progressbar" aria-busy="true" aria-valuemin="0" aria-valuemax="100" aria-label="Carregando">
                    <div class="ui-progress-bar h-full bg-info ui-progress-bar-striped ui-progress-bar-animated" aria-hidden="true"></div>
                </div>
            </div>
        </div>
        HTML;

    $maxHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-4">
            <div class="ui-progress w-full">
                <div class="flex w-full items-center gap-3">
                    <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                        <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-primary text-primary-foreground" style="width: 30%" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="10"></div>
                    </div>
                    <span class="shrink-0 text-sm font-medium tabular-nums text-primary">30%</span>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="mb-1.5 flex items-center justify-between gap-3">
                    <span class="text-sm font-medium text-success">7 de 10</span>
                </div>
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-muted">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-success text-success-foreground" style="width: 70%" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="10"></div>
                </div>
            </div>
        </div>
        HTML;

    $contentHtml = <<<'HTML'
        <div class="flex w-full flex-col gap-4">
            <div class="ui-progress w-full">
                <div class="mb-2 flex items-center justify-between gap-3">
                    <p class="mb-0 text-sm font-medium text-foreground">
                        <span class="font-semibold text-secondary">30%</span>
                        Atualização em progresso…
                    </p>
                    <p class="mb-0 shrink-0 text-sm text-muted-foreground">1 min restante</p>
                </div>
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-secondary/15">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-secondary text-secondary-foreground text-[10px]" style="width: 30%" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" aria-valuetext="30%">
                        <span class="px-1">30%</span>
                    </div>
                </div>
            </div>
            <div class="ui-progress w-full">
                <div class="mb-2 flex items-center justify-between gap-3">
                    <p class="mb-0 text-sm font-medium text-foreground">
                        <span class="font-semibold text-danger">82%</span>
                        Upload em andamento…
                    </p>
                    <p class="mb-0 shrink-0 text-sm text-muted-foreground">25s restantes</p>
                </div>
                <div class="relative w-full overflow-hidden h-2.5 rounded-full bg-danger/15">
                    <div class="ui-progress-bar relative flex h-full min-w-0 items-center justify-center overflow-visible font-semibold whitespace-nowrap bg-danger text-danger-foreground text-[10px]" style="width: 82%" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100" aria-valuetext="82%">
                        <span class="px-1">82%</span>
                    </div>
                </div>
            </div>
        </div>
        HTML;

    $circleHtml = <<<'HTML'
        <div class="flex flex-wrap items-center gap-6">
            <div class="ui-progress relative inline-flex items-center justify-center size-24" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" aria-label="25%">
                <svg class="size-full -rotate-90" viewBox="0 0 100 100" aria-hidden="true">
                    <circle class="ui-progress-circle-track fill-none" cx="50" cy="50" r="46" stroke-width="8" />
                    <circle class="fill-none stroke-primary" cx="50" cy="50" r="46" stroke-width="8" stroke-linecap="round" stroke-dasharray="289.03" stroke-dashoffset="216.77" />
                </svg>
                <span class="absolute inset-0 flex items-center justify-center font-semibold text-sm text-primary">25%</span>
            </div>

            <div class="ui-progress relative inline-flex items-center justify-center size-28" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" aria-label="55%">
                <svg class="size-full -rotate-90" viewBox="0 0 100 100" aria-hidden="true">
                    <circle class="ui-progress-circle-track fill-none" cx="50" cy="50" r="45" stroke-width="10" />
                    <circle class="fill-none stroke-success" cx="50" cy="50" r="45" stroke-width="10" stroke-linecap="round" stroke-dasharray="282.74" stroke-dashoffset="127.23" />
                </svg>
                <span class="absolute inset-0 flex items-center justify-center font-semibold text-lg text-success">55%</span>
            </div>

            <div class="ui-progress relative inline-flex items-center justify-center size-36" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" aria-label="80%">
                <svg class="size-full -rotate-90" viewBox="0 0 100 100" aria-hidden="true">
                    <circle class="ui-progress-circle-track fill-none" cx="50" cy="50" r="44" stroke-width="12" />
                    <circle class="fill-none stroke-danger" cx="50" cy="50" r="44" stroke-width="12" stroke-linecap="round" stroke-dasharray="276.46" stroke-dashoffset="55.29" />
                </svg>
                <span class="absolute inset-0 flex items-center justify-center font-semibold text-xl text-danger">80%</span>
            </div>

            <div class="ui-progress relative inline-flex items-center justify-center size-24" role="progressbar" aria-busy="true" aria-valuemin="0" aria-valuemax="100" aria-label="Progresso">
                <svg class="size-full -rotate-90" viewBox="0 0 100 100" aria-hidden="true">
                    <circle class="ui-progress-circle-track fill-none" cx="50" cy="50" r="46" stroke-width="8" />
                    <circle class="fill-none stroke-info origin-center animate-spin" cx="50" cy="50" r="46" stroke-width="8" stroke-linecap="round" stroke-dasharray="289.03" stroke-dashoffset="216.77" />
                </svg>
                <span class="absolute inset-0 flex items-center justify-center font-semibold text-sm text-info">…</span>
            </div>
        </div>
        HTML;
@endphp

<x-ui.docs>
<div class="flex flex-col gap-6">
    <x-ui.card>
        <p class="mb-0 text-sm text-muted-foreground [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
            <code>&lt;x-ui.progress&gt;</code> exibe progresso linear ou circular com cores de tema,
            tamanhos, labels, listras animadas, gradiente, trilho soft, barras empilhadas e estado
            indeterminado. Use <code>&lt;x-ui.progress.progress-bar&gt;</code> como filho para stacked.
        </p>
    </x-ui.card>

    <div class="flex flex-col gap-10">
        <x-ui.example title="Padrão" :code="$defaultCode" :html="$defaultHtml">
            <x-slot:description>
                Controle o preenchimento com <code>value</code> (0–100 por padrão).
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.progress :value="0" />
                <x-ui.progress :value="25" />
                <x-ui.progress :value="50" />
                <x-ui.progress :value="75" />
                <x-ui.progress :value="100" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cores" :code="$colorsCode" :html="$colorsHtml">
            <x-slot:description>
                Use <code>color</code> com os tokens do tema.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.progress :value="15" color="primary" />
                <x-ui.progress :value="25" color="success" />
                <x-ui.progress :value="50" color="info" />
                <x-ui.progress :value="75" color="warning" />
                <x-ui.progress :value="100" color="danger" />
            </div>
        </x-ui.example>

        <x-ui.example title="Tamanhos" :code="$sizesCode" :html="$sizesHtml">
            <x-slot:description>
                <code>size</code>: <code>xs</code>, <code>sm</code>, <code>md</code>, <code>lg</code>, <code>xl</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.progress :value="40" size="xs" color="primary" />
                <x-ui.progress :value="40" size="sm" color="primary" />
                <x-ui.progress :value="40" size="md" color="primary" />
                <x-ui.progress :value="40" size="lg" color="primary" />
                <x-ui.progress :value="40" size="xl" color="primary" />
            </div>
        </x-ui.example>

        <x-ui.example title="Labels" :code="$labelsCode" :html="$labelsHtml">
            <x-slot:description>
                <code>show-label</code> com <code>label-position</code>:
                <code>inside</code>, <code>outside</code> ou <code>end</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.progress :value="25" show-label size="lg" />
                <x-ui.progress :value="55" show-label label-position="outside" color="success" />
                <x-ui.progress :value="70" show-label label-position="end" color="info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Listrado e animado" :code="$stripedCode" :html="$stripedHtml">
            <x-slot:description>
                <code>striped</code> adiciona listras; <code>animated</code> anima o movimento.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.progress :value="45" striped color="primary" />
                <x-ui.progress :value="60" striped color="success" />
                <x-ui.progress :value="75" striped animated color="info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Gradiente" :code="$gradientCode" :html="$gradientHtml">
            <x-slot:description>
                <code>gradient</code> aplica um degradê na cor do token.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.progress :value="30" gradient color="primary" />
                <x-ui.progress :value="55" gradient color="success" />
                <x-ui.progress :value="80" gradient color="danger" />
            </div>
        </x-ui.example>

        <x-ui.example title="Trilho soft" :code="$softCode" :html="$softHtml">
            <x-slot:description>
                <code>soft</code> coloriza o trilho com o token em baixa opacidade.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.progress :value="40" soft color="primary" />
                <x-ui.progress :value="55" soft color="success" />
                <x-ui.progress :value="70" soft color="warning" />
            </div>
        </x-ui.example>

        <x-ui.example title="Cantos" :code="$roundedCode" :html="$roundedHtml">
            <x-slot:description>
                <code>rounded</code>: <code>none</code>, <code>sm</code>, <code>md</code>, <code>full</code>.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.progress :value="50" rounded="none" color="primary" />
                <x-ui.progress :value="50" rounded="sm" color="primary" />
                <x-ui.progress :value="50" rounded="md" color="primary" />
                <x-ui.progress :value="50" rounded="full" color="primary" />
            </div>
        </x-ui.example>

        <x-ui.example title="Barras empilhadas (slot)" :code="$stackedCode" :html="$stackedHtml">
            <x-slot:description>
                Filhos <code>&lt;x-ui.progress.progress-bar&gt;</code> empilham segmentos no mesmo trilho.
            </x-slot:description>
            <x-ui.progress>
                <x-ui.progress.progress-bar :value="15" color="primary" />
                <x-ui.progress.progress-bar :value="30" color="success" />
                <x-ui.progress.progress-bar :value="20" color="info" />
            </x-ui.progress>
        </x-ui.example>

        <x-ui.example title="Segments (array)" :code="$segmentsCode" :html="$segmentsHtml">
            <x-slot:description>
                Alternativa sem slot: passe <code>:segments</code> com <code>value</code> e <code>color</code>.
            </x-slot:description>
            <x-ui.progress :segments="[
                ['value' => 20, 'color' => 'danger'],
                ['value' => 25, 'color' => 'warning'],
                ['value' => 30, 'color' => 'success'],
            ]" />
        </x-ui.example>

        <x-ui.example title="Indeterminado" :code="$indeterminateCode" :html="$indeterminateHtml">
            <x-slot:description>
                <code>indeterminate</code> para carregamento sem valor conhecido.
            </x-slot:description>
            <div class="flex w-full flex-col gap-3">
                <x-ui.progress indeterminate color="primary" />
                <x-ui.progress indeterminate striped animated color="info" />
            </div>
        </x-ui.example>

        <x-ui.example title="Max customizado" :code="$maxCode" :html="$maxHtml">
            <x-slot:description>
                Use <code>max</code> quando a escala não for 0–100; <code>label</code> personaliza o texto.
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.progress :value="3" :max="10" show-label label-position="end" color="primary" />
                <x-ui.progress :value="7" :max="10" show-label label="7 de 10" label-position="outside" color="success" />
            </div>
        </x-ui.example>

        <x-ui.example title="Com conteúdo" :code="$contentCode" :html="$contentHtml">
            <x-slot:description>
                <code>title</code> e <code>meta</code> montam um cabeçalho acima da barra (estilo upload/update).
            </x-slot:description>
            <div class="flex w-full flex-col gap-4">
                <x-ui.progress
                    :value="30"
                    color="secondary"
                    soft
                    show-label
                    title="Atualização em progresso…"
                    meta="1 min restante"
                />
                <x-ui.progress
                    :value="82"
                    color="danger"
                    soft
                    show-label
                    title="Upload em andamento…"
                    meta="25s restantes"
                />
            </div>
        </x-ui.example>

        <x-ui.example title="Circular" :code="$circleCode" :html="$circleHtml">
            <x-slot:description>
                <code>type="circle"</code> renderiza um anel SVG; combine com <code>show-label</code> e <code>indeterminate</code>.
            </x-slot:description>
            <div class="flex flex-wrap items-center gap-6">
                <x-ui.progress type="circle" :value="25" show-label color="primary" />
                <x-ui.progress type="circle" :value="55" show-label color="success" size="lg" />
                <x-ui.progress type="circle" :value="80" show-label color="danger" size="xl" />
                <x-ui.progress type="circle" indeterminate show-label color="info" />
            </div>
        </x-ui.example>
    </div>
</div>

    <x-ui.docs.api reference="progress" />
</x-ui.docs>
