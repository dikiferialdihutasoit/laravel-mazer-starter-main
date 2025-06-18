<x-app-layout>
    <x-slot:title>
        Hasil Survei
    </x-slot>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Hasil Survei</h3>
                <p class="text-subtitle text-muted">Lihat dan export semua data yang telah disimpan.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hasil Survei</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- BAGIAN FORM FILTER DAN EXPORT PDF --}}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Export Laporan PDF</h4>
        </div>
        <div class="card-body">
            {{-- INI BAGIAN YANG DIPERBAIKI: action diisi dengan route yang benar --}}
            <form action="{{ route('survey.export.pdf') }}" method="GET" class="row g-3 align-items-center" target="_blank">
                <div class="col-md-5">
                    <label for="start_date" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="col-md-5">
                    <label for="end_date" class="form-label">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="bi bi-file-earmark-pdf-fill"></i> Export
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- BAGIAN ACCORDION UNTUK MENAMPILKAN HASIL SURVEI --}}
    <section class="section mt-4">
        <div class="accordion" id="accordionHasilSurvei">

            @if(isset($groupedData) && $groupedData->count() > 0)
                @foreach ($groupedData as $tanggal => $data)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-{{ Str::slug($tanggal) }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ Str::slug($tanggal) }}" aria-expanded="false" aria-controls="collapse-{{ Str::slug($tanggal) }}">
                                {{ $tanggal }} ({{ $data->count }} data, Total Skor: {{ $data->total_score }})
                            </button>
                        </h2>
                        <div id="collapse-{{ Str::slug($tanggal) }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ Str::slug($tanggal) }}" data-bs-parent="#accordionHasilSurvei">
                            <div class="accordion-body">
                                
                                @foreach ($data->surveys as $result)
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Data untuk Formulir #{{ $result->form_id }}</h5>
                                            <small class="text-muted">Disimpan pukul: {{ $result->created_at->format('H:i') }}</small>
                                        </div>
                                        <div class="card-body">
                                            <h6>Skor Penilaian:</h6>
                                            <ul>
                                                @foreach ($result->scores as $index => $score)
                                                    <li>Poin #{{ $index + 1 }}: <strong>{{ $score }}</strong></li>
                                                @endforeach
                                            </ul>

                                            <h6>Catatan:</h6>
                                            <p>{{ $result->notes ?: 'Tidak ada catatan.' }}</p>

                                            @if ($result->image_path)
                                                <h6>Bukti Gambar:</h6>
                                                <a href="{{ asset('storage/' . $result->image_path) }}" target="_blank">
                                                    <img src="{{ asset('storage/' . $result->image_path) }}" alt="Bukti Gambar" class="img-fluid rounded" style="max-height: 150px;">
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-secondary">
                    <p class="mb-0">Belum ada data survei yang disimpan.</p>
                </div>
            @endif

        </div>
    </section>

</div>
</x-app-layout>