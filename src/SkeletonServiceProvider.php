<?php

namespace VendorName\Skeleton;

use Illuminate\Support\ServiceProvider;
use VendorName\Skeleton\Commands\SkeletonCommand;

class SkeletonServiceProvider extends ServiceProvider
{
    private string $name = 'skeleton';

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/skeleton.php', $this->name);
        $this->loadViewsFrom(__DIR__ . '/../resources/views', $this->name);
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                SkeletonCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../config/skeleton.php' => config_path('skeleton.php'),
        ], 'skeleton-config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/skeleton'),
        ], 'skeleton-views');
    }
}
