<?php

namespace App\Http\Controllers;

use App\Timeslot;
use App\Tutor;
use App\User;
use App\Announcement;
use DB;
use auth;
use Illuminate\Support\Facades\Validator;
use Image;
use App\Notifications\RequestForClass;

use Illuminate\Http\Request;
//use App\User;

class StudentController extends Controller
{
    //method to view the dashboard of student
    public function index()
    {
        $anns=Announcement::orderBy('created_at','desc')->paginate(3);

        $tutor1=Tutor::where('approved',1)->where('id',1)->get();
        $tutor2=Tutor::where('approved',1)->where('id',2)->get();
        $tutor3=Tutor::where('approved',1)->where('id',3)->get();

        // dd($tutor1);

        return view('student/student')->with(compact('anns','tutor1','tutor2','tutor3'));

    }

    //method to view student his profile
    public function viewProfile()
    {
        return view('student/profile');
    }

    //method to view edit page
    public function editProfile(User $user)
    {
        return view('student.editprofile')->with('user', $user);
    }

    //method to validate the user input for edit profile 
    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'FName' => ['required', 'string', 'max:255'],
            'LName' => ['required', 'string', 'max:255'],
            'DOB' => ['required', 'date','before:today'],
        ]);
    }

    //method to update the user details
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
        $tutors = Tutor::where('approved', '1')->orderBy('rate', 'asc')->paginate(3);
        // dd($tutors);
        return view('student.viewtutors')->with('tutors', $tutors);
    }

    //view tutor profile details of the available tutor list
    public function viewTutorProfile($id)
    {
        $tutor = Tutor::find($id);
        $time_slots = StudentController::timeslots($id);
        // dd($tutor);
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
            return redirect()->action('StudentController@viewProfile', compact('user'))->with('success', 'Profile Picture Successfully Updated!');
        }
        else
        {
            return redirect('student/profile')->with('error', 'No file attached! Please attach a file to upload.');
        }
        // return view('student.showProfile', compact('user'));
        // return redirect()->action('StudentController@viewProfile', compact('user'))->with('success', 'Profile Picture Updated');
    }

    //method to get timeslots for the tutor
    public function timeslots($id)
    {
        $tutor = Tutor::find($id);
        //dd($tutor);
        $time = DB::table('timeslots')->where('tutor_id', $id)->select('day', 'time','stu_id')->get()->toArray();
        return $time;
    }

    //method to submit a timeslot 
    public function timeslotssubmit(Request $arr, $id)
    {
        $data = $arr->input('data');
        $data = json_decode($data);
        $stuId = Auth::user()->id;
        echo "<script>console.log('$stuId')</script>";
        foreach ($data as $timeSlot) {
            Timeslot::create([
                'tutor_id' => $id,
                'day' => $timeSlot->day,
                'time' => $timeSlot->time,
                'stu_id'=> $stuId,
            ]);
        }
        // return redirect()->route('student.viewTutorProfile', compact('tutor'));
        // return redirect('/student/viewtutors/6');

        //notification
        $tutor=Tutor::find($id);
        // $tutors=DB::table('tutors')->where('id', $id)->get();
        echo "<script>console.log('new')</script>";
        $tutor->user->notify(new RequestForClass($data));
        
    }

    //method to remove the timeslot selected
    public function timeslotsremove(Request $arr,$id){
        $data = $arr->input('data');
        $data = json_decode($data);
        foreach ($data as $timeSlot) {
            timeslot::where('tutor_id',$id)->where('day',$timeSlot->day)->where('time',$timeSlot->time)->delete();
        }
    }

    //method to submit the rating for tutor
    public function submitRate(Request $arr, $user_id)
    {
        // dd($arr);
        $student=Auth::user();
        $old_rating = DB::table('users')->where('id', $user_id)->value('rating');
        // dd($old_rating);
        $new_rating = $arr->data;
        // dd($new_rating);
        $present_rating=ceil(($old_rating+$new_rating)/2);
        // dd($present_rating);
        $tutor = User::find($user_id);
        $tutor->rating = $present_rating;
        $tutor->save();
        return redirect()->back()->with('success', 'Rating added! Thank you for your time');
    }

    //method to do the payment from notification
    public function payment($id,$day,$time)
    {
        // dd($id);
        $tutor = Tutor::where('user_id', $id)->get()->first();
        // dd($tutor);
        $tutor_id=$tutor->id;
        // dd($tutor_id);
        $student = auth()->user();
        $student->unreadNotifications->markAsRead();
        $class=Timeslot::where('tutor_id', $tutor_id)->where('day', $day)->where('time', $time)->get()->first();
        return view('student.paymentform')->with('class', $class);
    }

    //method to do the payment separately
    public function paymentSeparate($id,$day,$time)
    {
        // dd($id);
        // $tutor = DB::table('tutors')->where('id', $id)->get()->first();
        // dd($tutor);
        // $tutor_rate=$tutor->rate;
        // dd($tutor_rate);
        $class=Timeslot::where('tutor_id', $id)->where('day', $day)->where('time', $time)->get()->first();
        // dd($class->tutor->referStatus);
        $class_id=$class->id;
        // dd($class_id);
        return view('student.paymentform')->with('class', $class);
    }

    //method to view tutor accepted sessions
    public function viewAcceptedClasses()
    {
        $id=Auth::user()->id;
        $classes=Timeslot::where('stu_id', $id)->where('isAccepted',1)->where('isPaid',0)->latest()->get();
        return view('student.acceptedclasses')->with('classes', $classes);
    }

    //method for the view of search
    public function searchSubject(Request $array)
    {
        // dd($array);
        $subjectid=$array->subject_id;
        // dd($subjectid);
        $tutors=Tutor::where('subject_id', $subjectid)->where('approved', 1)->orderBy('rate', 'asc')->paginate(3);
        // dd($tutors);
        return view('student.viewtutors')->with('tutors', $tutors);
    }

    //method view delete confirmation page
    public function deleteProfile($id)
    {
        return view('student.delete');
    }

    //method to delete the student profile
    public function deleteProfileConfirm($id)
    {
        $student = User::find($id);
        $student->delete();
        Auth::logout();
        return redirect('/');
    }
}
