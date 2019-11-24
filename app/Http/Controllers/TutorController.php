<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorController extends Controller
{
    
    public function index(){
        return view('tutor/tutor');
    }

    public function viewProfile(){
        return view('tutor/profile');
    }
}
