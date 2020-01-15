<?php

namespace App\Http\Controllers;

use App\Timeslot;
use App\Tutor;
use Auth;
use DB;


use Illuminate\Http\Request;
use App\User;

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
        $tutors = Tutor::where('approved', '1')->get();
        //dd($tutors);
        return view('student.viewtutors')->with('tutors', $tutors);
    }

    //view tutor profile details of the available tutor list
    public function viewTutorProfile($id)
    {
        $tutor = Tutor::find($id);
        $time_slots = StudentController::timeslots($id);
        //dd($tutor);
        return view('student.viewtutorprofile', compact('tutor', 'time_slots'));
    }

    public function timeslots($id)
    {
        $tutor = Tutor::find($id);
        //dd($tutor);
        $time = DB::table('timeslots')->where('tutor_id', $id)->select('day', 'time')->get()->toArray();
        return $time;
    }

    public function timeslotssubmit(Request $arr, $id)
    {
        $data = $arr->input('data');
        $data = json_decode($data);

        foreach ($data as $timeSlot) {
            Timeslot::create([
                'tutor_id' => $id,
                'day' => $timeSlot->day,
                'time' => $timeSlot->time
            ]);
        }
        // return redirect()->route('student.viewTutorProfile', compact('tutor'));
        // return redirect('/student/viewtutors/6');

        return redirect()->back();
    }
}
