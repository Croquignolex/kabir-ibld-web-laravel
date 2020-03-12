<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $msg;
    public $name;
    public $email;
    public $domain;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @param $msg
     * @param $name
     * @param $email
     * @param $domain
     * @param $subject
     */
    public function __construct($name, $email, $subject, $msg, $domain)
    {
        $this->msg = $msg;
        $this->name = $name;
        $this->email = $email;
        $this->domain = $domain;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->view('mails.contact.normal')
            ->text('mails.contact.plain');
    }
}
