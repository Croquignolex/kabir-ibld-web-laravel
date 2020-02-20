<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageAnswerMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $msg;
    public $answer;

    /**
     * Create a new message instance.
     *
     * @param Contact $contact
     * @param $answer
     */
    public function __construct(Contact $contact, $answer)
    {
        $this->msg = $contact;
        $this->answer = $answer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->msg->subject)
            ->view('mails.message-answer.normal')
            ->text('mails.message-answer.plain');
    }
}
