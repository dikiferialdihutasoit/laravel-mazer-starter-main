<x-app-layout>
    <x-slot:title>
        Form Penilaian
    </x-slot>
<div class="page-heading">
    {{-- ... (header halaman tetap sama) ... --}}
</div>

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
    <form method="POST" action="{{ route('survey.store.category') }}" enctype="multipart/form-data">
        @csrf
        <div class="accordion" id="accordionKategori">
            
            {{-- KATEGORI A --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingKategori1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKategori1" aria-expanded="true" aria-controls="collapseKategori1">Kategori A</button>
                </h2>
                <div id="collapseKategori1" class="accordion-collapse collapse show" aria-labelledby="headingKategori1" data-bs-parent="#accordionKategori">
                    <div class="accordion-body">
                        {{-- FORM 1 --}}
                        <div class="card form-penilaian-card mb-3">
                            <div class="card-header"><h4 class="card-title">1. Pembangunan Komitmen Tim</h4></div>
                            <div class="card-body"><div class="form-body"><div class="row">
                                <input type="hidden" name="results[1][form_id]" value="1">
                                <div class="col-12"><div class="form-group"><label>1. Poin 1.1</label><input type="number" name="results[1][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                                <div class="col-12"><div class="form-group"><label for="catatan-1">Catatan</label><textarea class="form-control" id="catatan-1" name="results[1][notes]" rows="3"></textarea></div></div>
                                <div class="col-12"><div class="form-group"><label for="gambar-1">Gambar</label><input type="file" class="form-control image-upload-input" id="gambar-1" name="results[1][image]" accept="image/*"></div><img src="" alt="Preview" class="img-fluid rounded mt-2 image-preview" style="display: none;"></div>
                                <div class="col-12 d-flex justify-content-between align-items-center"><h4 class="m-0">Total: <span class="total-score-display">0</span></h4><button type="reset" class="btn btn-light-secondary">Reset</button></div>
                            </div></div></div>
                        </div>
                        {{-- FORM 2 --}}
                        <div class="card form-penilaian-card mb-3">
                            <div class="card-header"><h4 class="card-title">2. Aspek Kolaborasi</h4></div>
                            <div class="card-body"><div class="form-body"><div class="row">
                                <input type="hidden" name="results[2][form_id]" value="2">
                                <div class="col-12"><div class="form-group"><label>1. Poin 2.1</label><input type="number" name="results[2][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                                <div class="col-12"><div class="form-group"><label for="catatan-2">Catatan</label><textarea class="form-control" id="catatan-2" name="results[2][notes]" rows="3"></textarea></div></div>
                                <div class="col-12"><div class="form-group"><label for="gambar-2">Gambar</label><input type="file" class="form-control image-upload-input" id="gambar-2" name="results[2][image]" accept="image/*"></div><img src="" alt="Preview" class="img-fluid rounded mt-2 image-preview" style="display: none;"></div>
                                <div class="col-12 d-flex justify-content-between align-items-center"><h4 class="m-0">Total: <span class="total-score-display">0</span></h4><button type="reset" class="btn btn-light-secondary">Reset</button></div>
                            </div></div></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KATEGORI B --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingKategori2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKategori2" aria-expanded="false" aria-controls="collapseKategori2">Kategori B</button>
                </h2>
                <div id="collapseKategori2" class="accordion-collapse collapse" aria-labelledby="headingKategori2" data-bs-parent="#accordionKategori">
                    <div class="accordion-body">
                        {{-- FORM 3 --}}
                        <div class="card form-penilaian-card mb-3">
                            <div class="card-header"><h4 class="card-title">3. Efektivitas Individual</h4></div>
                            <div class="card-body"><div class="form-body"><div class="row">
                                <input type="hidden" name="results[3][form_id]" value="3">
                                <div class="col-12"><div class="form-group"><label>1. Poin 3.1</label><input type="number" name="results[3][scores][]" class="form-control score-input" min="0" max="5"></div></div>
                                <div class="col-12"><div class="form-group"><label for="catatan-3">Catatan</label><textarea class="form-control" id="catatan-3" name="results[3][notes]" rows="3"></textarea></div></div>
                                <div class="col-12"><div class="form-group"><label for="gambar-3">Gambar</label><input type="file" class="form-control image-upload-input" id="gambar-3" name="results[3][image]" accept="image/*"></div><img src="" alt="Preview" class="img-fluid rounded mt-2 image-preview" style="display: none;"></div>
                                <div class="col-12 d-flex justify-content-between align-items-center"><h4 class="m-0">Total: <span class="total-score-display">0</span></h4><button type="reset" class="btn btn-light-secondary">Reset</button></div>
                            </div></div></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary btn-lg">Simpan Semua Formulir</button>
        </div>
    </form>
</section>
</div>

<script>
    // ... JavaScript Anda tidak perlu diubah ...
</script>
</x-app-layout>