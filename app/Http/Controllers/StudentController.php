<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class StudentController extends Controller
{
    public function index()
    {
        return view('student/student');
    }

    public function viewProfile(User $user)
    {
        return view('student.profile', compact('user'));
    }

    public function editProfile(User $user)
    {
        // return ('hit');
        return view('student.editProfile', compact('user'));
    }
}
