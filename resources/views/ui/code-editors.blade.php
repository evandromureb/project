<?php

use Livewire\Component;

return new class extends Component
{
    //
};
?>

@php
    // Evita tag PHP literal no source (Rector/php -l no .blade.php).
    $phpSample = '<' . "?php\n\n" . <<<'CODE'
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

// From https://github.com/laravel/laravel/blob/10.x/app/Console/Kernel.php
CODE;

    $jsSample = <<<'CODE'
// Named exports
export const person = { name: "Alice", age: 30 };

export function add(x, y = 0) {
  return x + y;
}

// Default export
const defaultAnimal = { name: "Default Animal" };
export default defaultAnimal;

// Generator function
export function* idGenerator() {
  let id = 0;
  while (true) {
    yield id++;
  }
}

// Using typeof for runtime type checks
console.log(typeof person);  // object
console.log(add(2, 3));      // 5
console.log(defaultAnimal);  // { name: "Default Animal" }

// Emulating 'satisfies' behavior using runtime checks
function createAnimal(animal) {
  if (typeof animal.name === 'string') {
    return animal; // Ensures the animal has a 'name' property
  }
  throw new Error("Animal must have a name");
}

const dog = createAnimal({ name: "Buddy", breed: "Golden Retriever" });
console.log(dog); // { name: 'Buddy', breed: 'Golden Retriever' }

// Generator usage
const generator = Module.idGenerator();
CODE;

    $cssSample = <<<'CODE'
.card {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  border-radius: 0.5rem;
  background: var(--card);
  color: var(--card-foreground);
}
CODE;

    $htmlSample = <<<'CODE'
<section class="hero">
  <h1>Shiki Code</h1>
  <p>Highlight TextMate com temas VS Code.</p>
  <button type="button">Começar</button>
</section>
CODE;

    $bashSample = <<<'CODE'
#!/usr/bin/env bash
set -euo pipefail

composer install
npm install
php artisan migrate --seed
CODE;

    $sqlSample = <<<'CODE'
SELECT u.id, u.name, COUNT(p.id) AS posts
FROM users u
LEFT JOIN posts p ON p.user_id = u.id
WHERE u.active = 1
GROUP BY u.id, u.name
ORDER BY posts DESC;
CODE;

    $jsonSample = <<<'CODE'
{
  "name": "template",
  "private": true,
  "type": "module"
}
CODE;

    $phpCode = <<<'BLADE'
        <x-ui.code-editor
            language="php"
            theme="monokai"
            filename="Kernel.php"
            :code="$php"
        />
        BLADE;

    $jsCode = <<<'BLADE'
        <x-ui.code-editor
            language="javascript"
            theme="monokai"
            filename="module.js"
            :code="$js"
        />
        BLADE;

    $themesCode = <<<'BLADE'
        <x-ui.code-editor theme="dracula" language="css" filename="dracula.css" :code="$css" />
        <x-ui.code-editor theme="nord" language="css" filename="nord.css" :code="$css" />
        <x-ui.code-editor theme="github-dark" language="css" filename="github-dark.css" :code="$css" />
        <x-ui.code-editor theme="tokyo-night" language="css" filename="tokyo-night.css" :code="$css" />
        <x-ui.code-editor theme="catppuccin-mocha" language="css" filename="mocha.css" :code="$css" />
        <x-ui.code-editor theme="vitesse-light" language="css" filename="vitesse.css" :code="$css" />
        BLADE;

    $langsCode = <<<'BLADE'
        <x-ui.code-editor theme="one-dark-pro" language="html" filename="hero.html" :code="$html" />
        <x-ui.code-editor theme="night-owl" language="bash" filename="setup.sh" :code="$bash" />
        <x-ui.code-editor theme="poimandres" language="sql" filename="report.sql" :code="$sql" />
        <x-ui.code-editor theme="rose-pine" language="json" filename="package.json" :code="$json" />
        BLADE;

