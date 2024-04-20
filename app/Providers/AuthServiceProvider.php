<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use PharIo\Version\GreaterThanOrEqualToVersionConstraint;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define("update-user", function (User $auth_user, User $target_user){
            return ($auth_user->id == $target_user->id || $auth_user->isadmin);
        });

        Gate::define("show-users", function (User $user){
            return $user->isadmin;
        });
    }
}
