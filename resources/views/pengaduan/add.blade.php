@extends('layouts.main')
@section('content')
<div>
    <h3>Buat Pengaduan</h3>

</div>
<div class="d-flex justify-content-center p-3">
    <form action="store" method="post" enctype="multipart/form-data" class="d-flex justify-content-center">
        @csrf
        <div class="row w-50">
            <!-- <div class="col-12 mb-2">
                <label for="id_pengaduan">ID Pengaduan</label>
                <input type="text" name="id_pengaduan" class="form-control">
            </div>
                @if ($errors->has('id_pengaduan'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('id_pengaduan') }}</strong>
                    </span>
                @endif -->
            {{-- <div class="col-12 mb-2">
                <label for="tgl_pengaduan">Tanggal pengaduan</label><br>
                <input type="date" name="tgl_pengaduan">
            </div> --}}
                @if ($errors->has('tgl_pengaduan'))
                    {{-- <span class="text-danger"> --}}
                       <!-- <strong>{{ $errors->first('tgl_pengaduan') }}</strong>
                    </span>
                @endif
            <!-- <div class="col-12 mb-2">
                <label for="nik">NIK</label>
                {{-- <input type="text" name="nik" value="{{$masyarakat->nik}}" class="form-control" disabled> --}}
            </div>
            @if ($errors->has('nik'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('nik') }}</strong>
                    </span>
                @endif -->
            <div class="col-12 mb-2">
                <label for="isi_laporan">Isi Laporan</label><br>
                <textarea class="form-control" name="isi_laporan" ></textarea>
            </div>
            @if ($errors->has('isi_laporan'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('isi_laporan') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" name="foto">
            </div>
            @if ($errors->has('foto'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('foto') }}</strong>
                    </span>
                @endif
            @if ($errors->has('status'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <input type="submit" value="Tambahkan" class="form-control">
            </div>
        </div>

    </form>
</div>
@endsection
