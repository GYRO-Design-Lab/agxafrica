<?php

namespace App\Providers;

use Auth;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use App\Mail\VerifyEmail as VE;

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

            // 
            //     ->subject('Welcome to Agx.africa')
            //     ->markdown('emails.verifyEmail', [
            //                                         'url' => $verifyUrl,
            //                                         'user' => $notifiable->full_name
            //                                     ]);

            $message = (new VE($verifyUrl, $notifiable->full_name))->render();

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: AgX Africa <agxafrica@gmail.com>' . "\r\n";
            
            mail($notifiable->email, "Welcome To AgX Africa", $message, $headers);
            return (new MailMessage);
        });
    }
}
