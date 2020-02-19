<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store()
    {
        // dd(request()->all());
        $data = request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'messege'=>'required',
        ]);
        //dd($data);
        //dd(request()->all());
        Mail::to('tutorland@tutorland.com')->send(new ContactFormMail($data));
        return redirect('/contact')->with('messege', 'Thanks for the messege, we\'ll be in touch ');
    }
}
