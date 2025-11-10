@extends('template.layouts')
@section('title', 'Dashboard')

@section('konten')
<style>
    /* 🌈 Gaya seragam & modern */
    .dashboard-card {
        border: none;
        border-radius: 1rem;
        height: 180px;
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
        color: #fff;
    }

    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .dashboard-bg-primary {
        background: linear-gradient(135deg, #4e73df, #224abe);
    }

    .dashboard-bg-success {
        background: linear-gradient(135deg, #1cc88a, #0f7653);
    }

    .dashboard-bg-info {
        background: linear-gradient(135deg, #36b9cc, #117a8b);
    }

    /* 🧡 Warna oranye untuk konfirmasi */
    .dashboard-bg-warning {
        background: linear-gradient(135deg, #f6c23e, #e0a800);
    }

    .dashboard-title {
        font-size: 0.9rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        opacity: 0.9;
    }

    .dashboard-value {
        font-size: 2rem;
        font-weight: 800;
        margin-top: 0.25rem;
    }

    .dashboard-icon {
        font-size: 3rem;
        opacity: 0.3;
        position: absolute;
        bottom: 15px;
        right: 20px;
    }

    .progress {
        background: rgba(255, 255, 255, 0.2);
        height: 6px;
        border-radius: 10px;
        margin-top: 10px;
    }

    .progress-bar {
        background-color: #fff;
    }

    .dashboard-wrapper {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    /* 🎯 Grafik compact */
    .chart-card {
        border-radius: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        background: #fff;
        padding: 1.5rem;
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }

    .chart-title {
        font-weight: 700;
        color: #4e73df;
        margin-bottom: 0.75rem;
        font-size: 1rem;
    }

    #asetChart {
        height: 240px !important;
        width: 100% !important;
    }
</style>

<div class="dashboard-wrapper">

    <!-- Kategori Aset -->
    <div class="card dashboard-card dashboard-bg-primary shadow-sm">
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <div class="dashboard-title">Kategori Aset</div>
                <div class="dashboard-value">{{ $kategoriaset }}</div>
            </div>
            <i class="fas fa-paste dashboard-icon"></i>
        </div>
    </div>

    <!-- Total Aset -->
    <div class="card dashboard-card dashboard-bg-success shadow-sm">
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <div class="dashboard-title">Total Aset</div>
                <div class="dashboard-value">{{ $aset }}</div>
            </div>
            <i class="fas fa-archive dashboard-icon"></i>
        </div>
    </div>

    <!-- Aset Dipinjam -->
    <div class="card dashboard-card dashboard-bg-info shadow-sm">
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <div class="dashboard-title">Aset Dipinjam</div>
                <div class="dashboard-value">{{ $meminjam }}</div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 50%"></div>
                </div>
            </div>
            <i class="fas fa-clipboard-list dashboard-icon"></i>
        </div>
    </div>

    <!-- 🧡 Menunggu Konfirmasi -->
    <div class="card dashboard-card dashboard-bg-warning shadow-sm">
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <div class="dashboard-title">Menunggu Konfirmasi</div>
                <div class="dashboard-value">{{ $jumlahKonfirmasi }}</div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 60%"></div>
                </div>
            </div>
            <i class="fas fa-hourglass-half dashboard-icon"></i>
        </div>
    </div>

</div>

<!-- 📊 Grafik Kecil -->
<div class="chart-card">
    <div class="chart-title">📈 Statistik Aset & Peminjaman</div>
    <canvas id="asetChart"></canvas>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('asetChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar', // bar lebih jelas untuk perbandingan
        data: {
            labels: ['Kategori Aset', 'Total Aset', 'Aset Dipinjam', 'Menunggu Konfirmasi'],
            datasets: [{
                label: 'Jumlah',
                data: [
                    {{ $kategoriaset }},
                    {{ $aset }},
                    {{ $meminjam }},
                    {{ $jumlahKonfirmasi }}
                ],
                backgroundColor: [
                    'rgba(78, 115, 223, 0.8)',   // biru
                    'rgba(28, 200, 138, 0.8)',   // hijau
                    'rgba(54, 185, 204, 0.8)',   // biru muda
                    'rgba(246, 194, 62, 0.8)'    // oranye
                ],
                borderColor: [
                    '#4e73df',
                    '#1cc88a',
                    '#36b9cc',
                    '#f6c23e'
                ],
                borderWidth: 2,
                borderRadius: 6,
                hoverBackgroundColor: [
                    'rgba(78, 115, 223, 1)',
                    'rgba(28, 200, 138, 1)',
                    'rgba(54, 185, 204, 1)',
                    'rgba(246, 194, 62, 1)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1000,
                easing: 'easeOutQuart'
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#4e73df',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    cornerRadius: 8,
                }
            }
        }
    });
</script>
@endsection
