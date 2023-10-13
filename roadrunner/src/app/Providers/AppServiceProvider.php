<?php

namespace App\Providers;

use App\Services\Interface\SocketServiceInterface;
use App\Services\SocketService;
use App\Services\UserOpenRegisterService;
use Illuminate\Support\ServiceProvider;
use StartCDL\Core\Services\Zoho\Interface\UserOpenRegisterServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Тут я указываю что при создании переменной под этот интерфейс
        // будет создан экземпляр этого класса
        $this->app->bind(
            UserOpenRegisterServiceInterface::class,
            UserOpenRegisterService::class
        );

        // а тут Лара будет сама следить, что бы экземпляр был только один
        $this->app->singleton(
            SocketServiceInterface::class,
            SocketService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
