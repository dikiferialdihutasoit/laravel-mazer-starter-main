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
    public function getChartData(Request $request)
    {
        // Ambil tipe filter dari request, default-nya adalah 'monthly'
        $filterType = $request->input('filter', 'monthly');

        $results = SurveyResult::orderBy('created_at')->get();

        // Tentukan format tanggal berdasarkan tipe filter
        $dateFormat = ($filterType === 'daily') ? 'Y-m-d' : 'Y-m';

        $data = $results->groupBy(function($item) use ($dateFormat) {
            // Kelompokkan data berdasarkan format tanggal yang dipilih
            return $item->created_at->format($dateFormat);
        })->map(function ($group) {
            // Untuk setiap grup (harian/bulanan), jumlahkan semua skornya
            $totalScoreInGroup = 0;
            foreach($group as $result) {
                $totalScoreInGroup += array_sum($result->scores);
            }
            return $totalScoreInGroup;
        });
        
        // Urutkan berdasarkan kunci (tanggal) untuk memastikan urutan kronologis
        $sortedData = $data->sortKeys();

        // Format label agar lebih mudah dibaca di grafik
        $labels = $sortedData->keys()->map(function($dateString) use ($filterType) {
            if ($filterType === 'daily') {
                return Carbon::createFromFormat('Y-m-d', $dateString)->format('d M Y'); // Format: 20 Jun 2025
            }
            return Carbon::createFromFormat('Y-m', $dateString)->format('F Y'); // Format: Juni 2025
        });

        // Kirim data dalam format yang siap digunakan oleh Chart.js
        return response()->json([
            'labels' => $labels,
            'data' => $sortedData->values(),
        ]);
    }
}