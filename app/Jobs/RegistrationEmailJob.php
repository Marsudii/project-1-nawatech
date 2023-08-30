<?php

namespace App\Jobs;

use App\Mail\RegistrationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class RegistrationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $send_mail;
    protected $token;
    /**
     * Create a new job instance.
     */
    public function __construct($send_mail, $token)
    {
        $this->send_mail = $send_mail;
        $this->token = $token;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $mail = new RegistrationMail($this->token); // Pass the token to the mail class
        Mail::to($this->send_mail)->send($mail);
    }
}
