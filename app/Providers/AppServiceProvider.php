<?php

namespace App\Providers;

use Auth;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        VerifyEmail::toMailUsing(function ($notifiable) {
            $verifyUrl = URL::temporarySignedRoute(
                'verification.verify', 
                Carbon::now()->addMinutes(60), 
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification())
                ]
            );

            return (new MailMessage)
                ->subject('Welcome to Agx.africa')
                ->markdown('emails.verifyEmail', [
                                                    'url' => $verifyUrl,
                                                    'user' => Auth::user()->full_name
                                                ]);
        });
    }
}
