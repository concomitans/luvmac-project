<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{

    public function mail(Request $request)
    {
        $mesaj = $request->all();
        Mail::queue('emails.email', compact('mesaj'), function ($message) use($mesaj){
            $message->from('theoldcedric@gmail.com','Demirkaya İzmit Mail');
            $message->to('theoldcedric@gmail.com','Demirkaya İzmit Mail')->subject('Ariza Kaydı');
        });
        return Redirect::back()->with(array('mesaj'=>'true','title'=>'Başarılı','text'=>'Mesajınız gönderildi.','type'=>'success'));
    }
}
