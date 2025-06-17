<?php

namespace App\Http\Controllers;

use App\Models\SurveyResult;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman utama dashboard.
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Menyediakan data untuk grafik di dashboard dalam format JSON.
     */
    public function getChartData()
    {
        // Ambil semua hasil survei
        $results = SurveyResult::orderBy('created_at')->get();

        // Olah data untuk mendapatkan total skor per bulan
        $monthlyTotals = $results->groupBy(function($item) {
            // Kelompokkan data berdasarkan Bulan dan Tahun (misal: "Juni 2025")
            return $item->created_at->format('F Y');
        })->map(function ($group) {
            // Untuk setiap grup (bulan), jumlahkan semua skornya
            $totalScoreInMonth = 0;
            foreach($group as $result) {
                $totalScoreInMonth += array_sum($result->scores);
            }
            return $totalScoreInMonth;
        });
        
        // Kirim data dalam format yang siap digunakan oleh Chart.js
        return response()->json([
            'labels' => $monthlyTotals->keys(), // Nama-nama bulan (misal: ["Juni 2025", "Juli 2025"])
            'data' => $monthlyTotals->values(),  // Total skor per bulan (misal: [150, 230])
        ]);
    }
}