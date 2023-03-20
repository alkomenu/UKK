<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masyarakat = Masyarakat::get();
        return view('masyarakat.show', compact('masyarakat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masyarakat.add');
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
            'nik' => 'required|unique:masyarakat|numeric',
            'nama' => 'required',
            'telp' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',

        ]);
        $data['password'] = bcrypt($data['password']);

        $addUser = $request->validate([
            'nama',
            'username',
            'role',
            'password',
        ]);
        $addUser['nama'] = $data['nama'];
        $addUser['username'] = $data['username'];
        $addUser['role'] = 'masyarakat';
        $addUser['password'] = $data['password'];

        Masyarakat::create($data);
        User::create($addUser);
        if (Auth::check()) {
            return redirect('/masyarakat');
        }
        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(Masyarakat $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(Masyarakat $masyarakat, $id)
    {
        $masyarakat = Masyarakat::find($id);
        return view('masyarakat.edit', compact('masyarakat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masyarakat $masyarakat, $id)
    {
        $userBefore = Masyarakat::where('id', $id)->first();
        $usernameBefore = $userBefore->username;
        $masyarakat =  Masyarakat::where('id', $id);
        $user = User::where('username', $usernameBefore);
        $userVal = User::where('username', $usernameBefore)->first();
        $data = $request->validate([
            'nik' => 'required|numeric|unique:masyarakat,nik,'.$userBefore->id,
            'nama' => 'required',
            'telp' => 'required',
            'username' => 'required|unique:users,username,'.$userVal->id,
        ]);

        $addUser = $request->validate([
            'nama',
            'username',
            'role',
        ]);
        $addUser['nama'] = $data['nama'];
        $addUser['username'] = $data['username'];
        $addUser['role'] = 'masyarakat';

        $masyarakat->update($data);
        $user->update($addUser);
        return redirect('/masyarakat')->with('success', 'login berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masyarakat $masyarakat, $id)
    {
        $userBefore = Masyarakat::where('id', $id)->first();
        $usernameBefore = $userBefore->username;
        $masyarakat =  Masyarakat::where('id', $id);
        $user = User::where('username', $usernameBefore);
        $masyarakat->delete();
        $user->delete();

        return redirect('/masyarakat')
        ->with('success','Berhasil Hapus !');
    }
}
