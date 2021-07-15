<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->subject('Mail from Surfside Media')->view('frontEnd.contact_us');
        //return $this->markdown('emails.welcome');
       return $this->from('samaiduch@gmail.com')->subject('New Customer Equiry')->view('dynamic_email_template')->with('data', $this->data);
    }
}
