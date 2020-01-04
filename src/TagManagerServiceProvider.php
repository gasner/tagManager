<?php

namespace gasner\TagManager;


use Illuminate\Support\ServiceProvider;

class TagManagerServiceProvider extends ServiceProvider
{
    const MIGRATIONS_PATH = __DIR__ . '/../database/migrations';

    public function register()
    {
        $this->loadMigrationsFrom(self::MIGRATIONS_PATH);

        $this->mergeConfigFrom(
            __DIR__ . '/config/config.php', 'tagManager'
        );

    }

    public function boot()
    {
        $this->publishes([
            self::MIGRATIONS_PATH => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('tagManager.php'),
        ]);

    }
}
