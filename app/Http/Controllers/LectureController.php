<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lecture;
use App\LectureHour;
use App\Lecturer;
use App\Room;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect, Response;

class LectureController extends Controller
{
    public function getData()
    {
        $query = DB::table('lectures')
                ->join('rooms', 'lectures.room_id', '=', 'rooms.id')
                ->join('lecture_hours', 'lectures.lecture_hour_id', '=', 'lecture_hours.id')
                ->join('lecturers', 'lectures.lecturer_id', '=', 'lecturers.id')
                ->join('courses', 'lectures.course_id', '=', 'courses.id')
                ->where('lecturers.status', '=', 'H')
                ->select([
                    'courses.name as courses',
                    'lecture_hours.time',
                    'lecturers.name as lecturers',
                    'lectures.id',
                    'lectures.status',
                    'lectures.updated_at',
                    'rooms.name',
                ])->orderBy('updated_at', 'desc');

        return Datatables::of($query)
        ->addIndexColumn()
        ->setRowId('lectures.id')
        ->addColumn('action', function($lecture){
            if (Auth::check() && Auth::user()->role_id == 2 || Auth::user()->role_id == 1) {
                $actions =
                '<div class="kt-align-center">'.
                    '<span class="dropdown" title="Pilihan">'.
                        '<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">'.
                        '<i class="flaticon2-menu-4"></i>'.
                        '</a>'.
                        '<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 27px, 0px);">'.
                        '<form action="'.route('lecture.destroy', $lecture->id).'" method="POST">'.
                            '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                            '<input type="hidden" name="_method" value="DELETE">'.
                            '<button type="submit" class="dropdown-item kt-font-bolder kt-font-danger" OnClick="return confirm(\'Hapus data ini ?\')"><i class="la la-remove kt-font-danger"></i> Hapus</button>'.
                            '<a class="dropdown-item kt-font-bolder kt-font-success" href="'.route('lecture.edit', $lecture->id).'"><i class="la la-edit kt-font-success"></i> Ubah</a>'.
                        '</form>'.
                        '</div>'.
                    '</span>'.
                    '<a href="'. route('lecture.show', $lecture->id) .'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Lihat Detail">'.
                        '<i class="flaticon2-search"></i>'.
                    '</a>'.
                '</div>';
                return $actions;
            }else{
                $actions =
                '<div class="kt-align-center">'.
                    '<span class="dropdown" title="Pilihan">'.
                        '<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">'.
                        '<i class="flaticon2-menu-4"></i>'.
                        '</a>'.
                        '<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 27px, 0px);">'.
                            '<a class="dropdown-item kt-font-bolder kt-font-success" href="'.route('lecture.edit', $lecture->id).'"><i class="la la-edit kt-font-success"></i> Ubah</a>'.
                        '</div>'.
                    '</span>'.
                    '<a href="'. route('lecture.show', $lecture->id) .'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Lihat Detail">'.
                        '<i class="flaticon2-search"></i>'.
                    '</a>'.
                '</div>';
                return $actions;
            }
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.lecture.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $lectureHours = LectureHour::all();
        $lecturers = Lecturer::all();
        $lectures = Lecture::all();
        $rooms = Room::all();

        return view('admin.lecture.create', compact('courses', 'lectureHours', 'lecturers', 'lectures', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|max:255',
            'lecture_hour_id' => 'required|max:255',
            'lecturer_id' => 'required|max:255',
            'course_id' => 'required|max:255',
            'status' => 'required|max:2'
        ]);

        Lecture::create($request->all());

        return redirect()->route('lecture.index')->with('success', 'Data perkuliahan berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        return view('admin.lecture.show', compact('lecture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        $courses = Course::all();
        $lectureHours = LectureHour::all();
        $lecturers = Lecturer::all();
        $lectures = Lecture::all();
        $rooms = Room::all();

        return view('admin.lecture.edit', compact('lecture','courses', 'lectureHours', 'lecturers', 'lectures', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        if (Auth::check() && Auth::user()->role_id == 2 || Auth::user()->role_id == 1) {
            $request->validate([
                'room_id' => 'required|max:255',
                'lecture_hour_id' => 'required|max:255',
                'lecturer_id' => 'required|max:255',
                'course_id' => 'required|max:255',
                'status' => 'required|max:2'
            ]);
        }else{
            $request->validate([
                'status' => 'required|max:2'
            ]);
        }

        $lecture->update($request->all());

        return redirect()->route('lecture.index')->with('success', 'Data perkuliahan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        $lecture->delete();
        return redirect()->route('lecture.index')->with('success', 'Data perkuliahan berhasil dihapus.');
    }
}
