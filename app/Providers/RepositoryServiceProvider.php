<?php

namespace ManagerMembers\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'ManagerMembers\Repositories\UserRepository',
            'ManagerMembers\Repositories\UserRepositoryEloquent'
        );
        $this->app->bind(
            'ManagerMembers\Repositories\MemberRepository',
            'ManagerMembers\Repositories\MemberRepositoryEloquent'
        );
    }
}
