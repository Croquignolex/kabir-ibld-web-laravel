<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserPasswordResetMail extends Mailable implements ShouldQueue
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
        return $this->subject(trans('auth.reset_your_pwd'))
            ->view('mails.user-password-reset.normal')
            ->text('mails.user-password-reset.plain');
    }
}
