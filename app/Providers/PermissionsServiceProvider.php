<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use App\Models\Permission;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->slug, function($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        } catch(\Exception $e) {
            report($e);
            return false;
        }

        Blade::directive('role', function ($role) {
            return "if(auth()->check() && auth()->user()->hasrole({$role})) :";
        });

        Blade::directive('endrole', function ($role) {
            return 'endif;';
        });
    }
}
