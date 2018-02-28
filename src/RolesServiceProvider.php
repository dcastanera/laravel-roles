<?php

namespace DCastanera\Roles;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Migrations
         * This copies the migrations for the roles and permissions tables to the
         * default database/migrations directory.
         */

        $this->loadMigrationsFrom(__DIR__.'/migrations');

        // $this->publishes([
        //     __DIR__.'/migrations' => base_path('database/migrations')
        // ]);

        /**
         * Role Blade variable.
         * This blade variable checks the role or array of roles to see if they
         * are attached to the current logged in user.
         */
        Blade::if('role', function ($role) {
			return \Auth::user()->has_role($role);
		});
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
