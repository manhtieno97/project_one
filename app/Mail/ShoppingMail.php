<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Cart;
use App\Models\Orders;
use App\Models\OrdersDetail;
use Session;

class ShoppingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $cart;
    public $orders;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Orders $orders, $cart)
    {
        $this->orders=$orders;
        $this->cart=$cart;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.shopping');
    }
}
