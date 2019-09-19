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

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('dashboard', 'DashboardController');

Route::resource('room', 'RoomController');
Route::any('getRoom', 'RoomController@getData')->name('room.getData');

Route::resource('lectureHour', 'LectureHourController');
Route::any('getLectureHour', 'LectureHourController@getData')->name('lectureHour.getData');

Route::resource('course', 'CourseController');
Route::any('getCourse', 'CourseController@getData')->name('course.getData');

Route::resource('lecturer', 'LecturerController');
Route::any('getLecturer', 'LecturerController@getData')->name('lecturer.getData');

Route::resource('lecture', 'LectureController');
Route::any('getLecture', 'LectureController@getData')->name('lecture.getData');
