<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    public function send()
    {
        Mail::send(['text' => 'confirm'], ['name', 'Andrey'],  function ($message){
            $message->to('shchuka95@gmail.com', 'To Andrey')->subject('Registration success!');
            $message->from('NewBlogSender@gmail.com', 'NewsBlogAdmin');
        });
    }
}
