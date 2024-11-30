<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="card">
    <div class="card-body">
        <h3 class="card-title">
            <i data-feather="bar-chart-2" class="icon-m"></i>
            Room Usage
        </h3>
        <hr>
        <canvas id="roomUsageChart"></canvas>
    </div>
</div>


<script>
    fetch('{{ route('booking.chart') }}')
        .then(res => res.json())
        .then(data => {
            new Chart(document.getElementById('roomUsageChart'), {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Jumlah Kamar Terpakai',
                        data: data.data,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgb(13, 110, 253)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Kamar'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Tanggal'
                            }
                        }
                    }
                }
            });
        });
</script>
