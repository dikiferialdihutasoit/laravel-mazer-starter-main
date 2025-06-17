<x-app-layout>
    <x-slot:title>
        Hasil Survei
    </x-slot>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Hasil Survei</h3>
                <p class="text-subtitle text-muted">Semua data yang telah disimpan, dikelompokkan per tanggal.</p>
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

    {{-- >>> TAMBAHKAN KARTU BARU INI <<< --}}
<section class="section">
    <div class="card bg-primary text-white">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="text-white">Rekapitulasi Nilai Keseluruhan</h4>
                    <p>Jumlah total skor dari semua survei yang pernah disimpan.</p>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-end">
                    {{-- Tampilkan variabel $grandTotal dari Controller --}}
                    <h1 class="text-white fw-bold">{{ $grandTotal }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- >>> AKHIR KARTU BARU <<< --}}

    <section class="section">
        <div class="accordion" id="accordionHasilSurvei">

            {{-- Looping Pertama: Untuk setiap TANGGAL --}}
            @forelse ($groupedResults as $tanggal => $results)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-{{ Str::slug($tanggal) }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ Str::slug($tanggal) }}" aria-expanded="false" aria-controls="collapse-{{ Str::slug($tanggal) }}">
                            Hasil Audit untuk Tanggal: {{ $tanggal }} ({{ count($results) }} data)
                        </button>
                    </h2>
                    <div id="collapse-{{ Str::slug($tanggal) }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ Str::slug($tanggal) }}" data-bs-parent="#accordionHasilSurvei">
                        <div class="accordion-body">
                            
                            {{-- Looping Kedua: Untuk setiap HASIL SURVEI pada tanggal tersebut --}}
                            @foreach ($results as $result)
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
            @empty
                <div class="alert alert-secondary">
                    <p class="mb-0">Belum ada data survei yang disimpan.</p>
                </div>
            @endforelse

        </div>
    </section>

</div>
</x-app-layout>