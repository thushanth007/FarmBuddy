<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\DriverBasic;
use App\Models\Order;
use App\Models\FarmersBasic;

class DriverAcceptMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $driver;
    protected $farmer;
    protected $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( DriverBasic $driver, FarmersBasic $farmer, Order $order)
    {
        $this->driver = $driver;
        $this->farmer = $farmer;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Order Accept')
            ->markdown('emails.order.accept')
            ->with('email', $this->driver->email)
            ->with('driver', $this->driver)
            ->with('farmer', $this->farmer)
            ->with('order', $this->order);
    }

}
