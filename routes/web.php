<?php

use App\Mail\TestMailable;

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

Route::get('/mail', function() {
    // App\Jobs\SendMailJob
    \App\Jobs\SendMailJob::dispatch();
    
    return 'Test Send Message';
});

Route::get('/attendance', 'HrController@attendance')->name('employee.attendance');

Route::post('/submit', 'HrController@submitAttendance')->name('submit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/employees', 'HrController');