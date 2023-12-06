<!DOCTYPE html>
<html>
<head>
    <title>Laporan Catatan Perjalanan </title>
    <style>
        /* Gaya CSS tambahan untuk laporan PDF */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Laporan Catatan Perjalanan {{ $userData->name }} </h2>
    <table>
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
</body>
</html>
