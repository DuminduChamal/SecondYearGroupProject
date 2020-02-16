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

    public function index()
    {
        $anns=Announcement::orderBy('created_at','desc')->paginate(3);
        return view('tutor/tutor')->with('anns',$anns);
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

    public function viewProfileSlots($id)
    {
        $tutor = Tutor::find($id);
        $time_slots = TutorController::timeslots($id);
        return view('tutor/profile', compact('tutor', 'time_slots'));
    }
    public function editProfile(User $user)
    {
        return view('tutor.editprofile')->with('user',$user);
    }

    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'FName' => ['required', 'string', 'max:255'],
            'LName' => ['required', 'string', 'max:255'],
            'DOB' => ['required', 'date',],
            'NIC' => ['required', 'string'],
        ]);
    }
    
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
        }
        // return view('tutor.showProfile');
        return redirect()->action('TutorController@viewProfile', compact('tutor'))->with('success', 'Profile Picture Updated');
    }

    public function session()
    {
        return view('tutor.session');
    }

    public function sessionDetails()
    {
        ///////////////
        //$user_id= auth::user()->tutor->timeslot->day;
        // $tutor = DB::table('tutors')->where('user_id', $user)->get()->first();
        //$tutor = DB::table('tutors')->where('referName', 'werty')->first();
//////////////////

        // dd($user_id);
        // dd($tutor);
        
        $stu_id=10;
        $tutor_id= auth::user()->tutor->id;
        // dd($stu_id);


            $stu_id = DB::table('timeslots')->where('id', $stu_id)->get();
            $stu_mail_address;

    }

    public function linksubmit(Request $request)
    {
        // dd($request->link);
        $stu_id= 4;
        $tutor_id= auth::user()->tutor->id;
        $session_link=$request->link;
        // dd($session_link);

        session_link::create([
            'stu_id'=> $stu_id,
            'tutor_id'=> $tutor_id,
            'link'=> $session_link,
        ]);

        $user = DB::table('users')->where('id', $stu_id)->get();
        Mail::to($user)->send(new LinkShareMail($session_link));

        DB::table('session_links')->where('tutor_id', '=', $tutor_id)->delete();
        return back()->with('messege', 'Link has been sent to the student ! Please wait for the connection in NEW TAB');;

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
}
