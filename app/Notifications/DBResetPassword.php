<?php

namespace App\Notifications;

use App\Models\SentMailType;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Auth\Notifications\ResetPassword as BaseReset;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use App\Models\SentMail;

class DbResetPassword extends BaseReset
{
    

    public function toMail($notifiable)
    {

        $url = url(route('password.reset', [
            'token' => $this->token,
            'payload' => Crypt::encrypt($notifiable->getEmailForPasswordReset())
        ], false));

        try {
            SentMail::create([
                'to' => $notifiable->getEmailForPasswordReset(),
                'subject' => 'Password Reset Request',
                'body' => "Click the link to reset your password: $url",
                'type' => SentMailType::PasswordReset->value,
            ]);
        } catch (\Exception $e) {
            // Handle any exceptions that may occur while writing to the database
            \Log::error('Error writing to sent_mails table: ' . $e->getMessage());

        }
       

        return (new MailMessage)
                    ->subject('Password Reset Sent')
                    ->line('A password reset link has been "sent" (check your DB).');
    }
}
