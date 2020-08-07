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

        // Implicitamente concede à função "admin" todas as permissões
        // Isso funciona no aplicativo usando funções relacionadas ao gate como:
        // auth()->user()->can() e @can()
        Gate::before(function ($user, $ability) {
            if ($user->hasRole(1)) {
                return true;
            }
        });
    }
}
