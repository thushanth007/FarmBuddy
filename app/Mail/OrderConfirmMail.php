<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Order;
use App\Models\Basic;

class OrderConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $basic;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, Basic $basic)
    {
        $this->order = $order;
        $this->basic = $basic;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Order Conformation')
            ->markdown('emails.order.confirm')
            ->with('email', $this->basic->email)
            ->with('order', $this->order)
            ->with('basic', $this->basic);
    }

}
