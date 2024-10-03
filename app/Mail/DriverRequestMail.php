<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\DriverBasic;
use App\Models\DriverRequest;
use App\Models\FarmersBasic;

class DriverRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $request;
    protected $driver;
    protected $farmer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DriverRequest $request, DriverBasic $driver, FarmersBasic $farmer)
    {
        $this->request = $request;
        $this->driver = $driver;
        $this->farmer = $farmer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Order Request')
            ->markdown('emails.order.request')
            ->with('email', $this->driver->email)
            ->with('request', $this->request)
            ->with('driver', $this->driver)
            ->with('farmer', $this->farmer);
    }

}
