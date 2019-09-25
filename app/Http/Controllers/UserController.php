<?php

namespace App\Http\Controllers;

use App\User;
use Datatables;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Redirect, Response;

class UserController extends Controller
{
    public function getData()
    {
        $query = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->select([
            'users.id',
            'users.name',
            'users.email',
            'roles.id as roles_id',
            'roles.name as roles',
        ]);

        return Datatables::of($query)
        ->addIndexColumn()
        ->addColumn('action', function($user){
            $actions =
            '<div class="kt-align-center">'.
                '<span class="dropdown" title="Pilihan">'.
                    '<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">'.
                    '<i class="flaticon2-menu-4"></i>'.
                    '</a>'.
                    '<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 27px, 0px);">'.
                    '<form action="'.route('user.destroy', $user->id).'" method="POST">'.
                        '<input type="hidden" name="_token" value="'.csrf_token().'">'.
                        '<input type="hidden" name="_method" value="DELETE">'.
                        '<button type="submit" class="dropdown-item kt-font-bolder kt-font-danger" OnClick="return confirm(\'Hapus data ini ?\')"><i class="la la-remove kt-font-danger"></i> Hapus</button>'.
                        '<a class="dropdown-item kt-font-bolder kt-font-success" href="'.route('user.edit', $user->id).'"><i class="la la-edit kt-font-success"></i> Ubah</a>'.
                    '</form>'.
                    '</div>'.
                '</span>'.
                '<a href="'. route('user.show', $user->id) .'" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Lihat Detail">'.
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
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|max:2',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id' => $request['role_id'],
        ]);

        return redirect()->route('user.index')->with('success', 'Data User berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id.',id',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|max:2',
        ]);

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id' => $request['role_id'],
        ]);

        return redirect()->route('user.index')->with('success', 'Data User berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus.');
    }
}
