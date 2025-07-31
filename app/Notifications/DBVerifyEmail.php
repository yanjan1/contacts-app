<?php

namespace App\Notifications;

use App\Models\SentMailType;
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

        try {
            $mail = SentMail::create([
                'to' => $notifiable->email,
                'subject' => $subject,
                'body' => $body,
                'type' => SentMailType::Verification->value
            ]);

        } catch (\Throwable $th) {
            \Log::error("Failed to create verification email: " . $th->getMessage());
        }

         return (new MailMessage)
            ->subject($subject)
            ->line('A verification email has been logged (check your DB).');
    }
}
