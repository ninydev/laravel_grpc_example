<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use StartCDL\Core\Events\Interface\EventInterface;
use StartCDL\Core\Events\TestEvent;
use StartCDL\Core\Events\Users\UserOpenRegisterEvent;
use StartCDL\Core\Listeners\AnyEventListener;
// use StartCDL\Core\Listeners\Zoho\UserOpenRegisterListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [

        UserOpenRegisterEvent::class => [
          \StartCDL\Core\Listeners\Zoho\UserOpenRegisterListener::class,  // Это попрет в zoho
          // AnyEventListener::class
            // И другие слушатели єтого события
        ],

        EventInterface::class => [
            AnyEventListener::class // Это попрет в notifications
        ]

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
