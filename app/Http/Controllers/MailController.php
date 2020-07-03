<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

class MailController extends Controller
{
    public function send()
    {

        //return view('mail');

        Mail::send('mail', [], function($message) {
            $message->to(MAIL_USERNAME, 'name')->subject('Новый заказ');
            $message->from(MAIL_USERNAME, 'name');
        });
    }
}
