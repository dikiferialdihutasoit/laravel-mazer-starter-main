<?php

namespace App\Http\Controllers;

use App\Models\SurveyResult;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Menampilkan halaman form survei.
     */
    public function index()
    {
        return view('survey.form');
    }

    /**
     * Menampilkan semua hasil survei yang sudah disimpan.
     */
// app/Http/Controllers/SurveyController.php

// app/Http/Controllers/SurveyController.php

// app/Http/Controllers/SurveyController.php

public function showResults()
{
    // 1. Ambil semua data dari database
    $allResults = SurveyResult::orderBy('created_at', 'desc')->get();

    // 2. Hitung Grand Total dari semua data yang diambil
    $grandTotal = 0;
    foreach ($allResults as $result) {
        // array_sum akan menjumlahkan semua angka di dalam array 'scores'
        $grandTotal += array_sum($result->scores);
    }

    // 3. Kelompokkan hasil berdasarkan tanggal untuk tampilan accordion
    $groupedResults = $allResults->groupBy(function($item) {
        return $item->created_at->format('d F Y');
    });

    // 4. Kirim SEMUA data yang dibutuhkan (groupedResults DAN grandTotal) ke view
    return view('survey.results', [
        'groupedResults' => $groupedResults,
        'grandTotal' => $grandTotal
    ]);
}
    public function storeCategory(Request $request)
    {
        // 1. Validasi data yang masuk
        $request->validate([
            'results' => 'required|array'
        ]);

        $results = $request->input('results');
        $files = $request->file('results');

        // 2. Looping untuk setiap form yang dikirim
        foreach ($results as $formId => $data) {
            $imagePath = null;
            // Proses upload gambar untuk form spesifik ini
            if (isset($files[$formId]['image'])) {
                $imagePath = $files[$formId]['image']->store('survey_images', 'public');
            }

            // 3. Simpan atau perbarui data ke database
            SurveyResult::updateOrCreate(
                ['form_id' => $formId], // Kunci pencarian
                [
                    // Data yang akan disimpan/diperbarui
                    'scores' => $data['scores'],
                    'notes' => $data['notes'] ?? null,
                    'image_path' => $imagePath,
                ]
            );
        }

        // 4. Redirect kembali dengan pesan sukses
        return back()->with('success', 'Semua data survei berhasil disimpan!');
    }

    /**
     * Menyimpan data dari SATU form (metode lama, bisa disimpan sebagai referensi atau dihapus).
     */
    public function store(Request $request)
    {
        // Dibiarkan kosong karena kita fokus pada storeCategory
    }
}