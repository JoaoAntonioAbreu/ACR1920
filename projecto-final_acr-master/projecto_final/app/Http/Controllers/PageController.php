<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;

class PageController extends Controller
{

    public function getContact()
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
       $this->validate($request, [
           'email'=>'required|email',
           'subject'=>'min:5',
           'message' =>'min:5'
           ]);

           $data = array(
               'email'=> $request->email,
               'subject'=>$request->subject,
               'body'=>$request->message
             );
           Mail::send('pages.email',$data,function($message) use ($data){
                $message->from($data['email']);
                $message->to('pepe@project.com');
                $message->subject($data['subject']);
           });


           return redirect('/movies')->with(['status'=>'Email sent!!']);
    }


}
