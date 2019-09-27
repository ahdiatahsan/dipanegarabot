<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Redirect, Response;
use Datatables;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function getData()
    {
        return Datatables::of(File::all())
        ->addIndexColumn()
        ->addColumn('action', function($file){
            $actions =
            '<div class="kt-align-center">'.
                '<span class="dropdown" title="Pilihan">'.
                    '<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">'.
                    '<i class="flaticon2-menu-4"></i>'.
                    '</a>'.
                    '<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 27px, 0px);">'.
                    '<form action="'.route('file.destroy', $file->id).'" method="POST">'.
                        '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                        '<input type="hidden" name="_method" value="DELETE">'.
                        '<button type="submit" class="dropdown-item kt-font-bolder kt-font-danger" OnClick="return confirm(\'Hapus data ini ?\')"><i class="la la-remove kt-font-danger"></i> Hapus</button>'.
                        // '<a class="dropdown-item kt-font-bolder kt-font-success" href="'.route('informationCategory.edit', $file->id).'"><i class="la la-edit kt-font-success"></i> Ubah</a>'.
                    '</form>'.
                    '</div>'.
                '</span>'.
                '<a href="'. route('file.show', $file->id) .'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Lihat Detail">'.
                    '<i class="flaticon2-search"></i>'.
                '</a>'.
            '</div>';
            return $actions;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function getList()
    {
        return Datatables::of(File::all())
        ->addIndexColumn()
        ->make(true);
    }

    public function list()
    {
        return view('admin.file.list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.file.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.file.create');
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
            'title' => 'required|max:255',
            'filename' => 'required|file|max:1000|mimes:jpeg,jpg,png,pdf,doc,docx,odt,xls,xlsx,ppt,pptx',
        ]);

        $file = $request->file('filename');
        $newFile = time().rand(512,1024).'.'. $file->getClientOriginalExtension();
        Storage::putFileAs('public', $file, $newFile);

        File::create([
            'title' => $request['title'],
            'filename' => $newFile,
            'filetype' => strtolower($file->getClientOriginalExtension()),
        ]);

        return redirect()->route('file.index')->with('success', 'Data File berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view('admin.file.show', compact('file'));
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
    public function destroy(File $file)
    {
        if (\File::exists(public_path('storage/'.$file->filename))) {
            \File::delete(public_path('storage/'.$file->filename));
        }
        $file->delete();
        return redirect()->route('file.index')->with('success', 'Data File berhasil dihapus.');
    }
}