/*     Estrutura real gerada pelo componente (classes .ui-code-editor* de resources/css/layout.css).
    O highlight token-a-token é gerado em runtime pelo Shiki (resources/js/code-editor.js);
    aqui o <pre><code> mostra o texto plano do trecho como aproximação estática. 
*/
    $phpHtml = <<<'HTML'
        <div class="ui-code-editor w-full min-w-0" role="region" aria-label="Código">
            <div class="ui-code-editor-header">
                <div class="ui-code-editor-title min-w-0 truncate">
                    <span class="inline-flex min-w-0 items-center gap-1.5 truncate">
                        <i class="bi bi-file-earmark-code shrink-0" aria-hidden="true"></i>
                        <span class="truncate">Kernel.php</span>
                    </span>
                </div>
                <button type="button" class="ui-code-editor-copy shrink-0" aria-label="Copiar">
                    <i class="bi bi-clipboard text-sm leading-none" aria-hidden="true"></i>
                    <span>Copiar</span>
                </button>
            </div>
            <div class="ui-code-editor-body">
                <!-- Highlight real (cores) gerado via Shiki no cliente; abaixo, texto plano -->
                <pre><code>namespace App\Console;

        class Kernel extends ConsoleKernel
        {
            protected function schedule(Schedule $schedule): void
            {
                // $schedule->command('inspire')->hourly();
            }
        }</code></pre>
            </div>
        </div>
        HTML;

    $jsHtml = <<<'HTML'
        <div class="ui-code-editor w-full min-w-0" role="region" aria-label="Código">
            <div class="ui-code-editor-header">
                <div class="ui-code-editor-title min-w-0 truncate">
                    <span class="inline-flex min-w-0 items-center gap-1.5 truncate">
                        <i class="bi bi-file-earmark-code shrink-0" aria-hidden="true"></i>
                        <span class="truncate">module.js</span>
                    </span>
                </div>
                <button type="button" class="ui-code-editor-copy shrink-0" aria-label="Copiar">
                    <i class="bi bi-clipboard text-sm leading-none" aria-hidden="true"></i>
                    <span>Copiar</span>
                </button>
            </div>
            <div class="ui-code-editor-body">
                <!-- Highlight real (cores) gerado via Shiki no cliente; abaixo, texto plano -->
                <pre><code>export const person = { name: "Alice", age: 30 };

        export function add(x, y = 0) {
          return x + y;
        }

        export function* idGenerator() { ... }</code></pre>
            </div>
        </div>
        HTML;

    $themesHtml = <<<'HTML'
        <div class="ui-code-editor w-full min-w-0" role="region" aria-label="Código">
            <div class="ui-code-editor-header">
                <div class="ui-code-editor-title min-w-0 truncate">
                    <span class="inline-flex min-w-0 items-center gap-1.5 truncate">
                        <i class="bi bi-file-earmark-code shrink-0" aria-hidden="true"></i>
                        <span class="truncate">dracula.css</span>
                    </span>
                </div>
                <button type="button" class="ui-code-editor-copy shrink-0" aria-label="Copiar">
                    <i class="bi bi-clipboard text-sm leading-none" aria-hidden="true"></i>
                    <span>Copiar</span>
                </button>
            </div>
            <div class="ui-code-editor-body">
                <!-- max-height: 14rem aplicado via estilo inline computado pelo Alpine (frameStyle) -->
                <pre><code>.card {
          display: flex;
          flex-direction: column;
          gap: 1rem;
          border-radius: 0.5rem;
          background: var(--card);
          color: var(--card-foreground);
        }</code></pre>
            </div>
        </div>
        <!-- Os outros 5 (nord.css, github-dark.css, tokyo-night.css, mocha.css, vitesse.css)
        repetem a mesma estrutura, cada um com seu próprio filename e tema Shiki. -->
        HTML;

    $langsHtml = <<<'HTML'
        <div class="ui-code-editor w-full min-w-0" role="region" aria-label="Código">
            <div class="ui-code-editor-header">
                <div class="ui-code-editor-title min-w-0 truncate">
                    <span class="inline-flex min-w-0 items-center gap-1.5 truncate">
                        <i class="bi bi-file-earmark-code shrink-0" aria-hidden="true"></i>
                        <span class="truncate">hero.html</span>
                    </span>
                </div>
                <button type="button" class="ui-code-editor-copy shrink-0" aria-label="Copiar">
                    <i class="bi bi-clipboard text-sm leading-none" aria-hidden="true"></i>
                    <span>Copiar</span>
                </button>
            </div>
            <div class="ui-code-editor-body">
                <pre><code>&lt;section class="hero"&gt;
          &lt;h1&gt;Shiki Code&lt;/h1&gt;
          &lt;button type="button"&gt;Começar&lt;/button&gt;
        &lt;/section&gt;</code></pre>
            </div>
        </div>
        <!-- Os outros 3 (setup.sh, report.sql, package.json) repetem a mesma estrutura,
        cada um com seu próprio filename, linguagem e tema Shiki. -->
        HTML;
