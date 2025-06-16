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

    {{-- Notifikasi Sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    {{-- Notifikasi Error Validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section id="form-kategori">
        <div class="accordion" id="accordionKategori">

{{-- ITEM ACCORDION UNTUK KATEGORI PERTAMA --}}
<div class="accordion-item">
    <h2 class="accordion-header" id="headingKategori1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKategori1" aria-expanded="true" aria-controls="collapseKategori1">
            Kategori A: Penilaian Kinerja Tim
        </button>
    </h2>
    <div id="collapseKategori1" class="accordion-collapse collapse show" aria-labelledby="headingKategori1" data-bs-parent="#accordionKategori">
        <div class="accordion-body">
            
            {{-- >>> FORM BESAR UNTUK KATEGORI INI DIMULAI DI SINI <<< --}}
            <form method="POST" action="{{ route('survey.store.category') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="category_id" value="A">

                {{-- FORM 1 (Card) --}}
                <div class="card form-penilaian-card mb-3">
                    <div class="card-header"><h4 class="card-title">1. Pembangunan Komitmen Tim</h4></div>
                    <div class="card-body">
                        {{-- Hapus tag <form> dari sini. Hanya isinya yang kita butuhkan. --}}
                        <div class="form-body"><div class="row">
                            {{-- Perhatikan atribut name yang baru: results[1][...] --}}
                            <input type="hidden" name="results[1][form_id]" value="1">
                            <div class="col-12"><div class="form-group"><label>1. Penetapan tujuan</label><input type="number" name="results[1][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                            <div class="col-12"><div class="form-group"><label>2. Komunikasi efektif</label><input type="number" name="results[1][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                            <div class="col-12"><div class="form-group"><label for="catatan-1">Catatan</label><textarea class="form-control" id="catatan-1" name="results[1][notes]" rows="3"></textarea></div></div>
                            <div class="col-12"><div class="form-group"><label for="gambar-1">Upload Gambar</label><input type="file" class="form-control image-upload-input" id="gambar-1" name="results[1][image]" accept="image/*"></div><img src="" alt="Preview" class="img-fluid rounded mt-2 image-preview" style="display: none;"></div>
                            <div class="col-12 d-flex justify-content-between">
                                <h4 class="mt-3">Total Nilai: <span class="total-score-display">0</span></h4>
                                {{-- Tombol reset ini hanya untuk card ini --}}
                                <button type="reset" class="btn btn-light-secondary mt-3">Reset Form Ini</button>
                            </div>
                        </div></div>
                    </div>
                </div>

                {{-- FORM 2 (Card) --}}
                <div class="card form-penilaian-card mb-3">
                    <div class="card-header"><h4 class="card-title">2. Aspek Kolaborasi</h4></div>
                    <div class="card-body">
                        <div class="form-body"><div class="row">
                            <input type="hidden" name="results[2][form_id]" value="2">
                            <div class="col-12"><div class="form-group"><label>1. Kemampuan bekerja sama</label><input type="number" name="results[2][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                            <div class="col-12"><div class="form-group"><label>2. Keterbukaan terhadap ide</label><input type="number" name="results[2][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                            <div class="col-12"><div class="form-group"><label for="catatan-2">Catatan</label><textarea class="form-control" id="catatan-2" name="results[2][notes]" rows="3"></textarea></div></div>
                            <div class="col-12"><div class="form-group"><label for="gambar-2">Upload Gambar</label><input type="file" class="form-control image-upload-input" id="gambar-2" name="results[2][image]" accept="image/*"></div><img src="" alt="Preview" class="img-fluid rounded mt-2 image-preview" style="display: none;"></div>
                            <div class="col-12 d-flex justify-content-between">
                                <h4 class="mt-3">Total Nilai: <span class="total-score-display">0</span></h4>
                                <button type="reset" class="btn btn-light-secondary mt-3">Reset Form Ini</button>
                            </div>
                        </div></div>
                    </div>
                </div>
                
                {{-- >>> TOMBOL SIMPAN UNTUK KATEGORI INI <<< --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-lg">Simpan Semua di Kategori A</button>
                </div>

            </form>
            {{-- >>> FORM BESAR BERAKHIR DI SINI <<< --}}
        </div>
    </div>
</div>
            
{{-- ITEM ACCORDION UNTUK KATEGORI KEDUA --}}
<div class="accordion-item">
    <h2 class="accordion-header" id="headingKategori2">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKategori2" aria-expanded="true" aria-controls="collapseKategori2">
            Kategori B: Penilaian Kinerja Tim
        </button>
    </h2>
    <div id="collapseKategori2" class="accordion-collapse collapse show" aria-labelledby="headingKategori2" data-bs-parent="#accordionKategori">
        <div class="accordion-body">
            
            {{-- >>> FORM BESAR UNTUK KATEGORI INI DIMULAI DI SINI <<< --}}
            <form method="POST" action="{{ route('survey.store.category') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="category_id" value="B">

                {{-- FORM 1 (Card) --}}
                <div class="card form-penilaian-card mb-3">
                    <div class="card-header"><h4 class="card-title">1. Pembangunan Komitmen Tim</h4></div>
                    <div class="card-body">
                        {{-- Hapus tag <form> dari sini. Hanya isinya yang kita butuhkan. --}}
                        <div class="form-body"><div class="row">
                            {{-- Perhatikan atribut name yang baru: results[1][...] --}}
                            <input type="hidden" name="results[1][form_id]" value="1">
                            <div class="col-12"><div class="form-group"><label>1. Penetapan tujuan</label><input type="number" name="results[1][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                            <div class="col-12"><div class="form-group"><label>2. Komunikasi efektif</label><input type="number" name="results[1][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                            <div class="col-12"><div class="form-group"><label for="catatan-1">Catatan</label><textarea class="form-control" id="catatan-1" name="results[1][notes]" rows="3"></textarea></div></div>
                            <div class="col-12"><div class="form-group"><label for="gambar-1">Upload Gambar</label><input type="file" class="form-control image-upload-input" id="gambar-1" name="results[1][image]" accept="image/*"></div><img src="" alt="Preview" class="img-fluid rounded mt-2 image-preview" style="display: none;"></div>
                            <div class="col-12 d-flex justify-content-between">
                                <h4 class="mt-3">Total Nilai: <span class="total-score-display">0</span></h4>
                                {{-- Tombol reset ini hanya untuk card ini --}}
                                <button type="reset" class="btn btn-light-secondary mt-3">Reset Form Ini</button>
                            </div>
                        </div></div>
                    </div>
                </div>

                {{-- FORM 2 (Card) --}}
                <div class="card form-penilaian-card mb-3">
                    <div class="card-header"><h4 class="card-title">2. Aspek Kolaborasi</h4></div>
                    <div class="card-body">
                        <div class="form-body"><div class="row">
                            <input type="hidden" name="results[2][form_id]" value="2">
                            <div class="col-12"><div class="form-group"><label>1. Kemampuan bekerja sama</label><input type="number" name="results[2][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                            <div class="col-12"><div class="form-group"><label>2. Keterbukaan terhadap ide</label><input type="number" name="results[2][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                            <div class="col-12"><div class="form-group"><label for="catatan-2">Catatan</label><textarea class="form-control" id="catatan-2" name="results[2][notes]" rows="3"></textarea></div></div>
                            <div class="col-12"><div class="form-group"><label for="gambar-2">Upload Gambar</label><input type="file" class="form-control image-upload-input" id="gambar-2" name="results[2][image]" accept="image/*"></div><img src="" alt="Preview" class="img-fluid rounded mt-2 image-preview" style="display: none;"></div>
                            <div class="col-12 d-flex justify-content-between">
                                <h4 class="mt-3">Total Nilai: <span class="total-score-display">0</span></h4>
                                <button type="reset" class="btn btn-light-secondary mt-3">Reset Form Ini</button>
                            </div>
                        </div></div>
                    </div>
                </div>
                
                {{-- >>> TOMBOL SIMPAN UNTUK KATEGORI INI <<< --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-lg">Simpan Semua di Kategori B</button>
                </div>

            </form>
            {{-- >>> FORM BESAR BERAKHIR DI SINI <<< --}}
        </div>
    </div>
</div>

    <section class="section mt-4">
        <div class="card bg-primary">
            <div class="card-body"><div class="row">
                    <div class="col-md-8"><h4 class="text-white">Rekapitulasi Nilai Keseluruhan</h4><p class="text-white">Jumlah total nilai dari semua formulir yang telah diisi.</p></div>
                    <div class="col-md-4 d-flex align-items-center justify-content-end"><h1 class="text-white fw-bold"><span id="grand-total-display">0</span></h1></div>
            </div></div>
        </div>
    </section>

</div>

{{-- HANYA SATU BLOK SCRIPT YANG BENAR --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // Fungsi untuk menghitung Grand Total
        function updateGrandTotal() {
            let grandTotal = 0;
            const allTotalDisplays = document.querySelectorAll('.total-score-display');
            allTotalDisplays.forEach(display => {
                grandTotal += parseInt(display.innerText) || 0;
            });
            document.getElementById('grand-total-display').innerText = grandTotal;
        }

        // Logika untuk setiap kartu form
        const formCards = document.querySelectorAll('.form-penilaian-card');
        formCards.forEach(card => {
            const scoreInputs = card.querySelectorAll('.score-input');
            const totalScoreElement = card.querySelector('.total-score-display');
            const imageInput = card.querySelector('.image-upload-input');
            const imagePreview = card.querySelector('.image-preview');
            const resetButton = card.querySelector('button[type="reset"]');

            // Fungsi untuk kalkulasi total per form
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
                updateGrandTotal(); // Panggil grand total setiap ada perubahan
            }

            // Event listener untuk input skor
            scoreInputs.forEach(input => {
                input.addEventListener('input', calculateTotal);
            });

            // Event listener untuk preview gambar
            if (imageInput && imagePreview) {
                imageInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        imagePreview.src = URL.createObjectURL(file);
                        imagePreview.style.display = 'block';
                    }
                });
            }
            
            // Event listener untuk tombol reset
            if(resetButton) {
                resetButton.addEventListener('click', function(e) {
                    // Mencegah form besar untuk me-reset semua
                    e.preventDefault(); 
                    
                    // Reset semua input di dalam card ini
                    card.querySelectorAll('input[type="number"], textarea').forEach(input => {
                        input.value = '';
                    });
                    
                    // Reset input file dan preview
                    if (imageInput) imageInput.value = null;
                    if (imagePreview) {
                        imagePreview.src = '';
                        imagePreview.style.display = 'none';
                    }
                    
                    // Hitung ulang total untuk card ini saja
                    calculateTotal();
                });
            }

            calculateTotal(); // Panggil saat awal
        });

        // Event listener untuk tombol reset di dalam form kategori (jika ada)
        const categoryForms = document.querySelectorAll('form');
        categoryForms.forEach(form => {
            const resetButton = form.querySelector('button[type="reset"]');
            if(resetButton && !resetButton.closest('.form-penilaian-card')) { // Hanya untuk tombol reset di luar card
                 resetButton.addEventListener('click', function(e) {
                    setTimeout(() => {
                        form.querySelectorAll('.score-input').forEach(input => {
                            const card = input.closest('.form-penilaian-card');
                            if(card) {
                                // Re-calculate total for each card inside this form category
                                const totalScoreElement = card.querySelector('.total-score-display');
                                let total = 0;
                                card.querySelectorAll('.score-input').forEach(inp => {
                                    total += parseInt(inp.value) || 0;
                                })
                                totalScoreElement.innerText = total;
                            }
                        });
                        updateGrandTotal();
                    }, 0);
                });
            }
        });
    });
</script>

</x-app-layout>