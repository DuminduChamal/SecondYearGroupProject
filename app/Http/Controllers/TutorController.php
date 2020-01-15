<?php

namespace App\Http\Controllers;

use App\Timeslot;
use App\Tutor;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorController extends Controller
{

    public function index()
    {
        return view('tutor/tutor');
    }

    public function viewProfile()
    {
        $tutor = Auth::id();
        //dd($tutor);
        $time_slots = TutorController::timeslots($tutor);
        return view('tutor/profile', compact('time_slots'));
    }

    public function timeslots($id)
    {
        $user = Auth::id();
        $tutor = DB::table('tutors')->where('user_id', $user)->get()->first();
        $tutor_id = $tutor->id;
        //dd($tutor->id);
        $time = DB::table('timeslots')->where('tutor_id', $tutor_id)->select('day', 'time')->get()->toArray();
        return $time;
    }

    // public function viewProfileSlots($id)
    // {
    //     $tutor = Tutor::find($id);
    //     $time_slots = TutorController::timeslots($id);
    //     return view('tutor/profile', compact('tutor', 'time_slots'));
    // }
}
