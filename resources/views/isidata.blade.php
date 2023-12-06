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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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
                <img src="{{ asset('img/isidata1.jpg') }}" alt="Foto Profil" class="img-fluid mt-3">
            </div>
            <div class="col-md-5">
                <h4 class="mt-3">Peduli Diri</h4>
                <p><a href="dashboard">home</a> | <a href="catatan">perjalanan</a> |  <a href="isidata">isi data</a></p>
                <form action="{{ route('isidata.store') }}" method="post" class="bordered-form mt-3">
                    @csrf
                    <label for="tanggal" style="display: inline-block; width: 120px;">Tanggal:</label>
                    <input type="date" id="tanggal" name="tanggal" size="53"><br><br>
                    <label for="jam" style="display: inline-block; width: 120px;">Jam:</label>
                    <input type="time" id="jam" name="jam" size="53"><br><br>
                    <label for="lokasi" style="display: inline-block; width: 120px;">Lokasi yang Dituju:</label>
                    <input type="text" id="lokasi" name="lokasi" size="53"><br><br>
                    <label for="suhu" style="display: inline-block; width: 120px;">Suhu Tubuh:</label>
                    <input type="text" id="suhu" name="suhu" size="53"><br><br>
                    <div style="text-align: right;">
                        <button type="submit" style="background-color: #BA94D1;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @yield('content')
</body>
<style>
    .bordered-form {
        border: 2px solid black;
        padding: 20px;
        width: 600px;
        margin: 0 auto;
    }
</style>
</html>
