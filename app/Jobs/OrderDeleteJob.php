<?php

namespace App\Jobs;

use App\Mail\CheckoutDeleteMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class OrderDeleteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $send_mail;
    protected $product;
    /**
     * Create a new job instance.
     */
    public function __construct($send_mail, $product)
    {
        $this->send_mail = $send_mail;
        $this->product = $product;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $mail = new CheckoutDeleteMail($this->product);
        Mail::to($this->send_mail)->send($mail);
    }
}
