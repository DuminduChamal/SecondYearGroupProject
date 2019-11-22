<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use App\Tutor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterStudentController extends Controller
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

    use RegistersUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.registerStudent');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/student';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'FName' => ['required', 'string', 'max:255'],
            'LName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'DOB' => ['required', 'date',],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);
        $user = User::create([
            'FName' => $data['FName'],
            'LName' => $data['LName'],
            'email' => $data['email'],
            'DOB' => $data['DOB'],
            'password' => Hash::make($data['password']),
            'is_student' => "1",
            'is_tutor' => "0",
            'is_admin' => "0",
        ]);
        // $registeredUser = DB::table('users')->where('email', '=', $data['email'])->get()->first();
        // // dd($registeredUser);
        // Tutor::create([
        //     'user_id'=> $registeredUser->id,
        //     'Qualification' => $data['Qualification'],
        // ]);
        return $user;
    }
}
