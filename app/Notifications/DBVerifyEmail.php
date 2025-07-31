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
        $body = <<<EOF
        Dear {$notifiable->email},
        We have recived a signup request for your email address. Please click the link below to verify your email address:
        <a href="{$verifyURL}">Verify Email</a>
        If you did not request this, please ignore this email.
        Thank you!
        Regards,
        Contact App Team
        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        
        EOF;

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
