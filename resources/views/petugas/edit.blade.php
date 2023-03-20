@extends('layouts.main')
@section('content')
<div class="d-flex justify-content-center">
    <h3>Edit {{$petugas->nama_petugas}}</h3>

</div>
<div class="d-flex justify-content-center p-3">
    <form action="/petugas/update/{{$petugas->id}}" method="post" class="d-flex justify-content-center">
    @method('PUT')
        @csrf
        <div class="row w-50">
            <div class="col-12 mb-2">
                <label for="nama_petugas">Nama Petugas</label>
                <input type="text" name="nama_petugas" class="form-control" value="{{$petugas->nama_petugas}}">
            </div>
                @if ($errors->has('nama_petugas'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('nama_petugas') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="{{$petugas->username}}">
            </div>
            @if ($errors->has('username'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <label for="telp">No. Telephone</label>
                <input type="text" name="telp" class="form-control" value="{{$petugas->telp}}">
            </div>
            @if ($errors->has('telp'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('telp') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <input type="submit" value="Update" class="form-control btn btn-outline-info">
            </div>
        </div>

    </form>
</div>
@endsection
