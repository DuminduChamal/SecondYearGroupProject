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
   
    Route::get('/admin','AdminController@index')->name('admin.dashboard');
    Route::get('/admin/profile','AdminController@viewProfile')->name('viewadminprofile');
    Route::get('/admin/tutors','AdminController@viewTutors')->name('viewtutors');
    Route::get('/admin/students','AdminController@viewStudents')->name('viewstudents');
    Route::get('/admin/unapprovedtutors','AdminController@viewUnapprovedTutors')->name('viewunapprovedtutors');
    Route::get('/admin/unapprovedtutordetails/{unapprovedTutor}','AdminController@viewUnapprovedTutorDetails')->name('viewunapprovedtutordetails');
    Route::get('/admin/unapprovedtutordetails/{unapprovedTutor}/approvetutor', 'AdminController@approveTutor')->name('admin.approved');
    Route::get('/admin/rejectTutor/{unapprovedTutor}', 'AdminController@adminRejectTutor')->name('admin.tutor.reject');
    Route::get('/admin/viewstudents/{student}', 'AdminController@viewStudentProfile')->name('admin.viewstudentprofile');
    Route::get('/admin/viewstudent/{student}', 'AdminController@viewStudentProfile')->name('admin.viewstudentprofile');
    Route::get('/admin/removestudent/{student}', 'AdminController@removeStudent')->name('admin.removestudent');
    Route::get('/admin/viewtutor/{tutor}', 'AdminController@viewTutorProfile')->name('admin.viewtutorprofile');
    Route::get('/admin/removetutor/{tutor}', 'AdminController@removeTutor')->name('admin.removetutor');
    Route::get('/admin/a',function(){
       
        return view('admin');
    
    });
});
Route::middleware(['auth','student'])->group( function(){
   
    Route::get('/student','StudentController@index')->name('student.dashboard');
    Route::get('/student/profile','StudentController@viewProfile')->name('student.profile');
    Route::get('/student/viewtutors','StudentController@showTutorList')->name('student.viewTutors');
    Route::get('/student/viewtutors/{tutor}','StudentController@viewTutorProfile')->name('student.viewTutorProfile');
    Route::get('/student/registerastutor','Auth\RegisterAsTutorController@showRegistrationForm')->name('registerAsTutor');
    Route::post('/student/registerastutor','Auth\RegisterAsTutorController@registerAsTutorSubmit')->name('student.register.tutor');

});

Route::middleware(['auth','tutor'])->group( function(){
   
    Route::get('/tutor','TutorController@index')->name('tutor.dashboard');
    Route::get('/tutor/profile','TutorController@viewProfile')->name('tutor.profile');
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