<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use App\Models\Pengaduan;
use App\Models\User;
use App\Models\Petugas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_pengaduan)
    {
        if (Auth::check()) {
            if (Auth::user()->level == 'petugas') {
                $user = Auth::user()->username;
                $petugas = Petugas::where('username', $user)->first();
                $idPengaduan = $id_pengaduan;
                return view('tanggapan.add', compact('petugas', 'idPengaduan'));
            }else{
                return redirect('/');
            }
        }
        return redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();
        $data = $request->validate([
            'id_tanggapan',
            'id_pengaduan',
            'tgl_tanggapan',
            'tanggapi' => 'required',
            'id_petugas'
        ]);

        $updateStatusPengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan);
        $today = Carbon::now()->toDateString();
        $user = Auth::user()->username;
        $petugas = Petugas::where('username', $user)->first();
        $idPetugasPrefix = substr($petugas->id_petugas, -3);
        $datePref = rand(100, 999);
        $idTanggapan = $pengaduan->id_pengaduan.$datePref;

        $data['id_tanggapan'] = (int)$idTanggapan;
        $data['id_pengaduan'] = $id_pengaduan;
        $data['id_petugas'] = $petugas->id_petugas;
        $data['tgl_tanggapan'] = $today;
        $updateStatus = $request->validate([
            'status'
        ]);
        $updateStatus['status'] = 'selesai';


        // dd($data);
        $updateStatusPengaduan->update($updateStatus);
        Tanggapan::create($data);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show(Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanggapan $tanggapan)
    {
        //
    }

    public function verif(Request $request, Tanggapan $tanggapan, $id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();
        $updateStatusPengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan);
        $updateStatus = $request->validate([
            'status'
        ]);
        $updateStatus['status'] = 'proses';
        $updateStatusPengaduan->update($updateStatus);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanggapan $tanggapan)
    {
        //
    }
}
