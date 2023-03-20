@extends('layouts.main')
@section('content')
<div>
    <h3>Beri Tanggapan</h3>

</div>
<div class="d-flex justify-content-center p-3">
    <form action="/tanggapan/store/{{$idPengaduan}}" method="post" enctype="multipart/form-data" class="d-flex justify-content-center">
        @csrf
        <div class="row">
            <div class="col-12 mb-2">
                <label for="tanggapi">tanggapi</label><br>
                <textarea name="tanggapi" class="form-control"></textarea>
            </div>
            @if ($errors->has('tanggapi'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('tanggapi') }}</strong>
                    </span>
                @endif
            <div class="col-12 mb-2">
                <input type="submit" value="Berikan tanggapi" class="form-control">
            </div>
        </div>

    </form>
</div>
@endsection
