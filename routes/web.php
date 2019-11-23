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
   
    Route::get('/admin','AdminController@index')->name('dashboard');
    Route::get('/admin/profile','AdminController@viewProfile')->name('viewadminprofile');
    Route::get('/admin/tutors','AdminController@viewTutors')->name('viewtutors');
    Route::get('/admin/a',function(){
       
        return view('admin');
    
    });
});
Route::middleware(['auth','student'])->group( function(){
   
    Route::get('/student',function(){
       
        return view('student');
    
    });
    Route::get('/student/registerastutor','Auth\RegisterAsTutorController@showRegistrationForm')->name('registerAsTutor');
    Route::post('/student/registerastutor','Auth\RegisterAsTutorController@registerAsTutorSubmit')->name('student.register.tutor');
});
Route::middleware(['auth','tutor'])->group( function(){
   
    Route::get('/tutor',function(){
       
        return view('tutor');
    
    });
    Route::get('/tutor/a',function(){
       
        return view('tutor');
    
    });

    Route::get('/tutor/registerasstudent','Auth\RegisterAsStudentController@showRegistrationForm')->name('registerAsStudent');
    Route::post('/tutor/registerasstudent','Auth\RegisterAsStudentController@registerAsStudentSubmit')->name('tutor.register.student');
});

Route::get('/register/student', 'Auth\RegisterStudentController@showRegistrationForm')->name('register.student');
Route::post('/register/student', 'Auth\RegisterStudentController@register')->name('register.student.submit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::middleware(['auth','both'])->group( function(){
   
//     Route::get('/select',function(){
       
//         return view('select');
    
//     });
//     Route::get('/select/a',function(){
       
//         return view('select');
    
//     });
// });