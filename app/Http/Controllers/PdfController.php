<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurveyResult;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon; // <-- TAMBAHKAN 'use' STATEMENT INI

class PdfController extends Controller
{
    public function exportSurveyResults(Request $request)
    {
        // 1. Validasi input tanggal
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        // 2. Ambil dan format tanggal menggunakan Carbon
        $startDate = Carbon::parse($request->start_date)->startOfDay(); // Contoh: 2025-06-18 00:00:00
        $endDate   = Carbon::parse($request->end_date)->endOfDay();     // Contoh: 2025-06-18 23:59:59

        // 3. Ambil data dari database berdasarkan rentang tanggal yang sudah diformat
        $results = SurveyResult::whereBetween('created_at', [$startDate, $endDate])->get();

        // 4. Siapkan data untuk ringkasan eksekutif
        $totalSurveys = $results->count();
        $grandTotalScore = $results->sum(function($result) {
            return array_sum($result->scores);
        });

        // 5. Gabungkan semua data yang akan dikirim ke view PDF
        $data = [
            'title'           => 'Laporan Hasil Survei',
            'period'          => "Periode: " . $startDate->format('d M Y') . " - " . $endDate->format('d M Y'),
            'results'         => $results,
            'totalSurveys'    => $totalSurveys,
            'grandTotalScore' => $grandTotalScore
        ];
        
        // 6. Buat PDF dari view 'pdf.report' dan kirim datanya
        $pdf = PDF::loadView('pdf.report', $data);
        
        // 7. Tampilkan PDF di browser
        return $pdf->stream('laporan-survei.pdf');
    }
}