<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Petugas;
use App\Models\User;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::get();
        return view('home', compact('pengaduan'));
    }

    public function pengaduanku()
    {
        $username = Auth::user()->username;
        $masyarakat = Masyarakat::where("username", $username)->first();
        $nik = $masyarakat->nik;
        $pengaduan = Pengaduan::where('nik', $nik)->get();
        return view('home', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            if (Auth::user()->level == 'masyarakat') {
                $user = Auth::user()->username;
                $masyarakat = Masyarakat::where('username', $user)->first();
                return view('pengaduan.add', compact('masyarakat'));
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
    public function store(Request $request)
    {

        $data = $request->validate([
            'id_pengaduan',
            'tgl_pengaduan',
            'nik',
            'isi_laporan' => 'required',
            'foto' => 'nullable',
            'status'
        ]);
        // dd($request->hasFile('foto'));
        if($request->hasFile('foto')){
            $fileNameExt = $request->file('foto')->getClientOriginalName();
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $ext = $request->file('foto')->getClientOriginalExtension();
            $saveName = $fileName .'_'. time().'.'.$ext;
            $path = $request->file('foto')->storeAs('public/pengaduan', $saveName);
        }else{
            $saveName = null;
        }

        $today = Carbon::now()->toDateString();
        $countPengaduan = Pengaduan::where('tgl_pengaduan', $today)->count();
        $user = Auth::user()->username;
        $masyarakat = Masyarakat::where('username', $user)->first();
        $pengaduanKu = Pengaduan::where('nik', $masyarakat->nik)->count();
        $nikPrefix = substr($masyarakat->nik, -3);
        $prefix = '1'.$nikPrefix .$pengaduanKu .$countPengaduan;

        $data['foto'] = $saveName;
        $data['id_pengaduan'] = (int)$prefix;
        $data['nik'] = $masyarakat->nik;
        $data['tgl_pengaduan'] = $today;

        $data['status'] = '0';

        // dd($data);

        Pengaduan::create($data);

        return redirect('/')->with('success',$ky = 'login berhasil!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan, $id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan',$id)->first();
        $masyarakat = Masyarakat::where('nik', $pengaduan->nik)->first();
        $tanggapan = Tanggapan::where('id_pengaduan', $id)->first();
        if ($tanggapan != null) {
            $petugas = Petugas::where('id_petugas', $tanggapan->id_petugas)->first();
        }else{
            $petugas = null;
        }
        // dd($pengaduan, $masyarakat);
        return view('pengaduan.detail', compact('pengaduan', 'masyarakat', 'tanggapan', 'petugas'));
        if (Auth::check()) {
            return redirect('/');
        }
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('pengaduan.edit', compact('pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,Pengaduan $pengaduan ,  $id)
    {
        $userBefore = Pengaduan::where('id', $id)->first();
        $pengaduan =  Pengaduan::where('id', $id);
        $data = $request->validate([
            'id_pengaduan' => 'required|numeric|unique:pengaduan,id_pengaduan,'.$userBefore->id,
            'tgl_pengaduan' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'required',

        ]);


        $pengaduan->update($data);
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan, $id)
    {
        Pengaduan::Destroy($id);
        return redirect('/home');
    }
}
