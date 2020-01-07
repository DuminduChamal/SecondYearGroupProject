<?php

namespace App\Http\Controllers;

use App\Tutor;
use DB;


use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student/student');
    }

    public function viewProfile()
    {
        return view('student/profile');
    }

    //method to view availble tutors when logged into the student account
    public function showTutorList()
    {
        $tutors = Tutor::where('approved','1')->get();
        //dd($tutors);
        return view('student.viewtutors')->with('tutors', $tutors);
    }

    //view tutor profile details of the available tutor list
    public function viewTutorProfile($id)
    {
        $tutor = Tutor::find($id);
        //dd($tutor);
        return view('student.viewtutorprofile')->with('tutor', $tutor);
    }
}
