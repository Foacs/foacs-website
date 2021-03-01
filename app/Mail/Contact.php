<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\UploadedFile;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $replyToAddress;
    public $userName;
    public $messageText;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $replyToAddress, string $userName, string $messageText)
    {
        $this->replyToAddress = $replyToAddress;
        $this->userName = $userName;
        $this->messageText = $messageText;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from('no-reply@foacs.ovh', 'Foacs - Contact')
            ->replyTo($this->replyToAddress)
            ->subject('Contact - '.$this->userName)
            ->view('emails.contact.main');
    }

}