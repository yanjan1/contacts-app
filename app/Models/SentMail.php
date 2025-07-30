<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

enum SentMailType: string
{
    case Verification   = 'email_verification';
    case PasswordReset  = 'password_reset';
    case EmailChange    = 'email_change';
}

class SentMail extends Model
{
    protected $table = 'SentMail';
    
    
    protected $fillable = [
        'to',
        'subject',
        'body',
    ];
}
