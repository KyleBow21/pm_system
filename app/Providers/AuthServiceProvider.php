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

        // ! Lot's of repeating going on here, will have to optimize

        // Gates for project CRUD
        Gate::define('create-project', function($user) {
            return $user->role === "admin";
        });

        Gate::define('update-project', function($user) {
            return $user->role === "admin";
        });

        Gate::define('delete-project', function($user) {
            return $user->role === "admin";
        });

        // Gates for marking form CRUD
        // TODO: Make sure that the user who owns the project creates this form
        Gate::define('view-marking-forms', function($user) {
            if($user->role === "staff") {
                return "admin";
            } else {
                return "staff";
            }
        });

        Gate::define('create-marking-form', function($user) {
            return $user->role === "admin";
        });

        Gate::define('update-marking-form', function($user) {
            return $user->role === "staff";
        });

        Gate::define('delete-marking-form', function($data) {
            return $user->role === "staff";
        });
    }
}
