<x-app-layout>
    <x-slot:title>
        Dashboard
    </x-slot>

    <div class="page-heading">
        <h3>Dashboard Rekapitulasi</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Rekapitulasi Total Skor Survei per Bulan</h4>
                    </div>
                    <div class="card-body">
                        {{-- Ini adalah "kanvas" tempat grafik akan digambar --}}
                        <canvas id="surveyChart"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- 'scripts' ini akan di-push ke @stack('scripts') di layout utama --}}
    @push('scripts')
    <script>
        // Pastikan script berjalan setelah semua elemen halaman dimuat
        document.addEventListener('DOMContentLoaded', function () {
            
            // Ambil elemen canvas
            const ctx = document.getElementById('surveyChart').getContext('2d');
            let myChart; // Deklarasikan variabel chart di luar agar bisa diakses

            // Fungsi untuk mengambil data dari API dan merender grafik
            function renderChart() {
                // Ambil data dari route API yang sudah kita buat
                fetch("{{ route('chart.data') }}")
                    .then(response => response.json())
                    .then(data => {
                        // Hancurkan chart lama jika ada, untuk mencegah duplikasi
                        if (myChart) {
                            myChart.destroy();
                        }
                        
                        // Buat instansi grafik baru
                        myChart = new Chart(ctx, {
                            type: 'bar', // Tipe grafik batang
                            data: {
                                labels: data.labels, // Label sumbu X (nama bulan) dari controller
                                datasets: [{
                                    label: 'Total Skor per Bulan',
                                    data: data.data, // Data sumbu Y (total skor) dari controller
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    })
                    .catch(error => console.error('Error fetching chart data:', error));
            }

            // Panggil fungsi untuk pertama kali saat halaman dimuat
            renderChart();
        });
    </script>
    @endpush
</x-app-layout>