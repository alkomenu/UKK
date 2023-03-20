@extends('layouts.main')
@section('content')
<div>
    <h3>Pengaduan dibuat oleh {{$masyarakat->nama}}</h3>
    <p class="text-muted">Diadukan pada tanggal {{$pengaduan->tgl_pengaduan}}</p>
</div>
<div>
@if($pengaduan->status == '0')
(Belum ada tanggapan)
@elseif($pengaduan->status == 'proses')
<a href="/pengaduan/tanggapan/{{$pengaduan->id_pengaduan}}">lihat tanggapan</a>
@elseif($pengaduan->status == 'selesai')
<a href="/pengaduan/tanggapan/{{$pengaduan->id_pengaduan}}">pengaduan telah selesai diperoses</a>
@endif
</div>
<div class="row mt-5">
    <div class="col-12">
        <div>{{$pengaduan->isi_laporan}}</div>
    </div>
    <div class="col-12 mt-5">
        @if($pengaduan->foto != null)
            <img class="img-fluid" src="/storage/pengaduan/{{$pengaduan->foto}}" alt="{{$pengaduan->foto}}">
        @else
            <b>tidak ada foto</b>
        @endif    </div>
</div>

@endsection
