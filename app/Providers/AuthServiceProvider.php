<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //注册发出访问令牌并撤销访问令牌、客户端和个人访问令牌所必需的路由
        Passport::routes();

        //设置token的过期时间为2分钟
        Passport::tokensExpireIn(Carbon::now()->addMinutes(2));
        //设置token的刷新时间为5分钟
        Passport::refreshTokensExpireIn(Carbon::now()->addMinutes(5));
    }
}