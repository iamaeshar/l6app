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

        Gate::define('isAdmin', function ($user) {
            return in_array('Administrator', $user->roles->pluck('name')->toArray());
        });

        Gate::define('isAllowed', function ($user, $allowed) {
            $allowed = explode(":", $allowed);
            return array_intersect($allowed, $user->roles->pluck('name')->toArray());
        });

        // Gate::define('editPost', function ($user, $post_id) {
        //     return $user->id === $post_id;
        // });

        // Gate::define('deletePost', function ($user, $post_id) {
        //     return $user->id === $post_id;
        // });

        Gate::define('editPost', 'App\Gates\PostGates@editPost');
        Gate::define('deletePost', 'App\Gates\PostGates@deletePost');
    }
}
