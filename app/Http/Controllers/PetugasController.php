<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = Petugas::get();
        return view('petugas.show', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_petugas' => 'required|unique:petugas|numeric',
            'nama_petugas' => 'required',
            'telp' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'level' => 'required'
        ]);
        $data['password'] = bcrypt($data['password']);

        $addUser = $request->validate([
            'nama',
            'username',
            'role',
            'password',
        ]);
        $addUser['nama'] = $data['nama_petugas'];
        $addUser['username'] = $data['username'];
        $addUser['role'] = $data['level'];
        $addUser['password'] = $data['password'];

        Petugas::create($data);
        User::create($addUser);
        if (Auth::check()) {
            return redirect('/petugas');
        }
        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas, $id)
    {
        $petugas = Petugas::find($id);
        return view('petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petugas $petugas, $id)
    {
        $userBefore = Petugas::where('id', $id)->first();
        $usernameBefore = $userBefore->username;
        $petugas =  Petugas::where('id', $id);
        $user = User::where('username', $usernameBefore);
        $userVal = User::where('username', $usernameBefore)->first();
        $data = $request->validate([
            'id_petugas' => 'required|numeric|unique:petugas,id_petugas,'.$userBefore->id,
            'nama_petugas' => 'required',
            'telp' => 'required',
            'username' => 'required|unique:users,username,'.$userVal->id,
        ]);

        $addUser = $request->validate([
            'nama',
            'username',
            'role',
        ]);
        $addUser['nama'] = $data['nama_petugas'];
        $addUser['username'] = $data['username'];

        $petugas->update($data);
        $user->update($addUser);
        return redirect('/petugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petugas, $id)
    {
        $userBefore = Petugas::where('id', $id)->first();
        $usernameBefore = $userBefore->username;
        $petugas =  Petugas::where('id', $id);
        $user = User::where('username', $usernameBefore);
        $petugas->delete();
        $user->delete();

        return redirect('/petugas')
        ->with('success','Berhasil Hapus !');
    }
}
