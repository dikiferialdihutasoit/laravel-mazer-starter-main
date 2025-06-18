<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; font-size: 12px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; }
        .page-break { page-break-after: always; }
        .summary-card { border: 1px solid #eee; padding: 15px; margin-top: 20px; }
        .survey-card { margin-bottom: 20px; }
        img { max-width: 200px; max-height: 200px; display: block; margin-top: 10px; }
    </style>
</head>
<body>
    {{-- BAGIAN 1: HEADER --}}
    <h1>{{ $title }}</h1>
    <h3>{{ $period }}</h3>
    <p>Tanggal Cetak: {{ date('d F Y') }}</p>

    <hr>

    {{-- BAGIAN 2: RINGKASAN EKSEKUTIF --}}
    <div class="summary-card">
        <h2>Ringkasan Eksekutif</h2>
        <p><strong>Total Survei Disimpan:</strong> {{ $totalSurveys }}</p>
        <p><strong>Total Skor Keseluruhan:</strong> {{ $grandTotalScore }}</p>
    </div>

    <hr>

    {{-- BAGIAN 3: RINCIAN HASIL --}}
    <h2>Rincian Hasil Survei</h2>

    @forelse ($results as $result)
        <div class="survey-card">
            <h4>Formulir #{{ $result->form_id }}: Disimpan pada {{ $result->created_at->format('d M Y, H:i') }}</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 70%;">Poin Penilaian</th>
                        <th style="width: 30%;">Skor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result->scores as $index => $score)
                        <tr>
                            <td>Poin Penilaian #{{ $index + 1 }}</td>
                            <td>{{ $score }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total Skor</th>
                        <th>{{ array_sum($result->scores) }}</th>
                    </tr>
                </tfoot>
            </table>
            <p><strong>Catatan:</strong><br>{{ $result->notes ?: 'Tidak ada catatan.' }}</p>

            @if ($result->image_path)
                <p><strong>Bukti Gambar:</strong></p>
                {{-- Menggunakan public_path() agar domPDF bisa menemukan file gambar --}}
                <img src="{{ public_path('storage/' . $result->image_path) }}" alt="Bukti Gambar">
            @endif
        </div>
        @if (!$loop->last)
            <div class="page-break"></div>
        @endif
    @empty
        <p>Tidak ada data yang ditemukan untuk periode yang dipilih.</p>
    @endforelse

</body>
</html>