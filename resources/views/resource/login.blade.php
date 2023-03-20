@extends('layouts.main')
@section('content')
<div>
    <h3 class="d-flex justify-content-center">Login</h3>

</div>
<div class="d-flex justify-content-center p-3">
    <form action="login" method="post" class="d-flex justify-content-center">
        @csrf
        <div class="row w-50">
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
                <input type="submit" value="Login" class="btn btn-outline-dark form-control">
            </div>
        </div>

    </form>
</div>

@endsection
