<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tutor;
use App\Announcement;
use Auth;
use DB;

class AdminController extends Controller
{
    public function index(){
        $anns=Announcement::orderBy('created_at','desc')->paginate(3);
        return view('admin/admin')->with('anns',$anns);
    }

    //method to view admin profile
    public function viewProfile(){
        return view('admin/profile');
    }

    //method to view all the students
    public function viewStudents(){
        $students = DB::table('users')->where('is_student', '1')->get();
        return view('admin/viewStudents')->with('students', $students);
    }

    //method to view student profile details
    public function viewStudentProfile($id)
    {
        $student = User::find($id);
        return view('admin.showStudentProfile', compact('student'));
    }

    //method to delete student account
    public function removeStudent($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/students')->with('success', 'Student Removed');
    }

     //method to view all the tutors
     public function viewTutors(){
        $tutors = User::where('is_tutor', '1')->get();
        // dd($tutors);
        return view('admin/viewTutors')->with('tutors', $tutors);
    }

    //method to view tutor profile details
    public function viewTutorProfile($id)
    {
        $tutor = User::find($id);
        // dd($tutor);
        return view('admin.showTutorProfile', compact('tutor'));
    }

     //method to delete tutor account
     public function removeTutor($id)
     {
         $tutor = User::find($id);
         $tutor->delete();
         return redirect('admin/tutors')->with('success', 'Tutor Removed');
     }

    //method to view all the unapproved tutors in latest
    public function viewUnapprovedTutors(){
        $unapprovedtutors = Tutor::where('approved','0')->latest()->get();
        //dd($unapprovedtutors);
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
        return redirect('admin/unapprovedtutors')->with('success', 'Tutor Approved');
    }

    //method to reject the tutor
    public function adminRejectTutor($id)
    {
        $tutor = Tutor::find($id);
        $tutor->delete();
        return redirect('admin/unapprovedtutors')->with('success', 'Tutor Rejected');
    }

    public function publishAnnouncement()
    {
        return view('admin/announcements');
    }

    public function publishAnnouncementSubmit(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required',
            'announcement' => 'required'
        ]);
        // dd($request);
        $announcement = new Announcement;
        $announcement->title=$request->input('title');
        $announcement->announcement=$request->input('announcement');
        $announcement->admin_id=Auth::user()->id;
        $announcement->save();
        return redirect('admin/')->with('success','Announcement Published!');
    }

    public function publishAnnouncementEdit($id)
    {
        $editann = Announcement::find($id);
        // dd($editann);
        return view('admin/annoucementEdit', compact('editann'));
    }
    
    public function publishAnnouncementUpdate(Request $request, $id)
    {
        $this->validate($request,[
            'title'=> 'required',
            'announcement' => 'required'
        ]);
        // dd($request);
        $announcement = Announcement::find($id);
        $announcement->title=$request->input('title');
        $announcement->announcement=$request->input('announcement');
        $announcement->admin_id=Auth::user()->id;
        $announcement->save();
        return redirect('admin/')->with('success','Announcement Updated');
    }
}
