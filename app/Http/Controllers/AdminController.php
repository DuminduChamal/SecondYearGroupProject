<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tutor;
use DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin/admin');
    }

    //method to view admin profile
    public function viewProfile(){
        return view('admin/profile');
    }

    //method to view all the tutors
    public function viewTutors(){
        $tutors = User::where('is_tutor', '1')->get();
        // dd($tutors);
        return view('admin/viewTutors')->with('tutors', $tutors);
    }

    //method to view all the students
    public function viewStudents(){
        $students = DB::table('users')->where('is_student', '1')->get();
        return view('admin/viewStudents')->with('students', $students);
    }

    //method to view all the unapproved tutors in latest
    public function viewUnapprovedTutors(){
        $unapprovedtutors = Tutor::where('approved','0')->latest()->get();
        // dd($unapprovedtutors);
        return view('admin/viewUnapprovedTutors')->with('unapprovedtutors', $unapprovedtutors);
    }

    //method to view unapproved tutor's details
    public function viewUnapprovedTutorDetails($id)
    {
        $unapprovedTutor = Tutor::find($id);
        return view('admin/viewUnapprovedTutorDetails', compact('unapprovedTutor'));
    }

    //method to approve the tutor
    public function approveTutor($id)
    {
        $approvedTutor = Tutor::find($id);
        $approvedTutor->approved = 1;
        $approvedTutor->save();
        return redirect('admin/unapprovedtutors')->with('success', 'User Approved');;
    }

    //method to reject the tutor
    public function adminRejectTutor($id)
    {
        $tutor = Tutor::find($id);
        $tutor->delete();
        return redirect('admin/unapprovedtutors')->with('success', 'User Rejected');
    }
}
