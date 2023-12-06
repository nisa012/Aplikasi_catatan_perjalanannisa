
<!DOCTYPE html>
<html>
<head>
        <title>Catatan_perjalanan</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <div class="row">
                <div class="col-md-2 bg-light">
                    <img src="{{ asset('img/catatan.jpg') }}" alt="Foto Profil" class="img-fluid mt-3">
                </div>
            <div class="col-md-9">
                <h4 class="mt-3">Peduli Diri</h4>
                <p><a href="dashboard">home</a>|<a href="catatan">perjalanan</a>| <a href="isidata">isi data</a></p>
                <!-- Bagian form input tanggal dan tombol urutkan -->
                <form action="{{ route('catatan') }}" method="GET">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" id="tanggalInput" name="tanggal" value="{{ $formattedTanggalInput ?? '' }}">
                        <!-- Tambahkan input tersembunyi untuk menyimpan tanggalInput -->
                        <input type="hidden" name="urutan" value="{{ $urutan }}">
                        <button type="submit" class="btn btn-primary" id="btnUrutkan">Urutkan</button>
                    </div>
                </form>
                <table class="table table-bordered table-hover" border="3" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Lokasi</th>
                            <th>Suhu Tubuh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($travelData as $dataString)
                            @php
                                [$tanggal, $jam, $lokasi, $suhu] = explode(', ', $dataString);
                            @endphp
                            <tr>
                                <td>{{ $tanggal }}</td>
                                <td>{{ $jam }}</td>
                                <td>{{ $lokasi }}</td>
                                <td>{{ $suhu }}°C</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-danger btn-sm" id="btnGeneratePDF"><i class="fas fa-file-pdf"></i> Print</button>
                <button class="btn btn btn-sm" style="background-color: #BA94D1;"><a href="isidata" style="color: black; text-decoration: none;">Isi Catatan Perjalanan</a></button>
        </div>
    </div>
    @yield('content')
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnUrutkan = document.getElementById("btnUrutkan");
        const tanggalInput = document.getElementById("tanggalInput");

        btnUrutkan.addEventListener("click", function(event) {
            event.preventDefault();
            const urutan = "{{ $urutan === 'asc' ? 'desc' : 'asc' }}";
            const tanggal = tanggalInput.value;

            // Redirect to the sorted URL
            window.location.href = "{{ route('catatan') }}?tanggal=" + tanggal + "&urutan=" + urutan;
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnGeneratePDF = document.getElementById("btnGeneratePDF");

        btnGeneratePDF.addEventListener("click", function() {
            window.location.href = "{{ route('generate.pdf') }}";
        });
    });
</script>

</html>
