<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BulkMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $sender;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $content, $sender)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->sender = $sender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($address = $this->sender, $name = $this->sender)
            ->subject($this->subject)
            ->markdown('emails.bulk');
    }
}
