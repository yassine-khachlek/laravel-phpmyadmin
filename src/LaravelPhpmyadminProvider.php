<?php

namespace Yk\LaravelPhpmyadmin;

use Illuminate\Support\ServiceProvider;

class LaravelPhpmyadminProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->router->group(['namespace' => 'Yk\LaravelPhpmyadmin\App\Http\Controllers'],
            function(){
                require __DIR__.'/Routes/web.php';
            }
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


    }
}