@endphp

<x-ui.docs>
    <div class="flex flex-col gap-6">
        <x-ui.card>
            <p class="mb-0 text-sm text-muted-foreground [&_a]:text-primary [&_a]:underline-offset-2 [&_a]:hover:underline [&_code]:font-mono [&_code]:text-[0.8125rem] [&_code]:text-danger">
                <code>&lt;x-ui.code-editor&gt;</code> renderiza código com
                <a href="https://shiki.style/" target="_blank" rel="noopener">Shiki</a>
                (gramáticas TextMate / temas VS Code). As cores vêm dos estilos inline do tema —
                PHP e JavaScript abaixo usam <code>monokai</code>.
            </p>
        </x-ui.card>

        <div class="flex flex-col gap-10">
            <x-ui.example title="PHP · monokai" :code="$phpCode" :html="$phpHtml">
                <x-slot:description>
                    Tema <code>monokai</code> — keywords magenta, strings coral, funções verdes, tipos amarelos.
                </x-slot:description>
                <div class="w-full">
                    <x-ui.code-editor
                        language="php"
                        theme="monokai"
                        filename="Kernel.php"
                        :code="$phpSample"
                    />
                </div>
            </x-ui.example>

            <x-ui.example title="JavaScript · monokai" :code="$jsCode" :html="$jsHtml">
                <x-slot:description>
                    Tema <code>monokai</code> — exports, generators, <code>typeof</code> e números ciano.
                </x-slot:description>
                <div class="w-full">
                    <x-ui.code-editor
                        language="javascript"
                        theme="monokai"
                        filename="module.js"
                        :code="$jsSample"
                    />
                </div>
            </x-ui.example>

            <x-ui.example title="Temas distintos" :code="$themesCode" :html="$themesHtml">
                <x-slot:description>
                    Cada card usa um tema Shiki diferente no mesmo snippet CSS.
                </x-slot:description>
                <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
                    <x-ui.code-editor theme="dracula" language="css" filename="dracula.css" :code="$cssSample" max-height="14rem" />
                    <x-ui.code-editor theme="nord" language="css" filename="nord.css" :code="$cssSample" max-height="14rem" />
                    <x-ui.code-editor theme="github-dark" language="css" filename="github-dark.css" :code="$cssSample" max-height="14rem" />
                    <x-ui.code-editor theme="tokyo-night" language="css" filename="tokyo-night.css" :code="$cssSample" max-height="14rem" />
                    <x-ui.code-editor theme="catppuccin-mocha" language="css" filename="mocha.css" :code="$cssSample" max-height="14rem" />
                    <x-ui.code-editor theme="vitesse-light" language="css" filename="vitesse.css" :code="$cssSample" max-height="14rem" />
                </div>
            </x-ui.example>

            <x-ui.example title="Outras linguagens" :code="$langsCode" :html="$langsHtml">
                <x-slot:description>
                    HTML, Bash, SQL e JSON — cada um com tema próprio e colorização TextMate.
                </x-slot:description>
                <div class="grid w-full grid-cols-1 gap-4 lg:grid-cols-2">
                    <x-ui.code-editor theme="one-dark-pro" language="html" filename="hero.html" :code="$htmlSample" max-height="14rem" />
                    <x-ui.code-editor theme="night-owl" language="bash" filename="setup.sh" :code="$bashSample" max-height="14rem" />
                    <x-ui.code-editor theme="poimandres" language="sql" filename="report.sql" :code="$sqlSample" max-height="14rem" />
                    <x-ui.code-editor theme="rose-pine" language="json" filename="package.json" :code="$jsonSample" max-height="14rem" />
                </div>
            </x-ui.example>
        </div>

        <x-ui.docs.api reference="code-editor" />
    </div>
</x-ui.docs>
