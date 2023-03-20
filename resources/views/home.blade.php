@extends('layouts.main')
@section('content')
<div>
    @if(Auth::check() && Auth::user()->level == 'masyarakat')
    <a href="/pengaduan/add"><button class="btn btn-primary">Buat Pengaduan</button></a>
    @endif
@if($pengaduan->count() <= 0)
            <div class="d-flex justify-content-center">
                <h3>Belum Membuat Pengaduan</h3>
            </div>
@else
<table class="table table-striped">
    <thead class="bg-dark text-light">
        <tr>
            @php
            $no = 1;
        @endphp
            <th>No</th>
            <th>Tanggal </th>
            <th>Isi Laporan</th>
            <th>Foto</th>
            <th>Status</th>
            <th style="width: 100px">Action</th>
        </tr>
    </thead>
    <tbody>
            @foreach($pengaduan as $pengad)
        <tr>
            <td>{{$no++}}</td>
            <td> {{$pengad->tgl_pengaduan}} </td>
            <td> {{$pengad->isi_laporan}} </td>
            <td >
                @if($pengad->foto != null)
                    <img class="img-fluid" src="/storage/pengaduan/{{$pengad->foto}}" alt="{{$pengad->foto}}" width="100px">
                @else
                    <b>tidak ada foto</b>
                @endif
            <td >
            @if(!Auth::check())
                @if($pengad->status == '0')
                Belum Di Verifikasi
                @elseif($pengad->status == 'proses')
                Sedang Diperoses
                @elseif($pengad->status == 'selesai')
                Telah Ditanggapi
                @endif
            @elseif(Auth::check() && Auth::user()->level == 'masyarakat')
                @if($pengad->status == '0')
                Belum Di Verifikasi
                @elseif($pengad->status == 'proses')
                Sedang Diperoses
                @elseif($pengad->status == 'selesai')
                Telah Ditanggapi
                @endif
            @elseif(Auth::check() && Auth::user()->level == 'admin' OR Auth::user()->level == 'petugas')
                @if($pengad->status == '0')
                <a href="/pengaduan/detail/{{$pengad->id_pengaduan}}"><button class="btn btn-success">Verifikasi</button></a>
                @elseif($pengad->status == 'proses')
                <a href="/tanggapan/add/{{$pengad->id_pengaduan}}"><button class="btn btn-success">Beri Tanggapan</button></a>
                @elseif($pengad->status == 'selesai')
                selesai
                @endif

            @endif

            <td>

                <a href="/pengaduan/detail/{{$pengad->id_pengaduan}}"><button class="btn btn-primary">Show</button>

                    @if(Auth::check() && Auth::user()->level == 'admin')
                    <a  class="">Hapus</a>
                    <a class="">Edit</a>
            </td>
            @endif

            <!-- <td>
                @if($pengad->foto != null)
                    <img class="img-fluid pengaduan-preview" src="/storage/pengaduan/{{$pengad->foto}}" alt="{{$pengad->foto}}">
                @else
                    <b>tidak ada foto</b>
                @endif
            </td> -->
        </tr>
        @endforeach
        @endif
    </tbody>
</table>


</div>
@endsection
