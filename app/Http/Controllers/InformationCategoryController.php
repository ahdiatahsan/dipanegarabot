<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InformationCategory;
use Redirect, Response;
use Datatables;

class InformationCategoryController extends Controller
{
    public function getData()
    {
        return Datatables::of(InformationCategory::all())
        ->addIndexColumn()
        ->addColumn('action', function($informationCategory){
            $actions =
            '<div class="kt-align-center">'.
                '<span class="dropdown" title="Pilihan">'.
                    '<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">'.
                    '<i class="flaticon2-menu-4"></i>'.
                    '</a>'.
                    '<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 27px, 0px);">'.
                    '<form action="'.route('informationCategory.destroy', $informationCategory->id).'" method="POST">'.
                        '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                        '<input type="hidden" name="_method" value="DELETE">'.
                        '<button type="submit" class="dropdown-item kt-font-bolder kt-font-danger" OnClick="return confirm(\'Hapus data ini ?\')"><i class="la la-remove kt-font-danger"></i> Hapus</button>'.
                        '<a class="dropdown-item kt-font-bolder kt-font-success" href="'.route('informationCategory.edit', $informationCategory->id).'"><i class="la la-edit kt-font-success"></i> Ubah</a>'.
                    '</form>'.
                    '</div>'.
                '</span>'.
                '<a href="'. route('informationCategory.show', $informationCategory->id) .'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Lihat Detail">'.
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
        return view('admin.information_category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.information_category.create');
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
            'name' => 'required|max:255|unique:information_categories',
            'detail' => 'required|max:255',
        ]);

        InformationCategory::create($request->all());

        return redirect()->route('informationCategory.index')->with('success', 'Data Kategori Informasi berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(InformationCategory $informationCategory)
    {
        return view('admin.information_category.show', compact('informationCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(InformationCategory $informationCategory)
    {
        return view('admin.information_category.edit', compact('informationCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InformationCategory $informationCategory)
    {
        $request->validate([
            'name' => 'required|max:255|unique:information_categories',
            'detail' => 'required|max:255',
        ]);

        $informationCategory->update($request->all());

        return redirect()->route('informationCategory.index')->with('success', 'Data Kategori Informasi berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InformationCategory $informationCategory)
    {
        $informationCategory->delete();
        return redirect()->route('informationCategory.index')->with('success', 'Data Kategori Informasi berhasil dihapus.');
    }
}
