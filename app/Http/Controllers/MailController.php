<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send()
    {
        Mail::send(['text' => 'mail'], ['name', 'Andrey'],  function ($message){
            $message->to('shchuka95@gmail.com', 'To Andrey')->subject('Registration success!');
            $message->from('NewBlogSender@gmail.com', 'NewsBlogAdmin');
        });
    }
}
