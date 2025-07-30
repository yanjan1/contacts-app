<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use App\Models\SentMail;

class DBVerifyEmail extends BaseVerifyEmail
{

    public function toMail($notifiable): MailMessage
    {
        $verifyURL = $this->verificationURL($notifiable);
        $subject = "Verify the mail";
        $body = "Click the link below to verify your email:\n\n{$verifyURL}";

        SentMail::create([
            'to'      => $notifiable->email,
            'subject' => $subject,
            'body'    => $body,
        ]);

        return new MailMessage;
    }
}
