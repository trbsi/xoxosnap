<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register(\Reliese\Coders\CodersServiceProvider::class);
        }

        if (env('APP_ENV') === 'production') {
            $this->app['url']->forceScheme('https');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
          /* \DB::listen(function ($query) {
             var_dump([
                 $query->sql,
                 //$query->bindings,
                // $query->time
             ]);
         });*/
    }
}
