@extends('layouts.main')
@section('content')



     @if(Session::has('success'))

     <div class="alert alert-success alert-block">
     <strong>Sukses menambahkan data</strong>
     </div>

   @endif
   @if(Session::has('ya'))
<div class="alert alert-success alert-block">
<strong>Sukses Login </strong>
</div>

@endif


   @if(Session::has('yaa'))
<div class="alert alert-success alert-block">
<strong>Sukses Logout  </strong>
</div>

@endif

<h1  >Pengaduan Masyarakat Desa</h1>
click ini -> <a href="/home"class="btn btn-warning">:)</a> untuk melakukan pengaduan


@endsection
