<?php

namespace Aaran\Core\Setup\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AaranModel extends Command
{
    protected $signature = 'aaran:model {name} {--all} {--path=} {--force}';
    protected $description = 'Generate a module skeleton using stubs';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $table = Str::snake(Str::pluralStudly($name));
        $class = $name;
        $class_lower = Str::lower($name);

        $relativePath = $this->option('path') ?? '';
        $relativePath = trim(str_replace(['.', '\\'], DIRECTORY_SEPARATOR, $relativePath), DIRECTORY_SEPARATOR);
        $basePath = base_path("aaran" . DIRECTORY_SEPARATOR . ($relativePath ? "$relativePath/" : ''));

        $this->makeFromStub('model', "{$basePath}/Models/{$class}.php", [
            '{{ class }}' => $class,
            '{{ basePath }}' => $relativePath,
        ]);

        if ($this->option('all')) {
            $timestamp = now()->format('Y_m_d_His');

            $this->makeFromStub('migration', "{$basePath}/Database/Migrations/{$timestamp}_create_{$table}_table.php", [
                '{{ table }}' => $table,
            ]);

            $this->makeFromStub('factory', "{$basePath}/Database/Factories/{$class}Factory.php", [
                '{{ class }}' => $class,
                '{{ class_lower }}' => $class_lower,
                '{{ model }}' => $class,
                '{{ basePath }}' => $relativePath,
            ]);

            $this->makeFromStub('seeder', "{$basePath}/Database/Seeders/{$class}Seeder.php", [
                '{{ class }}' => $class,
                '{{ model }}' => $class,
                '{{ basePath }}' => $relativePath,
            ]);


            $this->makeFromStub('livewire_class', "{$basePath}/Livewire/Class/{$class}List.php", [
                '{{ class }}' => $class,
                '{{ model }}' => $class,
                '{{ basePath }}' => $relativePath,
                '{{ class_lower }}' => $class_lower,
            ]);

            $this->makeFromStub('livewire_view', "{$basePath}/Livewire/Views/{$class_lower}-list.blade.php", [
                '{{ class }}' => $class,
                '{{ model }}' => $class,
                '{{ basePath }}' => $relativePath,
            ]);
        }

        $this->info("Module {$name}: model {$class} and files generated.");
    }

    protected function makeFromStub($stubName, $destination, array $replacements): void
    {
        $stubPath = base_path("aaran/Core/Setup/Stubs/{$stubName}.stub");

        if (!File::exists($stubPath)) {
            $this->error("Stub missing: {$stubPath}");
            return;
        }

        if (File::exists($destination) && !$this->option('force')) {
            $this->warn("Skipped (already exists): {$destination}");
            return;
        }

        $content = File::get($stubPath);

        foreach ($replacements as $search => $replace) {
            $content = str_replace($search, $replace, $content);
        }

        File::ensureDirectoryExists(dirname($destination));
        File::put($destination, $content);
        $this->info("Created: {$destination}");
    }
}
