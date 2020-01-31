<?php

namespace SamMakesCode\CommandSwitches;

use Illuminate\Support\ServiceProvider;

class CommandSwitchesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }
}
