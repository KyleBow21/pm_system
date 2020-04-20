<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        // Test gates for messing around with auth
        Gate::define('create-project', function($user) {
            return $user->role === "admin";
        });

        Gate::define('update-project', function($user) {
            return $user->role === "admin";
        });

        Gate::define('delete-project', function($user) {
            return $user->role === "admin";
        });

        
    }
}
