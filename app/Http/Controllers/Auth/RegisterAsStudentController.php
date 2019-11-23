<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class RegisterAsStudentController extends Controller
{
    public function showRegistrationForm(){
        return view('auth/registerAsStudent');
    }


    //method to update the users table
    public function registerAsStudentSubmit(Request $request){
        // dd($request);
        $registeredUser = DB::table('users')->where('email', '=', Auth::user()->email)->get()->first();
        DB::table('users')->where('id', $registeredUser->id)->update(['is_student' => 1]);
        // dd($registeredUser);
        return redirect()->intended('/student');

    }
}
