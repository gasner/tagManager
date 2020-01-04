<?php

namespace gasner\TagManager\Tests;


class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp() :void
    {
        parent::setUp();


        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
//        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->withFactories(__DIR__.'/../database/factories');
        $this->artisan('migrate');

        // and other test setup steps you need to perform
    }

    protected function getPackageProviders($app)
    {
        return ["gasner\TagManager\TagManagerServiceProvider"];
    }
}
