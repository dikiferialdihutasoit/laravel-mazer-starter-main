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
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Penilaian</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="form-kategori">
        {{-- AWAL ACCORDION --}}
        <div class="accordion" id="accordionKategori">

            {{-- ITEM ACCORDION UNTUK KATEGORI PERTAMA --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingKategori1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKategori1" aria-expanded="true" aria-controls="collapseKategori1">
                        Kategori A: nilaian Kinerja Tim (4 Formulir)
                    </button>
                </h2>
                <div id="collapseKategori1" class="accordion-collapse collapse show" aria-labelledby="headingKategori1" data-bs-parent="#accordionKategori">
                    <div class="accordion-body">
                        
                        {{-- Badan Accordion: Tempat menaruh 4 form --}}

                        {{-- FORM 1 (di dalam kategori) --}}
                        <div class="card form-penilaian-card mb-3">
                            <div class="card-header">
                                <h4 class="card-title">1. Pembangunan Pemeliharaan Komitmen Tim</h4>
                            </div>
                            <div class="card-body">
                                {{-- Isi form 1... --}}
                                <form class="form form-vertical" onsubmit="return false;"><div class="form-body"><div class="row"><div class="col-12"><div class="form-group"><label>1. Penetapan tujuan yang jelas dan terukur</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>2. Komunikasi yang efektif dalam menyampaikan visi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>3. Pemberian umpan balik yang konstruktif</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>4. Pemberdayaan tim melalui pendelegasian</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>5. Pengakuan dan apresiasi terhadap kontribusi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label for="catatan-1">Catatan atau Komentar (Opsional)</label><textarea class="form-control" id="catatan-1" rows="3"></textarea></div></div><div class="col-12"><h4 class="mt-3">Total Nilai: <span class="total-score-display">0</span></h4></div><div class="col-12 d-flex justify-content-end mt-4"><button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button></div></div></div></form>
                            </div>
                        </div>

                        {{-- FORM 2 (di dalam kategori) --}}
                        <div class="card form-penilaian-card mb-3">
                             <div class="card-header">
                                <h4 class="card-title">2. Aspek Kolaborasi dan Inovasi</h4>
                            </div>
                            <div class="card-body">
                                {{-- Isi form 2... --}}
                                <form class="form form-vertical" onsubmit="return false;"><div class="form-body"><div class="row"><div class="col-12"><div class="form-group"><label>1. Kemampuan bekerja sama dalam tim lintas fungsi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>2. Keterbukaan terhadap ide dan gagasan baru</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>3. Inisiatif dalam mencari solusi kreatif</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>4. Adaptasi terhadap perubahan teknologi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>5. Berbagi pengetahuan dengan rekan kerja</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label for="catatan-2">Catatan atau Komentar (Opsional)</label><textarea class="form-control" id="catatan-2" rows="3"></textarea></div></div><div class="col-12"><h4 class="mt-3">Total Nilai: <span class="total-score-display">0</span></h4></div><div class="col-12 d-flex justify-content-end mt-4"><button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button></div></div></div></form>
                            </div>
                        </div>

                        {{-- FORM 3 (di dalam kategori) --}}
                        <div class="card form-penilaian-card mb-3">
                            <div class="card-header">
                                <h4 class="card-title">3. Testing</h4>
                            </div>
                             <div class="card-body">
                                {{-- Isi form 3... --}}
                                <form class="form form-vertical" onsubmit="return false;"><div class="form-body"><div class="row"><div class="col-12"><div class="form-group"><label>1. Kemampuan bekerja sama dalam tim lintas fungsi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>2. Keterbukaan terhadap ide dan gagasan baru</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>3. Inisiatif dalam mencari solusi kreatif</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>4. Adaptasi terhadap perubahan teknologi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>5. Berbagi pengetahuan dengan rekan kerja</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label for="catatan-3">Catatan atau Komentar (Opsional)</label><textarea class="form-control" id="catatan-3" rows="3"></textarea></div></div><div class="col-12"><h4 class="mt-3">Total Nilai: <span class="total-score-display">0</span></h4></div><div class="col-12 d-flex justify-content-end mt-4"><button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button></div></div></div></form>
                            </div>
                        </div>

                        {{-- FORM 4 (di dalam kategori) --}}
                        <div class="card form-penilaian-card mb-3">
                            <div class="card-header">
                                <h4 class="card-title">4. Test</h4>
                            </div>
                            <div class="card-body">
                                {{-- Isi form 4... --}}
                                <form class="form form-vertical" onsubmit="return false;"><div class="form-body"><div class="row"><div class="col-12"><div class="form-group"><label>1. Kemampuan bekerja sama dalam tim lintas fungsi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>2. Keterbukaan terhadap ide dan gagasan baru</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>3. Inisiatif dalam mencari solusi kreatif</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>4. Adaptasi terhadap perubahan teknologi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>5. Berbagi pengetahuan dengan rekan kerja</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label for="catatan-4">Catatan atau Komentar (Opsional)</label><textarea class="form-control" id="catatan-4" rows="3"></textarea></div></div><div class="col-12"><h4 class="mt-3">Total Nilai: <span class="total-score-display">0</span></h4></div><div class="col-12 d-flex justify-content-end mt-4"><button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button></div></div></div></form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Anda bisa menambahkan KATEGORI LAIN di sini dengan menyalin <div class="accordion-item"> ... </div> --}}
{{-- ITEM ACCORDION UNTUK KATEGORI PERTAMA --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingKategori1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKategori2" aria-expanded="true" aria-controls="collapseKategori2">
                        Kategori A: Penilaian Kinerja Tim (4 Formulir)
                    </button>
                </h2>
                <div id="collapseKategori2" class="accordion-collapse collapse show" aria-labelledby="headingKategori2" data-bs-parent="#accordionKategori">
                    <div class="accordion-body">
                        
                        {{-- Badan Accordion: Tempat menaruh 4 form --}}

                        {{-- FORM 1 (di dalam kategori) --}}
                        <div class="card form-penilaian-card mb-3">
                            <div class="card-header">
                                <h4 class="card-title">1. Pembangunan dan Pemeliharaan Komitmen Tim</h4>
                            </div>
                            <div class="card-body">
                                {{-- Isi form 1... --}}
                                <form class="form form-vertical" onsubmit="return false;"><div class="form-body"><div class="row"><div class="col-12"><div class="form-group"><label>1. Penetapan tujuan yang jelas dan terukur</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>2. Komunikasi yang efektif dalam menyampaikan visi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>3. Pemberian umpan balik yang konstruktif</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>4. Pemberdayaan tim melalui pendelegasian</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>5. Pengakuan dan apresiasi terhadap kontribusi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label for="catatan-1">Catatan atau Komentar (Opsional)</label><textarea class="form-control" id="catatan-1" rows="3"></textarea></div></div><div class="col-12"><h4 class="mt-3">Total Nilai: <span class="total-score-display">0</span></h4></div><div class="col-12 d-flex justify-content-end mt-4"><button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button></div></div></div></form>
                            </div>
                        </div>

                        {{-- FORM 2 (di dalam kategori) --}}
                        <div class="card form-penilaian-card mb-3">
                             <div class="card-header">
                                <h4 class="card-title">2. Aspek Kolaborasi dan Inovasi</h4>
                            </div>
                            <div class="card-body">
                                {{-- Isi form 2... --}}
                                <form class="form form-vertical" onsubmit="return false;"><div class="form-body"><div class="row"><div class="col-12"><div class="form-group"><label>1. Kemampuan bekerja sama dalam tim lintas fungsi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>2. Keterbukaan terhadap ide dan gagasan baru</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>3. Inisiatif dalam mencari solusi kreatif</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>4. Adaptasi terhadap perubahan teknologi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>5. Berbagi pengetahuan dengan rekan kerja</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label for="catatan-2">Catatan atau Komentar (Opsional)</label><textarea class="form-control" id="catatan-2" rows="3"></textarea></div></div><div class="col-12"><h4 class="mt-3">Total Nilai: <span class="total-score-display">0</span></h4></div><div class="col-12 d-flex justify-content-end mt-4"><button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button></div></div></div></form>
                            </div>
                        </div>

                        {{-- FORM 3 (di dalam kategori) --}}
                        <div class="card form-penilaian-card mb-3">
                            <div class="card-header">
                                <h4 class="card-title">3. Testing</h4>
                            </div>
                             <div class="card-body">
                                {{-- Isi form 3... --}}
                                <form class="form form-vertical" onsubmit="return false;"><div class="form-body"><div class="row"><div class="col-12"><div class="form-group"><label>1. Kemampuan bekerja sama dalam tim lintas fungsi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>2. Keterbukaan terhadap ide dan gagasan baru</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>3. Inisiatif dalam mencari solusi kreatif</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>4. Adaptasi terhadap perubahan teknologi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>5. Berbagi pengetahuan dengan rekan kerja</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label for="catatan-3">Catatan atau Komentar (Opsional)</label><textarea class="form-control" id="catatan-3" rows="3"></textarea></div></div><div class="col-12"><h4 class="mt-3">Total Nilai: <span class="total-score-display">0</span></h4></div><div class="col-12 d-flex justify-content-end mt-4"><button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button></div></div></div></form>
                            </div>
                        </div>

                        {{-- FORM 4 (di dalam kategori) --}}
                        <div class="card form-penilaian-card mb-3">
                            <div class="card-header">
                                <h4 class="card-title">4. Test</h4>
                            </div>
                            <div class="card-body">
                                {{-- Isi form 4... --}}
                                <form class="form form-vertical" onsubmit="return false;"><div class="form-body"><div class="row"><div class="col-12"><div class="form-group"><label>1. Kemampuan bekerja sama dalam tim lintas fungsi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>2. Keterbukaan terhadap ide dan gagasan baru</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>3. Inisiatif dalam mencari solusi kreatif</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>4. Adaptasi terhadap perubahan teknologi</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label>5. Berbagi pengetahuan dengan rekan kerja</label><input type="number" class="form-control score-input" placeholder="Nilai (0-5)" min="0" max="5"></div></div><div class="col-12"><div class="form-group"><label for="catatan-4">Catatan atau Komentar (Opsional)</label><textarea class="form-control" id="catatan-4" rows="3"></textarea></div></div><div class="col-12"><h4 class="mt-3">Total Nilai: <span class="total-score-display">0</span></h4></div><div class="col-12 d-flex justify-content-end mt-4"><button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button></div></div></div></form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
        {{-- AKHIR ACCORDION --}}
    </section>

    {{-- =================================================================== --}}
    {{-- BAGIAN BARU: KARTU GRAND TOTAL --}}
    {{-- =================================================================== --}}
    <section class="section mt-4">
        <div class="card bg-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="text-white">Rekapitulasi Nilai Keseluruhan</h4>
                        <p class="text-white">Jumlah total nilai dari semua formulir yang telah diisi.</p>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-end">
                        <h1 class="text-white fw-bold">
                            {{-- Tempat untuk menampilkan Grand Total --}}
                            <span id="grand-total-display">0</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- AKHIR BAGIAN BARU --}}

