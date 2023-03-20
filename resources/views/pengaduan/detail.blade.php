@extends('layouts.main')
@section('content')
<div>

@if(Auth::user()->level == 'admin' || Auth::user()->level == 'petugas' )
<input type="button" onclick="printDiv('printableArea')" value="Generate Laporan" class="btn btn-success"/>
@endif
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
</div>
<div class="mt-2">
@if(Auth::user()->level == 'admin' || Auth::user()->level == 'petugas' )
    @if($pengaduan->status == '0')
    <a href="/tanggapan/verif/{{$pengaduan->id_pengaduan}}"><button class="btn btn-success">Verifikasi</button></a>
    @elseif($pengaduan->status == 'proses')
    <a href="/tanggapan/add/{{$pengaduan->id_pengaduan}}"><button class="btn btn-success">Beri Tanggapan</button></a>
    @elseif($pengaduan->status == 'selesai')
    <a href="#tanggapan" class="text-decoration-none"><h4 class="text-success">pengaduan telah selesai diperoses</h4></a>
    @endif
@elseif(Auth::user()->level == 'masyarakat')
    @if($pengaduan->status == '0')
    <h4 class="text-danger">Menunggu Laporan Diverifikasi</h4>
    @elseif($pengaduan->status == 'proses')
    <h4 class="text-success">Pengaduan Telah Diverifikasi</h4>
    @elseif($pengaduan->status == 'selesai')
    <a href="#tanggapan" class="text-decoration-none"><h4 class="text-success">pengaduan telah selesai diperoses</h4></a>
    @endif
@endif
</div>
<div id="printableArea">
    <span><strong>Tanggal : </strong> {{ now()->format('D, d M Y ') }}</span>
    <table class="table table-striped">
        <thead class="bg-dark text-light">
        <thead>
            <tr>
                @php
                     $no = 1;
                @endphp
                <th>No</th>
                <th>Tanggal Pengaduan</th>
                <th>Nik</th>
                <th>Isi Aduan</th>
                <th>Isi Tanggapan</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $pengaduan->tgl_pengaduan }}</td>
                <td>{{ $pengaduan->nik }}</td>
                <td>{{ $pengaduan->isi_laporan }}</td>
                <td>{{ $tanggapan->tanggapi }}</td>

                </tr>
        </tbody>
    </table>


@if($tanggapan != null)
<div class="row mt-5" id="tanggapan">
    <div class="col-12">
        <h4>Ditanggapi Oleh {{$petugas->nama_petugas}}</h4>
    </div>
    <div class="col-12">
        <div>{{$tanggapan->tanggapan}}</div>
    </div>
    <div class="col-12">
        <small class="text-muted">Ditanggapi pada : {{$tanggapan->created_at}}</small>
    </div>
</div>
</div>
@endif

@endsection

