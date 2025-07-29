<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentMail extends Model
{
    protected $table = 'SentMail';
    
    protected $fillable = [
        'to',
        'subject',
        'body',
    ];
}
