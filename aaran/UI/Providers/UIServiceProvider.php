<?php

namespace Aaran\UI\Providers;

use Aaran\UI\Livewire\Class\Index;

use Aaran\UI\Livewire\Class\Show;
use Aaran\UI\Livewire\Class\MarkdownEditor;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class UIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(UIRouteProvider::class);
    }

    public function boot()
    {
        $this->registerViews();

         Livewire::component('Ui::markdown-editor', MarkdownEditor::class);

         Livewire::component('ui::tenant-setup', Index::class);
         Livewire::component('ui::show', Show::class);

         Livewire::component('Ui::tenant-setup', Index::class);

         View::addNamespace('Ui',base_path('aaran/UI/Resources/components'));

        View::addNamespace('Ui', base_path('aaran/UI/Livewire/Views'));

        Blade::directive('markdown', function ($expression) {
            return "<?php echo \Illuminate\Support\Str::markdown($expression); ?>";
        });

    }

    private function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources', 'Ui'); // Important: Load views from module

        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'templates');

        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', 'show');

        $this->loadViewsFrom(__DIR__ . '/../Livewire/Views', '/ui/{slug}');
    }
}
