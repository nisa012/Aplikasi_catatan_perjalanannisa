<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelData;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $userData = config('user');
        $username = auth()->user()->name;

        $travelData = $this->readTravelData($username);

        $tanggalInput = $request->query('tanggal');
        $urutan = $request->query('urutan', 'desc');

        // Ubah format tanggal input sesuai kebutuhan (contoh: 'Y-m-d')
        $formattedTanggalInput = $tanggalInput ? date('Y-m-d', strtotime($tanggalInput)) : null;

        // Urutkan data berdasarkan tanggal
        usort($travelData, function ($a, $b) use ($urutan) {
            [$tanggalA, , , ] = explode(', ', $a);
            [$tanggalB, , , ] = explode(', ', $b);

            $timestampA = strtotime($tanggalA);
            $timestampB = strtotime($tanggalB);

            if ($urutan === 'desc') {
                return $timestampB - $timestampA;
            } else {
                return $timestampA - $timestampB;
            }
        });

        return view('catatan', compact('userData', 'travelData', 'urutan', 'formattedTanggalInput'));
    }

    public function store(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $jam = $request->input('jam');
        $lokasi = $request->input('lokasi');
        $suhu = $request->input('suhu');
        $username = auth()->user()->name;

        // Simpan data dalam database
        $data = new TravelData();
        $data->username = $username;
        $data->tanggal = $tanggal;
        $data->jam = $jam;
        $data->lokasi = $lokasi;
        $data->suhu = $suhu;
        $data->save();

        // Simpan data dalam file
        $this->writeTravelData($username, $tanggal, $jam, $lokasi, $suhu);

        return redirect()->route('catatan');
    }

    private function readTravelData($username)
    {
        $filePath = storage_path("{$username}.txt");
        if (file_exists($filePath)) {
            return file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        }
        return [];
    }

    private function writeTravelData($username, $tanggal, $jam, $lokasi, $suhu)
    {
        $filePath = storage_path("{$username}.txt");
        $data = "$tanggal, $jam, $lokasi, $suhu";
        file_put_contents($filePath, $data . PHP_EOL, FILE_APPEND);
    }
}
