<?php

namespace App\Http\Controllers;

use App\Mail\SendingEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendingEmailController extends Controller
{
    public function index(){
        return view('email.index');
    }

    public function send(Request $request){
        $request->validate([
            'tujuan' => 'required|email',
            'message' => 'required'
        ],[
            'tujuan.required' => 'Tujuan tidak boleh kosong',
            'tujuan.email' => 'Alamat email tidak valid',
            'message.required' => 'Alamat email tidak valid',
        ]);

        $details = [
            'title' => 'Tutorial mengirim notifikasi email',
            'body' => $request->message
        ];

        Mail::to($request->tujuan)->send(new SendingEmailNotification($details));

        return redirect()->back()->with('success', 'Email berhasil dikirim');
    }
}
