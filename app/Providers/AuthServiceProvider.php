<?php

namespace App\Providers;


use App\Models\User;
use App\Policies\UserPolicy;
use App\Policies\JokePolicy;
use App\Models\Joke;

class AuthServiceProvider extends \Illuminate\Foundation\Support\Providers\AuthServiceProvider 
{
    protected $policies = [
        User::class => UserPolicy::class,
        Joke::class => JokePolicy::class
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
