<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisterMail extends Mailable implements ShouldQueue
{
    public $user;
    use Queueable, SerializesModels;

    /**
     * UserRegisterMail constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(trans('auth.sign_up'))
            ->view('mails.user-register.normal')
            ->text('mails.user-register.plain');
    }
}
