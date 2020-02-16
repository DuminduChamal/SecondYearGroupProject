<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LinkShareMail extends Mailable
{
    use Queueable, SerializesModels;
    public $session_link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($session_link)
    {
        $this->session_link = $session_link;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.linkshare');
    }
}
