<x-app-layout>
    <x-slot:title>
        Form Penilaian
    </x-slot>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Penilaian Berkelompok</h3>
                <p class="text-subtitle text-muted">Gunakan kategori untuk mengelompokkan form.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Penilaian</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- Notifikasi Sukses dan Error --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops! Terjadi kesalahan validasi:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section id="form-kategori">
        {{-- >>> FORM BESAR DIMULAI DI SINI <<< --}}
        <form method="POST" action="{{ route('survey.store.category') }}" enctype="multipart/form-data">
            @csrf

            <div class="accordion" id="accordionKategori">

                {{-- ITEM ACCORDION UNTUK KATEGORI PERTAMA --}}
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingKategori1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKategori1" aria-expanded="true" aria-controls="collapseKategori1">
                            Kategori A: Penilaian Kinerja Tim (2 Formulir)
                        </button>
                    </h2>
                    <div id="collapseKategori1" class="accordion-collapse collapse show" aria-labelledby="headingKategori1" data-bs-parent="#accordionKategori">
                        <div class="accordion-body">
                            {{-- FORM 1 --}}
                            <div class="card form-penilaian-card mb-3">
                                <div class="card-header"><h4 class="card-title">1. Pembangunan Komitmen Tim</h4></div>
                                <div class="card-body">
                                    <div class="form-body"><div class="row">
                                        <input type="hidden" name="results[1][form_id]" value="1">
                                        <div class="col-12"><div class="form-group"><label>1. Penetapan tujuan</label><input type="number" name="results[1][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                                        <div class="col-12"><div class="form-group"><label>2. Komunikasi efektif</label><input type="number" name="results[1][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                                        <div class="col-12"><div class="form-group"><label for="catatan-1">Catatan</label><textarea class="form-control" id="catatan-1" name="results[1][notes]" rows="3"></textarea></div></div>
                                        <div class="col-12"><div class="form-group"><label for="gambar-1">Upload Gambar</label><input type="file" class="form-control image-upload-input" id="gambar-1" name="results[1][image]" accept="image/*"></div><img src="" alt="Preview" class="img-fluid rounded mt-2 image-preview" style="display: none;"></div>
                                        <div class="col-12 d-flex justify-content-between align-items-center">
                                            <h4 class="m-0">Total Nilai: <span class="total-score-display">0</span></h4>
                                            <button type="reset" class="btn btn-light-secondary">Reset Form Ini</button>
                                        </div>
                                    </div></div>
                                </div>
                            </div>

                            {{-- FORM 2 --}}
                            <div class="card form-penilaian-card mb-3">
                                <div class="card-header"><h4 class="card-title">2. Aspek Kolaborasi</h4></div>
                                <div class="card-body">
                                    <div class="form-body"><div class="row">
                                        <input type="hidden" name="results[2][form_id]" value="2">
                                        <div class="col-12"><div class="form-group"><label>1. Kemampuan bekerja sama</label><input type="number" name="results[2][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                                        <div class="col-12"><div class="form-group"><label>2. Keterbukaan terhadap ide</label><input type="number" name="results[2][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                                        <div class="col-12"><div class="form-group"><label for="catatan-2">Catatan</label><textarea class="form-control" id="catatan-2" name="results[2][notes]" rows="3"></textarea></div></div>
                                        <div class="col-12"><div class="form-group"><label for="gambar-2">Upload Gambar</label><input type="file" class="form-control image-upload-input" id="gambar-2" name="results[2][image]" accept="image/*"></div><img src="" alt="Preview" class="img-fluid rounded mt-2 image-preview" style="display: none;"></div>
                                        <div class="col-12 d-flex justify-content-between align-items-center">
                                            <h4 class="m-0">Total Nilai: <span class="total-score-display">0</span></h4>
                                            <button type="reset" class="btn btn-light-secondary">Reset Form Ini</button>
                                        </div>
                                    </div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- ITEM ACCORDION UNTUK KATEGORI KEDUA --}}
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingKategori2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKategori2" aria-expanded="false" aria-controls="collapseKategori2">
                            Kategori B: Penilaian Lanjutan
                        </button>
                    </h2>
                    <div id="collapseKategori2" class="accordion-collapse collapse" aria-labelledby="headingKategori2" data-bs-parent="#accordionKategori">
                        <div class="accordion-body">
                           <p>Tempat untuk form-form di Kategori B.</p>
                        </div>
                    </div>
                </div> {{-- <<< DIV PENUTUP YANG HILANG SEBELUMNYA ADA DI SINI --}}

            </div> {{-- Penutup untuk .accordion --}}

            {{-- TOMBOL SIMPAN SEMUA --}}
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg">Simpan Semua Formulir</button>
            </div>

        </form> {{-- Penutup untuk form besar --}}
    </section>

{{-- SCRIPT LENGKAP DAN BENAR --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.form-penilaian-card').forEach(card => {
            const scoreInputs = card.querySelectorAll('.score-input');
            const totalScoreElement = card.querySelector('.total-score-display');
            const imageInput = card.querySelector('.image-upload-input');
            const imagePreview = card.querySelector('.image-preview');
            const resetButton = card.querySelector('button[type="reset"]');

            function calculateTotal() {
                let total = 0;
                scoreInputs.forEach(input => {
                    const value = parseInt(input.value) || 0;
                    if (value > 5) input.value = 5;
                    else if (value < 0) input.value = 0;
                    total += parseInt(input.value) || 0;
                });
                if(totalScoreElement) {
                    totalScoreElement.innerText = total;
                }
            }

            scoreInputs.forEach(input => {
                input.addEventListener('input', calculateTotal);
            });

            if (imageInput && imagePreview) {
                imageInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        imagePreview.src = URL.createObjectURL(file);
                        imagePreview.style.display = 'block';
                    }
                });
            }
            
            if(resetButton) {
                resetButton.addEventListener('click', function(e) {
                    e.preventDefault(); 
                    card.querySelectorAll('input[type="number"], textarea').forEach(input => input.value = '');
                    if (imageInput) imageInput.value = null;
                    if (imagePreview) {
                        imagePreview.src = '';
                        imagePreview.style.display = 'none';
                    }
                    calculateTotal();
                });
            }
            calculateTotal();
        });
    });
</script>

</x-app-layout>