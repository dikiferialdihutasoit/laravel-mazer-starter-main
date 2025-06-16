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
    public function showResults()
    {
        // Ambil semua data dari tabel 'survey_results'
        // diurutkan dari yang paling baru.
        $results = SurveyResult::orderBy('created_at', 'desc')->get();

        // Kirim data tersebut ke view 'survey.results'
        return view('survey.results', ['results' => $results]);
    }

    /**
     * Menyimpan data dari SATU KATEGORI (beberapa form sekaligus).
     */
    public function storeCategory(Request $request)
    {
        // 1. Validasi data yang masuk
        $request->validate([
            'category_id' => 'required|string',
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
        return back()->with('success', 'Data untuk Kategori ' . $request->input('category_id') . ' berhasil disimpan!');
    }

    /**
     * Menyimpan data dari SATU form (metode lama, bisa disimpan sebagai referensi atau dihapus).
     */
    public function store(Request $request)
    {
        // Dibiarkan kosong karena kita fokus pada storeCategory
    }
}