<?php

declare(strict_types=1);

namespace Codeat3\BladeMakiIcons;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeMakiIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-maki-icons', []);

            $factory->add('maki-icons', array_merge(['path' => __DIR__ . '/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-maki-icons.php', 'blade-maki-icons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/svg' => public_path('vendor/blade-maki-icons'),
            ], 'blade-maki-icons');

            $this->publishes([
                __DIR__ . '/../config/blade-maki-icons.php' => $this->app->configPath('blade-maki-icons.php'),
            ], 'blade-maki-icons-config');
        }
    }
}
