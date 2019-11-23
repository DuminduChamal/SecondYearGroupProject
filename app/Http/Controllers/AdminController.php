<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin/admin');
    }

    public function viewProfile(){
        return view('admin/profile');
    }

    public function viewTutors(){
        $tutors = DB::table('users')->where('is_tutor', '1')->get();
        // dd($tutors);
        // $qualification = DB::table('tutors')->where('user_id',$tutors[]->id)->value('Qualification');
        // dd($qualification);
        return view('admin/viewTutors')->with('tutors', $tutors);
    }

    public function viewStudents(){
        $students = DB::table('users')->where('is_student', '1')->get();
        // dd($tutors);
        // $qualification = DB::table('tutors')->where('user_id',$tutors[]->id)->value('Qualification');
        // dd($qualification);
        return view('admin/viewStudents')->with('students', $students);
    }
}
