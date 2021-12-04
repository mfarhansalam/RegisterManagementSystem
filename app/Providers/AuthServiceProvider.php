<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is-admin', function($user){
            return in_array(1, $user->roles->pluck('id')->toArray() );
        });

        Gate::define('is-manager', function($user){
            return in_array(2, $user->roles->pluck('id')->toArray() );
        });

        Gate::define('is-expired', function($user){
            return ($user->subscription 
             && $user->subscription->expire_at->lessThan( Carbon::now() ) );
        });

        Gate::define('is-active', function($user){
            return ( $user->subscription && 
            $user->subscription->expire_at->greaterThan( Carbon::now() ) );
        });

    }
}
