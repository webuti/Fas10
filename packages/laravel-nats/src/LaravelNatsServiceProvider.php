<?php

namespace Qmerfp\LaravelNats;

use Illuminate\Support\ServiceProvider;

class LaravelNatsServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $this->publishes([
            __DIR__ . "/../config/laravelnats.php" => config_path("laravelnats.php")
        ]);

        include __DIR__ . "/../vendor/autoload.php";

    }

    public function register()
    {


        $this->app->singleton(LaravelNats::class, function () {

            return new LaravelNats();
        });


    }

}
