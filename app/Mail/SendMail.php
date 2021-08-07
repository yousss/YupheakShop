<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $datas = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $datas)
    {
        $this->datas = $datas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Receipt For Customer')
            ->view('dynamic_email_template')
            ->with($this->datas);
    }
}
