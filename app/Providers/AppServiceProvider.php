<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    // protected $policies = [
    //     'App\Models\Model' => 'App\Policies\ModelPolicy'
    // ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // set the public path to this directory
        $this->app->bind('path.public', function() {
            return base_path('public_html');
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
