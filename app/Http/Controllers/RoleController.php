<?php

namespace App\Http\Controllers;

use App\Role;
use Datatables;
use Illuminate\Http\Request;
use Redirect, Response;

class RoleController extends Controller
{
    public function getData()
    {
        return Datatables::of(Role::all())
        ->addIndexColumn()
        ->addColumn('action', function($role){
            $actions =
            '<div class="kt-align-center">'.
                '<span class="dropdown" title="Pilihan">'.
                    '<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">'.
                    '<i class="flaticon2-menu-4"></i>'.
                    '</a>'.
                    '<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 27px, 0px);">'.
                    '<form action="'.route('role.destroy', $role->id).'" method="POST">'.
                        '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                        '<input type="hidden" name="_method" value="DELETE">'.
                        '<button type="submit" class="dropdown-item kt-font-bolder kt-font-danger" OnClick="return confirm(\'Hapus data ini ?\')"><i class="la la-remove kt-font-danger"></i> Hapus</button>'.
                        '<a class="dropdown-item kt-font-bolder kt-font-success" href="'.route('role.edit', $role->id).'"><i class="la la-edit kt-font-success"></i> Ubah</a>'.
                    '</form>'.
                    '</div>'.
                '</span>'.
                '<a href="'. route('role.show', $role->id) .'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Lihat Detail">'.
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
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
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
        ]);

        Role::create($request->all());

        return redirect()->route('role.index')->with('success', 'Data peran berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $role->update($request->all());

        return redirect()->route('role.index')->with('success', 'Data peran berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Data peran berhasil dihapus.');
    }
}
