<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CheckoutDeleteMail extends Mailable
{
    use Queueable, SerializesModels;


    public $product;
    /**
     * Create a new message instance.
     */
    public function __construct($product)
    {
        $this->product = $product;
    }

    public function build(): Mailable
    {
        return $this->subject('Order Delete')
            ->view('emails.CheckoutDeleteEmail')
            ->with([
                'dataProduct' => $this->product,
            ]);
    }
}
