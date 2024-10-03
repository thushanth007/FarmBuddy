<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Product;
use App\Models\FarmersBasic;

class StockStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $product;
    protected $farmer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $product, FarmersBasic $farmer)
    {
        $this->product = $product;
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
            ->markdown('emails.product.status')
            ->with('email', $this->farmer->email)
            ->with('product', $this->product)
            ->with('farmer', $this->farmer);
    }

}
