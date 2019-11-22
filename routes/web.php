<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth','admin'])->group( function(){
   
    Route::get('/admin',function(){
       
        return view('admin');
    
    });
    Route::get('/admin/a',function(){
       
        return view('dashboard');
    
    });
});
Route::middleware(['auth','student'])->group( function(){
   
    Route::get('/student',function(){
       
        return view('student');
    
    });
    Route::get('/student/a',function(){
       
        return view('student');
    
    });
});
Route::middleware(['auth','tutor'])->group( function(){
   
    Route::get('/tutor',function(){
       
        return view('tutor');
    
    });
    Route::get('/tutor/a',function(){
       
        return view('tutor');
    
    });
});
Route::middleware(['auth','both'])->group( function(){
   
    Route::get('/select',function(){
       
        return view('select');
    
    });
    Route::get('/select/a',function(){
       
        return view('select');
    
    });
});

Route::get('/register/student', 'Auth\RegisterStudentController@showRegistrationForm')->name('register.student');
Route::post('/register/student', 'Auth\RegisterStudentController@register')->name('register.student.submit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
