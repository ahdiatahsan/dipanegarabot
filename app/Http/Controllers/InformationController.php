<?php

namespace App\Http\Controllers;

use App\File;
use App\Information;
use App\InformationCategory;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    public function getData()
    {
        $query = DB::table('information')
                ->join('information_categories', 'information.information_category_id', '=', 'information_categories.id')
                ->select([
                    'information_categories.name as category',
                    'information.id',
                    'information.name',
                    'information.updated_at',
                ])->orderBy('updated_at', 'desc');

        return Datatables::of($query)
        ->addIndexColumn()
        ->setRowId('information.id')
        ->addColumn('action', function($information){
            $actions =
            '<div class="kt-align-center">'.
                '<span class="dropdown" title="Pilihan">'.
                    '<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">'.
                    '<i class="flaticon2-menu-4"></i>'.
                    '</a>'.
                    '<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 27px, 0px);">'.
                    '<form action="'.route('information.destroy', $information->id).'" method="POST">'.
                        '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                        '<input type="hidden" name="_method" value="DELETE">'.
                        '<button type="submit" class="dropdown-item kt-font-bolder kt-font-danger" OnClick="return confirm(\'Hapus data ini ?\')"><i class="la la-remove kt-font-danger"></i> Hapus</button>'.
                        '<a class="dropdown-item kt-font-bolder kt-font-success" href="'.route('information.edit', $information->id).'"><i class="la la-edit kt-font-success"></i> Ubah</a>'.
                    '</form>'.
                    '</div>'.
                '</span>'.
                '<a href="'. route('information.show', $information->id) .'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Lihat Detail">'.
                    '<i class="flaticon2-search"></i>'.
                '</a>'.
            '</div>';
            return $actions;
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
        return view('admin.information.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = File::all();
        $informationCategories = InformationCategory::all();

        return view('admin.information.create', compact('files', 'informationCategories'));
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
            'name' => 'required|max:255',
            'information_category_id' => 'required',
            'body' => 'required|max:2000',
        ]);

        Information::create($request->all());

        return redirect()->route('information.index')->with('success', 'Data Informasi berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        return view('admin.information.show', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        $files = File::all();
        $informationCategories = InformationCategory::all();

        return view('admin.information.edit', compact('information','files', 'informationCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        $request->validate([
            'name' => 'required|max:255',
            'information_category_id' => 'required',
            'body' => 'required|max:2000',
        ]);

        $information->update($request->all());

        return redirect()->route('information.index')->with('success', 'Data Informasi berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        $information->delete();
        return redirect()->route('information.index')->with('success', 'Data Informasi berhasil dihapus.');
    }
}
