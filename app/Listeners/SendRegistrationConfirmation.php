<?php

namespace App\Listeners;

use App\Mail\RegistrationConfirmed;
use Illuminate\Support\Facades\Mail;
use App\Events\UserRegisteredForEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRegistrationConfirmation
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegisteredForEvent $event): void
    {
        Mail::to($event->registration->user->email)
            ->queue(new RegistrationConfirmed($event->registration));
    }
}
