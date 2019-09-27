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

Route::get('/', function(){
    return view('auth.login');
})->middleware('guest');
Auth::routes();
Auth::routes([ 'register' => false ]);
Route::get('/botman/tinker', 'BotManController@tinker');
Route::any('getCourse', 'CourseController@getData')->name('course.getData');
Route::any('getFile', 'FileController@getData')->name('file.getData');
Route::any('getInformation', 'InformationController@getData')->name('information.getData');
Route::any('getInformationCategory', 'InformationCategoryController@getData')->name('informationCategory.getData');
Route::any('getLecture', 'LectureController@getData')->name('lecture.getData');
Route::any('getLectureHour', 'LectureHourController@getData')->name('lectureHour.getData');
Route::any('getLecturer', 'LecturerController@getData')->name('lecturer.getData');
Route::any('getRole', 'RoleController@getData')->name('role.getData');
Route::any('getRoom', 'RoomController@getData')->name('room.getData');
Route::any('getUser', 'UserController@getData')->name('user.getData');
Route::get('/botman/tinker', 'BotManController@tinker');
Route::match(['get', 'post'], '/botman', 'BotManController@handle');


Route::get('lecturerList', 'LecturerController@list');
Route::get('courseList', 'CourseController@list');
Route::get('lectureList', 'LectureController@list');
Route::get('informationList', 'InformationController@list');
Route::get('fileList', 'FileController@list');
Route::get('roomList', 'RoomController@list');

Route::any('getLecturerList', 'LecturerController@getList')->name('lecturer.getList');
Route::any('getCourseList', 'CourseController@getList')->name('course.getList');
Route::any('getLectureList', 'LectureController@getList')->name('lecture.getList');
Route::any('getInformationList', 'InformationController@getList')->name('information.getList');
Route::any('getFileList', 'FileController@getList')->name('file.getList');
Route::get('getRoomList', 'RoomController@getList')->name('room.getList');

Route::group(['middleware' => ['auth','superAdmin']], function () {
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');
});

Route::group(['middleware' => ['auth','admin']], function () {
    Route::resource('course', 'CourseController');
    Route::resource('file', 'FileController');
    Route::resource('informationCategory', 'InformationCategoryController');
    Route::resource('lectureHour', 'LectureHourController');
    Route::resource('room', 'RoomController');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('dashboard', 'DashboardController');
    Route::resource('information', 'InformationController');
    Route::resource('lecture', 'LectureController');
    Route::resource('lecturer', 'LecturerController');
});



