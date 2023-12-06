<!DOCTYPE html>
<html>
<head>
    <title>Catatan_perjalanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #BA94D1;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">Catatan Perjalanan</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-light">
                <img src="{{ asset('img/profil1.jpg') }}" alt="Foto Profil" class="img-fluid mt-3">
            </div>
            <div class="col-md-9">
                <h4 class="mt-3">Peduli Diri</h4>
                <p><a href="dashboard">home</a>|<a href="catatan">perjalanan</a>| <a href="isidata">isi data</a></p>
                    <table class="table table-bordered table-hover" border="3" cellspacing="0">
                        <tr>
                            <td><strong>Selamat Datang {{ Auth::user()->name }} di Aplikasi Peduli Diri<br><br><br><br></strong></td>
                        </tr>
                    </table>
                    <button class="btn" style="background-color: #BA94D1;"><a href="isidata" style="color: black; text-decoration: none;">Isi Catatan Perjalanan</a></button>
            </div>
        </div>
    </div>
    </div>
    @yield('content')
</body>
</html>

