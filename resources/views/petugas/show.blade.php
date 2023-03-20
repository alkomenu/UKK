@extends('layouts.main')
@section('content')
<div class="mb-3">
    <a href="petugas/add">
        <button class="btn btn-outline-dark">Tambah</button>
    </a>
</div>
<table class="table table-striped">
    <thead class="bg-dark text-light">
        <tr>
            @php
                $no = 1;
            @endphp
            <th>No</th>
            <th>Nama Petugas</th>
            <th>Username</th>
            <th>No.Telphone</th>
            <th>Level</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($petugas as $mas)
        <tr>

            <td>{{$no++}}</td>
            <td>{{$mas->nama_petugas}}</td>
            <td>{{$mas->username}}</td>
            <td>{{$mas->telp}}</td>
            <td>{{$mas->level}}</td>
            <td><a href="petugas/edit/{{$mas->id}}" class="btn btn-primary">Edit</a>
                <a href="petugas/delete/{{$mas->id}}" class="btn btn-warning">Hapus</a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection
