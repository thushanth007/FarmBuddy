<?php

namespace App\Mail;

use App\Models\ContactUs;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $contact_us;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactUs $contact_us)
    {
        //
        $this->contact_us = $contact_us;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thank you for your feedback')
            ->markdown('emails.contact_us.contactusnotificationmail')
            ->with('email', $this->contact_us->email)
            ->with('contact_us', $this->contact_us);
    }

}
