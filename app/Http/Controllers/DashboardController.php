<?php

namespace App\Http\Controllers;

use App\Course;
use App\File;
use App\Information;
use App\InformationCategory;
use App\Lecture;
use App\LectureHour;
use App\Lecturer;
use App\Room;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::count();
        $file = File::count();
        $information = Information::count();
        $informationCategory = InformationCategory::count();
        $lecture = Lecture::count();
        $lectureHour = LectureHour::count();
        $lecturer = Lecturer::count();
        $room = Room::count();
        $user = User::count();

        return view('admin.dashboard.index', compact('course', 'file', 'information', 'informationCategory', 'lecture', 'lectureHour', 'lecturer', 'room', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
