<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

   
    public function boot(): void
    {
       
        Gate::define('admin-access', function ($user) {
            $roles = explode(',', $user->role);
            return in_array('admin', $roles);
        });
        
    }
}
