<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CurlConnectServiceProvider extends ServiceProvider {
    public function register()
    {
        $this->app->bind(\App\Interfaces\CurlConnecttionInterface::class, \App\Repositories\CurlConnectionRepository::class);
    }
}
