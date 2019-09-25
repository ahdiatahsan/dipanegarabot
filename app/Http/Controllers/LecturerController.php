<?php

namespace App\Http\Controllers;

use App\Lecturer;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect, Response;

class LecturerController extends Controller
{
    public function getData()
    {
        return Datatables::of(Lecturer::all())
        ->addIndexColumn()
        ->addColumn('action', function($lecturers){
            if (Auth::check() && Auth::user()->role_id == 2 || Auth::user()->role_id == 1) {
                $actions =
                '<div class="kt-align-center">'.
                    '<span class="dropdown" title="Pilihan">'.
                        '<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">'.
                        '<i class="flaticon2-menu-4"></i>'.
                        '</a>'.
                        '<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 27px, 0px);">'.
                        '<form action="'.route('lecturer.destroy', $lecturers->id).'" method="POST">'.
                            '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                            '<input type="hidden" name="_method" value="DELETE">'.
                            '<button type="submit" class="dropdown-item kt-font-bolder kt-font-danger" OnClick="return confirm(\'Hapus data ini ?\')"><i class="la la-remove kt-font-danger"></i> Hapus</button>'.
                            '<a class="dropdown-item kt-font-bolder kt-font-success" href="'.route('lecturer.edit', $lecturers->id).'"><i class="la la-edit kt-font-success"></i> Ubah</a>'.
                        '</form>'.
                        '</div>'.
                    '</span>'.
                    '<a href="'. route('lecturer.show', $lecturers->id) .'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Lihat Detail">'.
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
                            '<a class="dropdown-item kt-font-bolder kt-font-success" href="'.route('lecturer.edit', $lecturers->id).'"><i class="la la-edit kt-font-success"></i> Ubah</a>'.
                        '</div>'.
                    '</span>'.
                    '<a href="'. route('lecturer.show', $lecturers->id) .'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Lihat Detail">'.
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
        return view('admin.lecturer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lecturer.create');
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
            'nidn' => 'required|max:255',
            'name' => 'required|max:255',
            'gender' => 'required|max:1',
            'degree' => 'required|max:4',
            'status' => 'required|max:2'
        ]);

        Lecturer::create($request->all());

        return redirect()->route('lecturer.index')->with('success', 'Data dosen berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        return view('admin.lecturer.show', compact('lecturer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer)
    {
        return view('admin.lecturer.edit', compact('lecturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        if (Auth::check() && Auth::user()->role_id == 2 || Auth::user()->role_id == 1) {
            $request->validate([
                'nidn' => 'required|max:255',
                'name' => 'required|max:255',
                'gender' => 'required|max:1',
                'degree' => 'required|max:4',
                'status' => 'required|max:2',
            ]);
        }else{
            $request->validate([
                'status' => 'required|max:2',
            ]);
        }

        $lecturer->update($request->all());

        return redirect()->route('lecturer.index')->with('success', 'Data dosen berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();
        return redirect()->route('lecturer.index')->with('success', 'Data dosen berhasil dihapus.');
    }
}
