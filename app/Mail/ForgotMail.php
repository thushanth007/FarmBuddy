<?php

namespace App\Mail;

use App\Models\PasswordResets;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $tokenData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PasswordResets $tokenData)
    {
        $this->tokenData = $tokenData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reset Password')
            ->markdown('emails.forgot.resetmail')
            ->with('email', $this->tokenData->email)
            ->with('token', $this->tokenData->token);
    }

}
