@extends('layouts.main')
@section('content')
<div>
    <h3>Tambah Masyarakat</h3>

</div>
<div class="d-flex justify-content-center p-3">
    <form action="store" method="post" class="d-flex justify-content-center">
        @csrf
        <div class="row w-50">
            <div class="col-12 mb-2">
                <label for="nik">Nik</label>
                <input type="text" name="nik" class="form-control">
            </div>
                @if ($errors->has('nik'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('nik') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control">
            </div>
                @if ($errors->has('nama'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            @if ($errors->has('username'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            @if ($errors->has('password'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <label for="telp">No. Telephone</label>
                <input type="text" name="telp" class="form-control">
            </div>
            @if ($errors->has('telp'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('telp') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <input type="submit" value="Tambahkan" class="form-control">
            </div>
        </div>

    </form>
</div>
@endsection
