<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;

class ContattiController extends Controller
{
    public function contatti()
    {
        return view('guest.contact');
    }

    public function contattiSend(Request $request)
    {
        $data = $request->all();
        Mail::to("senioradmin@gmail.com")->send(new SendNewMail($data['name'], $data['email'], $data['message']));   /* ::to $request->email è l'email dove mi devono contattare */
        return redirect()->route('guest.thanks')->with('message', "Grazie $request->name, il messaggio è stato inviato con successo");
    }

    public function thanks()
    {
        return view('guest.thanks');
    }
}
