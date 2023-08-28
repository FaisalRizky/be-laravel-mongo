<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Core\User\Service\UserServiceInterface;
use Core\User\Service\UserService;
use Core\Transaction\Service\TransactionServiceInterface;
use Core\Transaction\Service\TransactionService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(TransactionServiceInterface::class, TransactionService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
