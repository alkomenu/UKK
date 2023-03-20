@extends('layouts.main')
@section('content')
<div class="d-flex justify-content-center">
    <h3>Edit </h3>

</div>
<div class="d-flex justify-content-center p-3">
    <form action="/pengaduan/update/{{$pengaduan->id}}" method="post" class="d-flex justify-content-center">
    @method('PUT')
        @csrf
        <div class="row w-50">
            <div class="col-12 mb-2">
                <label for="isi_laporan">Isi laporan</label>
                <input type="text" name="isi_laporan" class="form-control" value="{{$pengaduan->isi_laporan}}">
            </div>
            @if ($errors->has('isi_laporan'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('isi_laporan') }}</strong>
                    </span>
                @endif
                <div class="col-12 mb-2">
                    <label for="foto">Foto</label>
                    <input type="text" name="foto" class="form-control" value="{{$pengaduan->foto}}">
                </div>
                @if ($errors->has('foto'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('foto') }}</strong>
                        </span>
                    @endif
            <div class="col-12 mb-2">
                <input type="submit" value="Update" class="form-control btn btn-outline-info">
            </div>
        </div>

    </form>
</div>
@endsection
