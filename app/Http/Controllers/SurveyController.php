<?php

namespace App\Http\Controllers;

use App\Models\SurveyResult;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SurveyController extends Controller
{
    public function index()
    {
        return view('survey.form');
    }

    public function showResults()
    {
        $allResults = SurveyResult::orderBy('created_at', 'desc')->get();

        $groupedData = $allResults->groupBy(function($item) {
            return $item->created_at->format('d F Y');
        })->map(function ($dailySurveys) {
            $dailyTotalScore = $dailySurveys->sum(function($survey) {
                return array_sum($survey->scores);
            });

            return (object)[
                'surveys'     => $dailySurveys,
                'count'       => $dailySurveys->count(),
                'total_score' => $dailyTotalScore,
            ];
        });

        return view('survey.results', ['groupedData' => $groupedData]);
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'results' => 'required|array'
        ]);

        $allFormData = $request->input('results');
        $allFiles = $request->file('results');

        foreach ($allFormData as $formId => $formData) {
            // Lompati jika entri tidak memiliki skor (data tidak lengkap)
            if (!isset($formData['scores'])) {
                continue;
            }

            $imagePath = null;
            if (isset($allFiles[$formId]['image'])) {
                $imagePath = $allFiles[$formId]['image']->store('survey_images', 'public');
            }

            // Gunakan 'form_id' yang dikirim dari form
            SurveyResult::updateOrCreate(
                ['form_id' => $formData['form_id']],
                [
                    'scores' => $formData['scores'],
                    'notes' => $formData['notes'] ?? null,
                    'image_path' => $imagePath,
                ]
            );
        }

        return back()->with('success', 'Semua data survei berhasil disimpan!');
    }
}