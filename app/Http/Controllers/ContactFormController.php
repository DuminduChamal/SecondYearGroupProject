<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create(){
        return view('contact');
    }

    public function store(){
        $data = request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'messege'=>'required',
        ]); 
        //dd($data);
        //dd(request()->all());
        Mail::to('test@test.com')->send(new ContactFormMail($data));
        return redirect('/contact')->with('messege', 'Thanks for the messege, we\'ll be in touch ');
    }
}