</div>

{{-- SCRIPT DENGAN PENYESUAIAN --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // FUNGSI BARU UNTUK MENGHITUNG GRAND TOTAL
        function updateGrandTotal() {
            let grandTotal = 0;
            // Pilih semua display total nilai individual
            const allTotalDisplays = document.querySelectorAll('.total-score-display');
            
            // Loop dan jumlahkan semua nilainya
            allTotalDisplays.forEach(display => {
                grandTotal += parseInt(display.innerText) || 0;
            });

            // Tampilkan hasilnya di display Grand Total
            document.getElementById('grand-total-display').innerText = grandTotal;
        }


        // Logika yang sudah ada, dengan sedikit modifikasi
        const formCards = document.querySelectorAll('.form-penilaian-card');
        formCards.forEach(card => {
            const scoreInputs = card.querySelectorAll('.score-input');
            const totalScoreElement = card.querySelector('.total-score-display');
            const resetButton = card.querySelector('button[type="reset"]');

            function calculateTotal() {
                let total = 0;
                scoreInputs.forEach(input => {
                    const value = parseInt(input.value) || 0;
                    if (value > 5) {
                        input.value = 5;
                    } else if (value < 0) {
                        input.value = 0;
                    }
                    total += parseInt(input.value) || 0;
                });
                totalScoreElement.innerText = total;

                // MODIFIKASI: Panggil fungsi Grand Total setiap kali total individu berubah
                updateGrandTotal(); 
            }

            scoreInputs.forEach(input => {
                input.addEventListener('input', calculateTotal);
            });
            
            if(resetButton) {
                resetButton.addEventListener('click', function() {
                    setTimeout(() => {
                        calculateTotal(); // Hitung ulang total individu setelah reset
                    }, 0); 
                });
            }

            calculateTotal(); // Panggil saat awal untuk inisialisasi
        });
    });
</script>


{{-- SCRIPT (TIDAK ADA PERUBAHAN SAMA SEKALI) --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const formCards = document.querySelectorAll('.form-penilaian-card');
        formCards.forEach(card => {
            const scoreInputs = card.querySelectorAll('.score-input');
            const totalScoreElement = card.querySelector('.total-score-display');
            const resetButton = card.querySelector('button[type="reset"]');
            function calculateTotal() {
                let total = 0;
                scoreInputs.forEach(input => {
                    const value = parseInt(input.value) || 0;
                    if (value > 5) {
                        input.value = 5;
                    } else if (value < 0) {
                        input.value = 0;
                    }
                    total += parseInt(input.value) || 0;
                });
                totalScoreElement.innerText = total;
            }
            scoreInputs.forEach(input => {
                input.addEventListener('input', calculateTotal);
            });
            if(resetButton) {
                resetButton.addEventListener('click', function() {
                    setTimeout(calculateTotal, 0); 
                });
            }
            calculateTotal();
        });
    });
</script>

</x-app-layout>