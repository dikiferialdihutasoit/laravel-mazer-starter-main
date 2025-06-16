<x-app-layout>
    <x-slot:title>
        Hasil Survei
    </x-slot>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Hasil Survei</h3>
                <p class="text-subtitle text-muted">Semua data yang telah berhasil disimpan.</p>
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

    <section class="section">
        {{-- Looping untuk setiap data hasil yang dikirim dari controller --}}
        @forelse ($results as $result)
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data untuk Formulir #{{ $result->form_id }}</h4>
                    <span class="text-muted">Disimpan pada: {{ $result->created_at->format('d F Y, H:i') }}</span>
                </div>
                <div class="card-body">
                    <h5>Skor Penilaian:</h5>
                    <ul>
                        {{-- Karena 'scores' adalah array, kita bisa looping isinya --}}
                        @foreach ($result->scores as $index => $score)
                            <li>Poin Penilaian #{{ $index + 1 }}: <strong>{{ $score }}</strong></li>
                        @endforeach
                    </ul>

                    <h5>Catatan:</h5>
                    <p>{{ $result->notes ?: 'Tidak ada catatan.' }}</p>

                    @if ($result->image_path)
                        <h5>Bukti Gambar:</h5>
                        {{-- Pastikan Anda sudah menjalankan "php artisan storage:link" --}}
                        <img src="{{ asset('storage/' . $result->image_path) }}" alt="Bukti Gambar" class="img-fluid rounded" style="max-height: 250px;">
                    @endif
                </div>
            </div>
        @empty
            <div class="alert alert-secondary">
                <p>Belum ada data survei yang disimpan.</p>
            </div>
        @endforelse
    </section>

</div>
</x-app-layout>