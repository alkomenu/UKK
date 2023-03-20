@extends('layouts.main')
@section('content')
<div class="mb-3">
    <a href="masyarakat/add">
        <button class="btn btn-outline-dark">Tambah</button>
    </a>
</div>
<table class="table table-striped">
    <thead class="bg-dark text-light">
        <tr>

            <th>No</th>
            <th>Nik</th>
            <th>Nama</th>
            <th>Username</th>
            <th>No.Telphone</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($masyarakat as $mas)
        <tr>

            <td>{{$loop->iteration}}</td>
            <td>{{$mas->nik}}</td>
            <td>{{$mas->nama}}</td>
            <td>{{$mas->username}}</td>
            <td>{{$mas->telp}}</td>
            <td><a href="masyarakat/edit/{{$mas->id}}" class="btn btn-primary">Edit</a>
                <a href="masyarakat/delete/{{$mas->id}}"class="btn btn-warning">Hapus</a>
            </td>
            <td></td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection
