<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\User;
use App\Announcement;
use App\Timeslot;
use App\Session_link;
use App\Mail\LinkShareMail;
use Image;
use auth;
use DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;
use App\Notifications\TutorAccepted;


class TutorController extends Controller
{
    //view the dashboard page
    public function index()
    {
        $anns=Announcement::orderBy('created_at','desc')->paginate(3);
        return view('tutor/tutor')->with('anns',$anns);
    }

    //view profile method
    public function viewProfile()
    {
        $tutor = Auth::id();
        //dd($tutor);
        $time_slots = TutorController::timeslots($tutor);
        return view('tutor/profile', compact('time_slots'));
    }

    //method to get the timeslots for the tutor
    public function timeslots($id)
    {
        $user = Auth::id();
        $tutor = DB::table('tutors')->where('user_id', $user)->get()->first();
        $tutor_id = $tutor->id;
        //dd($tutor->id);
        $time = DB::table('timeslots')->where('tutor_id', $tutor_id)->select('day', 'time','stu_id','isPaid')->get()->toArray();
        return $time;
    }

    //method to view the timeslots
    public function viewProfileSlots($id)
    {
        // dd($id);
        $tutor = Tutor::find($id);
        $time_slots = TutorController::timeslots($id);
        return view('tutor/profile', compact('tutor', 'time_slots'));
    }

    //method to edit the profile
    public function editProfile(User $user)
    {
        return view('tutor.editprofile')->with('user',$user);
    }

    //method to validate the user input for profile edit
    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'FName' => ['required', 'string', 'max:255'],
            'LName' => ['required', 'string', 'max:255'],
            'DOB' => ['required', 'date','before:today'],
            'NIC' => ['required', 'string'],
        ]);
    }
    
    //method for update the profile
    public function updateProfile(Request $request, $id)
    {
        $this->validatorEdit($request->all())->validate();

        $tutor = User::find($id);
        $tutor->FName = $request->input('FName');
        $tutor->LName = $request->input('LName');
        $tutor->DOB = $request->input('DOB');
        $tutor->NIC = $request->input('NIC');

        $tutor->save();

        return redirect()->action('TutorController@viewProfile', compact('tutor'));
    }

    //method to update tutor profile picture 
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

            $tutor = Auth::user();
            $tutor->avatar = $filename;
            $tutor->save();
            return redirect()->action('TutorController@viewProfile', compact('tutor'))->with('success', 'Profile Picture Successfully Updated!');
        }
        else
        {
            return redirect('tutor/profile')->with('error', 'No file attached! Please attach a file to upload.');
        }
        
    }

    //method to go to session page
    public function room($id)
    {
        // $stu_id = $id;
        // dd($stu_id);
        $stu = User::find($id);
        // dd($stu);
        return view('tutor.session')->with('stu',$stu);
    }

    //
    // public function roomDetails()
    // {
        ///////////////
        //$user_id= auth::user()->tutor->timeslot->day;
        // $tutor = DB::table('tutors')->where('user_id', $user)->get()->first();
        //$tutor = DB::table('tutors')->where('referName', 'werty')->first();
//////////////////

        // dd($user_id);
        // dd($tutor);
        
    //     $stu_id=10;
    //     $tutor_id= auth::user()->tutor->id;
    //     // dd($stu_id);


    //         $stu_id = DB::table('timeslots')->where('id', $stu_id)->get();
    //         $stu_mail_address;

    // }

    //method to submit the google meet link
    public function linksubmit(Request $request,$id)
    {
        // dd($id);
        // dd($request->link);
        // $stu_id= 4;
        $tutor_id= auth::user()->tutor->id;
        // $stu_id_row=DB::table('timeslots')->where('tutor_id',$tutor_id)->get()->first();
        // dd($stu_id_row);
        $stu_id=$id;
        // dd($stu_id);
        $session_link=$request->link;
        // dd($session_link);

        session_link::create([
            'stu_id'=> $stu_id,
            'tutor_id'=> $tutor_id,
            'link'=> $session_link,
        ]);

        $user = DB::table('users')->where('id', $stu_id)->get();
        Mail::to($user)->send(new LinkShareMail($session_link));

        // DB::table('session_links')->where('tutor_id', '=', $tutor_id)->delete();
        return back()->with('messege', 'Link has been sent to the student ! Please wait for the connection in NEW TAB');
    }

    //method to accept the requested time slots
    public function acceptClass($student,$tutor,$day,$time)
    {
        $id=DB::table('tutors')->where('user_id', $tutor)->get()->first();
        // dd($id);
        $num=$id->id;
        // dd($num);
        $requestedTimeSlot = DB::table('timeslots')->where('tutor_id', $num)->where('stu_id', $student)->where('day', $day)->where('time', $time)->get()->first();
        // dd($requestedTimeSlot);
        $timeslot_id=$requestedTimeSlot->id;
        // dd($timeslot_id);
        $timeslot = Timeslot::find($timeslot_id);
        $timeslot->isAccepted= 1;
        $timeslot->save();
        // dd($timeslot);
        $requestedStu=User::find($student);
        $requestedStu->notify(new TutorAccepted($day,$time));

        $tutor = auth()->user();
        $tutor->unreadNotifications->markAsRead();

        return redirect('tutor/')->with('success','Requested Slot Accepted!');
    }

    //method to view the requested time slots
    public function viewRequestedSlots()
    {
        $user = Auth::id();
        $tutor=DB::table('tutors')->where('user_id', $user)->get()->first();
        $id=$tutor->id;
        // dd($id);
        $requestedTimeSlots=Timeslot::where('tutor_id', $id)->where('isAccepted', 0)->latest()->get();
        // dd($requestedTimeSlots);
        return view('tutor.requestedclasses')->with('requestedTimeSlots', $requestedTimeSlots);
    }

    //method toaccept the requested time slots
    public function acceptRequestedSlots($student,$day,$time)
    {
        // dd($student);
        $tutor_id=Auth::id();
        $tutor=DB::table('tutors')->where('user_id', $tutor_id)->get()->first();
        $num=$tutor->id;
        $requestedTimeSlot=DB::table('timeslots')->where('tutor_id', $num)->where('stu_id', $student)->where('day', $day)->where('time', $time)->get()->first();
        // dd($requestedTimeSlot);
        $timeslot_id=$requestedTimeSlot->id;
        // dd($timeslot_id);
        $timeslot = Timeslot::find($timeslot_id);
        $timeslot->isAccepted= 1;
        $timeslot->save();
        // dd($timeslot);
        $requestedStu=User::find($student);
        $requestedStu->notify(new TutorAccepted($day,$time));
        return redirect('tutor/requestedclasses')->with('success','Requested Slot Accepted!');
    }

    //method to view delete confirmation page
    public function deleteProfile($id)
    {
        return view('tutor.delete');
    }

    //method to delete the profile
    public function deleteProfileConfirm($id)
    {
        $student = User::find($id);
        $student->delete();
        Auth::logout();
        return redirect('/');
    }

    //method to rate the students after the session
    public function RateStudent(Request $arr,$id)
    {
        // dd($arr);
        $new_rating = $arr->demo;
        // dd($new_rating);
        $student = User::find($id);
        $old_rating=$student->rating;
        $present_rating=ceil(($old_rating+$new_rating)/2);
        // dd($present_rating);
        $student->rating = $present_rating;
        $student->save();
        return redirect('tutor')->with('success', 'Rating added! Thank you for your time');
    }
}
