<?php

namespace App\Http\Controllers;

use App\Models\SentMail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    
    public function index(){
        $mails = SentMail::orderBy('created_at', 'desc')->paginate(10);
        return view('mails.index', compact('mails'));
    }
}
