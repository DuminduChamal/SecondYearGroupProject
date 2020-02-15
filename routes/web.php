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

Route::get('/contact','ContactFormController@create');
Route::post('/contact','ContactFormController@store');

Route::get('/about','HomeController@about');

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
    Route::get('/admin/announcement', 'AdminController@publishAnnouncement')->name('admin.announcement');
    Route::post('/admin/announcement/submit', 'AdminController@publishAnnouncementSubmit')->name('admin.announcement.submit');
    Route::get('/admin/announcement/edit/{ann}', 'AdminController@announcementEdit')->name('admin.editAnnouncement');
    Route::post('/admin/announcement/edit/{ann}/update', 'AdminController@announcementUpdate')->name('admin.announcement.edit');
    Route::get('/admin/announcement/delete/{ann}', 'AdminController@announcementDelete')->name('admin.deleteAnnouncement');
    Route::get('/admin/profile', 'AdminController@viewProfile')->name('viewadminprofile');
    Route::get('/admin/tutors', 'AdminController@viewTutors')->name('viewtutors');
    Route::get('/admin/students', 'AdminController@viewStudents')->name('viewstudents');
    Route::get('/admin/unapprovedtutors', 'AdminController@viewUnapprovedTutors')->name('viewunapprovedtutors');
    Route::get('/admin/unapprovedtutors/markasread', 'AdminController@markAsRead')->name('markasread');
    Route::get('/admin/unapprovedtutordetails/{unapprovedTutor}', 'AdminController@viewUnapprovedTutorDetails')->name('viewunapprovedtutordetails');
    Route::get('/admin/unapprovedtutordetails/{unapprovedTutor}/approvetutor', 'AdminController@approveTutor')->name('admin.approved');
    Route::get('/admin/rejectTutor/{unapprovedTutor}', 'AdminController@adminRejectTutor')->name('admin.tutor.reject');
    Route::get('/admin/viewstudents/{student}', 'AdminController@viewStudentProfile')->name('admin.viewstudentprofile');
    Route::get('/admin/viewstudent/{student}', 'AdminController@viewStudentProfile')->name('admin.viewstudentprofile');
    Route::get('/admin/removestudent/{student}', 'AdminController@removeStudent')->name('admin.removestudent');
    Route::get('/admin/viewtutor/{tutor}', 'AdminController@viewTutorProfile')->name('admin.viewtutorprofile');
    Route::get('/admin/removetutor/{tutor}', 'AdminController@removeTutor')->name('admin.removetutor');
    Route::get('/admin/a', function () {

        return view('admin');

    });
});
Route::middleware(['auth','student','verified'])->group( function(){
    
    Route::get('/student','StudentController@index')->name('student.dashboard');
    Route::get('/student/profile','StudentController@viewProfile')->name('student.profile');
    Route::get('/student/{student}/editprofile','StudentController@editProfile')->name('student.editProfile');
    Route::patch('/student/{student}', 'StudentController@updateProfile')->name('student.updateDetails');
    Route::get('/student/viewtutors','StudentController@showTutorList')->name('student.viewTutors');
    Route::get('/student/viewtutors/{tutor}','StudentController@viewTutorProfile')->name('student.viewTutorProfile');
    Route::post('/student/viewtutors/{tutor}/ratesubmit','StudentController@submitRate')->name('rateSubmit');
    //testing >
    Route::get('/student/viewtutors/{tutor}/timeslots','StudentController@timeslots')->name('student.viewTimeSlots');
    Route::post('/student/viewtutors/{tutor}/approve', 'StudentController@timeslotssubmit')->name('student.viewTimeSlotsSubmit');
    Route::post('/student/viewtutors/{tutor}/remove', 'StudentController@timeslotsremove')->name('student.viewTimeSlotsRemove');

    
    Route::get('/student/registerastutor','Auth\RegisterAsTutorController@showRegistrationForm')->name('registerAsTutor');
    Route::post('/student/registerastutor','Auth\RegisterAsTutorController@registerAsTutorSubmit')->name('student.register.tutor');
    Route::post('student/{user}/profilepicture', 'StudentController@updatePicture')->name('student.updatePicture');
}); 

    
    //Route::get('/tutor/a', function () {
    Route::middleware(['auth','tutor','verified'])->group( function(){
            
    Route::get('/tutor','TutorController@index')->name('tutor.dashboard');
    Route::get('/tutor/profile','TutorController@viewProfile')->name('tutor.profile');
    Route::get('/tutor/profile/{tutor}', 'TutorController@viewProfileSlots')->name('tutor.profile.timeslots');
    Route::get('/tutor/{tutor}/editprofile','TutorController@editProfile')->name('tutor.editProfile');
    Route::patch('/tutor/{tutor}', 'TutorController@updateProfile')->name('tutor.updateDetails');
    Route::post('tutor/{user}/profilepicture', 'TutorController@updatePicture')->name('tutor.updatePicture');
    Route::get('/tutor/a',function(){

        return view('tutor');
    });

    Route::get('/tutor/registerasstudent', 'Auth\RegisterAsStudentController@showRegistrationForm')->name('registerAsStudent');
    Route::post('/tutor/registerasstudent', 'Auth\RegisterAsStudentController@registerAsStudentSubmit')->name('tutor.register.student');
});

Route::get('/register/student', 'Auth\RegisterStudentController@showRegistrationForm')->name('register.student');
Route::post('/register/student', 'Auth\RegisterStudentController@register')->name('register.student.submit');

Auth::routes(['verify' => true]);

// route for processing payment
Route::post('payment/add-funds/paypal', 'PaymentController@payWithpaypal');

// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus')->name('status');

// Route::get('/home', 'HomeController@index')->name('home');


// Route::middleware(['auth','both'])->group( function(){
   
//     Route::get('/select',function(){
       
//         return view('select');
    
//     });
//     Route::get('/select/a',function(){
       
//         return view('select');
    
//     });
// });
