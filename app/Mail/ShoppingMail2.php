<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Cart;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\Customer;
use Session;
class ShoppingMail2 extends Mailable
{
    use Queueable, SerializesModels;
    public $cart;
    public $orders;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Orders $orders,$cart,$data)
    {
        $this->orders=$orders;
        $this->cart=$cart;
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.shopping2');
    }
}
    

