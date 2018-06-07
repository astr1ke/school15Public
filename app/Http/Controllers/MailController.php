<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request){
        $this->validate($request,[
            'name'=> 'required|min:3|max:20',
            'subject' =>'required|max:20',
            'email' => 'required',
            'text' =>'required|min:3|max:255',
        ]);

        Mail::raw($request->text, function($message) use ($request){
            $message->from($request->email, $request->name);
           $message->to('mail.usa.va@gmail.com')->subject($request->subject);
        });

    return view('contacts',['done'=>True]);

    }

}
