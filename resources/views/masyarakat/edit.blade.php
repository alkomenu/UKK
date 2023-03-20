@extends('layouts.main')
@section('content')
<div class="d-flex justify-content-center">
    <h3>Edit {{$masyarakat->nik}} - {{$masyarakat->nama}}</h3>

</div>
<div class="d-flex justify-content-center p-3">
    <form action="/masyarakat/update/{{$masyarakat->id}}" method="post" class="d-flex justify-content-center">
    @method('PUT')
        @csrf
        <div class="row w-50">
            <div class="col-12 mb-2">
                <label for="nik">Nik</label>
                <input type="text" name="nik" class="form-control" value="{{$masyarakat->nik}}">
            </div>
                @if ($errors->has('nik'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('nik') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{$masyarakat->nama}}">
            </div>
                @if ($errors->has('nama'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="{{$masyarakat->username}}">
            </div>
            @if ($errors->has('username'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <label for="telp">No. Telephone</label>
                <input type="text" name="telp" class="form-control" value="{{$masyarakat->telp}}">
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
