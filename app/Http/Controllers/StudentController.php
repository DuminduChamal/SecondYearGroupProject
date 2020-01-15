<?php

namespace App\Http\Controllers;

use App\Timeslot;
use App\Tutor;
use App\User;
use DB;
use auth;
use Illuminate\Support\Facades\Validator;
use Image;

use Illuminate\Http\Request;
//use App\User;

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

    public function editProfile(User $user)
    {
        return view('student.editprofile')->with('user', $user);
    }

    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'FName' => ['required', 'string', 'max:255'],
            'LName' => ['required', 'string', 'max:255'],
            'DOB' => ['required', 'date',],
        ]);
    }

    public function updateProfile(Request $request, $id)
    {
        $this->validatorEdit($request->all())->validate();

        $student = User::find($id);
        $student->FName = $request->input('FName');
        $student->LName = $request->input('LName');
        $student->DOB = $request->input('DOB');

        $student->save();

        return redirect()->action('StudentController@viewProfile', compact('student'));
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

    //method to update student profile picture 
    public function updatePicture(Request $request)
    {
        // dd($request);
        //handle the user upload of avatar
        if ($request->hasFile('avatar')) {
            request()->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/assets/img/avatar/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        // return view('student.showProfile', compact('user'));
        return redirect()->action('StudentController@showProfile', compact('user'))->with('success', 'Profile Picture Updated');
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
