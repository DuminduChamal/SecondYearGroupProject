<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use auth;

class TutorController extends Controller
{
    
    public function index(){
        return view('tutor/tutor');
    }

    public function viewProfile(){
        return view('tutor/profile');
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
            Image::make($avatar)->resize(300, 300)->save(public_path('/assets/img/avatar/tutors/' . $filename));

            $tutor = Auth::user();
            $tutor->avatar = $filename;
            $tutor->save();
        }
        // return view('tutor.showProfile');
        return redirect()->action('TutorController@viewProfile', compact('tutor'))->with('success', 'Profile Picture Updated');
    }
}
