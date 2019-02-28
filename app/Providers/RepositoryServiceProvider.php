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
            'ManagerMember\Repositories\UserRepository',
            'ManagerMember\Repositories\UserRepositoryEloquent'
        );
        $this->app->bind(
            'ManagerMember\Repositories\MemberRepository',
            'ManagerMember\Repositories\MemberRepositoryEloquent'
        );
    }
}
