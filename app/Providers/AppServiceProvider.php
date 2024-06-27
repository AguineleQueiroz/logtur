<?php

namespace App\Providers;

use App\Notifications\Notification;
use Filament\Notifications\Notification as BaseNotification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        Notification::configureUsing(function (Notification $notification): void {
//            $notification->view('views.notifications.notification');
//        });
//        $this->app->bind(BaseNotification::class, Notification::class);
    }
}
