<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Masyarakat</title>
        <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</head>
<body class="bg-white">
    <header class="bg-white">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
            <div class="container-fluid">
      <a class="navbar-brand" href="/">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse show" id="navbarsExample05" style="">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/home">Pengaduan</a>
                </li>
                @if(Auth::check() && Auth::user()->level == 'admin')
                <li class="nav-item active">
                    <a class="nav-link" href="/petugas">Petugas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/masyarakat" >Masyarakat</a>
                </li>

                @endif
            </ul>
        </div>
        <div class="d-flex flex-row-reverse">
            @if(Auth::check())
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->nama}}
                </button>
                <ul class="dropdown-menu show" aria-labelledby="dropdown01" data-bs-popper="none">

                    <li>

                        @if(Auth::check() && Auth::user()->level == 'masyarakat')
                        <a class="dropdown-item" href="/pengaduanku" >Pengaduan saya</a>

                        @endif
                    </li>
                    <li>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </li>
                </ul>
                </div>
                @else
                <a href="/login">
                    <button class="btn btn-light ms-2">
                        Login
                    </button>
                </a>
                <a href="/register">
                    <button class="btn btn-light">
                        Register
                    </button>
                </a>
                @endif

            </div>
    </div>
</nav>


</nav>
</header>
<div class="bg-light py-1 vh-100">
    <div class="container my-5 bg-light">

        @yield('content')
    </div>
    </div>
</div>
</body>
</html>



