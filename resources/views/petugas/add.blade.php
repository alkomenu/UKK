@extends('layouts.main')
@section('content')
<div>
    <h3>Tambah Petugas</h3>

</div>
<div class="d-flex justify-content-center p-3">
    <form action="store" method="post" class="d-flex justify-content-center">
        @csrf
        <div class="row w-50">
            <div class="col-12 mb-2">
                <label for="id_petugas">ID Petugas</label>
                <input type="text" name="id_petugas" class="form-control">
            </div>
                @if ($errors->has('id_petugas'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('id_petugas') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <label for="nama_petugas">Nama Petugas</label>
                <input type="text" name="nama_petugas" class="form-control">
            </div>
                @if ($errors->has('nama_petugas'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('nama_petugas') }}</strong>
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
                <label for="password_confirm">Password Confirm</label>
                <input type="password" name="password_confirm" class="form-control">
            </div>
            @if ($errors->has('password_confirm'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('password_confirm') }}</strong>
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
                <label for="level">Level</label>
                <select name="level">
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>
            @if ($errors->has('level'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('level') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <input type="submit" value="Tambahkan" class="form-control">
            </div>
        </div>

    </form>
</div>
@endsection
