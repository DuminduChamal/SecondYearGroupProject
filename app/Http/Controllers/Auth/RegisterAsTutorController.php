<?php

namespace App\Http\Controllers\Auth;

use DB;
use Auth;
use App\User;
use App\Tutor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Notifications\TutorRequest;

class RegisterAsTutorController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    public function showRegistrationForm(){
        return view('auth/registerAsTutor');
    }

    //method to validate tutor registration form data
    protected function validator(Array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'NIC' => 'required|string|max:255',
            'Qualification' => 'required|string|max:255',
            'subject_id' => 'required|integer',
            'rate' => 'required|integer',
            'referName' => 'required|string|max:255',
            'referStatus' => 'required|string|max:255',
            'referEmail' => 'required|email|max:255',
            'referNumber' => 'required|integer|digits:10',
        ]);
    }

    //method to update the users table as well insert into tutors table
    public function registerAsTutorSubmit(Request $request){
        // dd($request);
        $this->validator($request->all())->validate();
        $registeredUser = DB::table('users')->where('email', '=', Auth::user()->email)->get()->first();
        DB::table('users')->where('id', $registeredUser->id)->update(['is_tutor' => 1]);
        DB::table('users')->where('id', $registeredUser->id)->update(['NIC' => $request['NIC']]);
        // dd($registeredUser);
        Tutor::create([
            'user_id'=> $registeredUser->id,
            'Qualification' => $request['Qualification'],
            'referName' => $request['referName'],
            'referStatus' => $request['referStatus'],
            'referEmail' => $request['referEmail'],
            'referNumber' => $request['referNumber'],
            'subject_id' => $request['subject_id'],
            'rate' => $request['rate'],
        ]);
        $admins = User::where('is_admin',1)->get();
        foreach ($admins as $admin)
        {
            $admin->notify(new TutorRequest());
        }
        return redirect()->intended('/tutor');

    }
}
