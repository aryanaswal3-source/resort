<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SignupNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $userData;

    public function __construct($userData)
    {
        $this->userData = $userData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New User Registered',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.signup-notification',
        );
    }
}