<?php

namespace App\Providers;

use Illuminate\Auth\Events\Failed;
use App\Listeners\FailedLoginListener;
use Illuminate\Auth\Events\Lockout;
use App\Listeners\LockoutListener;
use Illuminate\Auth\Events\Authenticated;
use App\Listeners\SuccessfulLoginListener;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    protected $listen = [
        Failed::class => [
            FailedLoginListener::class,
        ],
        Lockout::class => [
            LockoutListener::class,
        ],
        Authenticated::class => [
            SuccessfulLoginListener::class,
        ],
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
