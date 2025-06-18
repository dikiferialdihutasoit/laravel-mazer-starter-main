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
                        <h4 class="card-title">Rekapitulasi Total Skor Audit</h4>
                        <div class="btn-group mt-3" role="group">
                            <button type="button" class="btn btn-outline-primary active" id="filter-monthly">Bulanan</button>
                            <button type="button" class="btn btn-outline-primary" id="filter-daily">Harian</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="surveyChart"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            
            const ctx = document.getElementById('surveyChart').getContext('2d');
            let myChart;

            const btnMonthly = document.getElementById('filter-monthly');
            const btnDaily = document.getElementById('filter-daily');

            function renderChart(filterType = 'monthly') {
                const apiUrl = `{{ route('chart.data') }}?filter=${filterType}`;

                fetch(apiUrl)
                    .then(response => response.json())
                    .then(data => {
                        if (myChart) {
                            myChart.destroy();
                        }
                        
                        myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: data.labels,
                                datasets: [{
                                    label: `Total Skor (${filterType === 'daily' ? 'Harian' : 'Bulanan'})`,
                                    data: data.data,
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

            btnMonthly.addEventListener('click', function() {
                this.classList.add('active');
                btnDaily.classList.remove('active');
                renderChart('monthly');
            });

            btnDaily.addEventListener('click', function() {
                this.classList.add('active');
                btnMonthly.classList.remove('active');
                renderChart('daily');
            });

            renderChart('monthly');
        });
    </script>
    @endpush
</x-app-layout>