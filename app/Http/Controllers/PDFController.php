<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $userData = auth()->user();
        $username = $userData->name;
        $travelData = $this->readTravelData($username);

        $pdf = PDF::loadView('pdf.report', compact('userData', 'travelData'));

        return $pdf->download('catatan_perjalanan.pdf');
    }

    private function readTravelData($username)
    {
        $filePath = storage_path("{$username}.txt");
        $travelData = [];

        if (file_exists($filePath)) {
            $travelData = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        }

        return $travelData;
    }
}
