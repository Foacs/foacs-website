<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\UploadedFile;

class ContactSupport extends Mailable
{
    use Queueable, SerializesModels;

    public $logs;
    public $appName;
    public $details;
    public $replyToAddress;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(UploadedFile $logs, string $appName, $details, string $replyToAddress = null)
    {
        $this->logs = $logs;
        $this->appName = $appName;
        $this->details = $details;
        $this->replyToAddress = $replyToAddress;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from('no-reply@foacs.ovh', 'Foacs - ' . $this->appName);

        if (isset($this->replyToAddress) && !is_null($this->replyToAddress) && $this->replyToAddress != "") {
            $this->replyTo($this->replyToAddress);
        }
        


        return $this->subject('Notification '.$this->appName.' - ERREUR')
            ->view('emails.contact.support')
            ->attach($this->logs, ['as' => 'logs.log', 'mime' => 'text/plain']);
    }
}
