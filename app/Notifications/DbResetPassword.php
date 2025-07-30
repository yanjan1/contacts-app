<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as BaseReset;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\SentMail;

class DbResetPassword extends BaseReset
{
    /**
     * Build the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token
            
        ], false));

        // Write to your sent_mails table

        SentMail::create([
            'to' => $notifiable->getEmailForPasswordReset(),
            'subject' => 'Password Reset Request',
            'body' => "Click the link to reset your password: $url",
            'type' => 'password_reset',
        ]);
       

        // Return a dummy mail message so Laravel’s flow completes
        return (new MailMessage)
                    ->subject('Password Reset Sent')
                    ->line('A password reset link has been “sent” (check your DB).');
    }
}
