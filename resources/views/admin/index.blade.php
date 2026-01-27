@extends('template.layouts')
@section('title', 'Dashboard')

@section('konten')
<style>
    /* 🌈 Gaya seragam & modern (Full Blue Theme) */
    .dashboard-card {
        border: none;
        border-radius: 1rem;
        height: 140px; /* 🔥 diperkecil dari 180px */
        padding: 1rem 1.2rem; /* 🔥 padding disesuaikan */
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
        color: #fff;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    /* 💙 Tema biru untuk semua kartu */
    .dashboard-bg-primary { background: linear-gradient(135deg, #007bff, #0056b3); }
    .dashboard-bg-success { background: linear-gradient(135deg, #33b1ff, #007bff); }
    .dashboard-bg-info { background: linear-gradient(135deg, #4dabf7, #1e90ff); }
    .dashboard-bg-warning { background: linear-gradient(135deg, #80d0ff, #33b1ff); }

    .dashboard-title {
        font-size: 0.8rem; /* diperkecil */
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        opacity: 0.9;
    }

    .dashboard-value {
        font-size: 1.6rem; /* diperkecil */
        font-weight: 800;
        margin-top: 0.2rem;
    }

    .dashboard-icon {
        font-size: 2.2rem;   
        opacity: 0.22;
        position: absolute;
        bottom: 10px;        
        right: 12px;         
    }

    .progress {
        background: rgba(255, 255, 255, 0.2);
        height: 5px; 
        border-radius: 10px;
        margin-top: 0.4rem;
    }

    .progress-bar { background-color: #fff; }

    .dashboard-wrapper {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); 
        gap: 1.2rem;
        margin-bottom: 2rem;
    }

    /* 🎯 Grafik compact */
    .chart-card {
        border-radius: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        background: #fff;
        padding: 1rem;              
        height: 250px;              
        max-width: 700px;           
        margin: 0 auto;
        text-align: center;
    }

    #asetChart {
        height: 180px !important;   
        width: 100% !important;
    }

    .chart-title {
        font-weight: 700;
        color: #007bff;
        margin-bottom: 0.75rem;
        font-size: 1rem;
    }

    .welcome-box {
        background: #ffffff;
        padding: 1.2rem 1.5rem;
        border-radius: 1rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        margin-bottom: 1.5rem;
        border-left: 5px solid #4e73df;
    }
    .welcome-text {
        font-size: 1.1rem;
        font-weight: 600;
        color: #4e73df;
    }
</style>

<div class="welcome-box">
    <div class="welcome-text">👋 Selamat datang kembali, <strong>{{ Auth::user()->username }}</strong>!</div>
</div>

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
                <div class="dashboard-value">{{ $totalDipinjam }}</div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 50%"></div>
                </div>
            </div>
            <i class="fas fa-clipboard-list dashboard-icon"></i>
        </div>
    </div>

    <!-- Menunggu Konfirmasi -->
    <div class="card dashboard-card dashboard-bg-warning shadow-sm">
        <div class="card-body d-flex flex-column justify-content-between">
            <div>
                <div class="dashboard-title">Menunggu Konfirmasi</div>
                <div class="dashboard-value">{{ $menungguKonfirmasi }}</div>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 60%"></div>
                </div>
            </div>
            <i class="fas fa-hourglass-half dashboard-icon"></i>
        </div>
    </div>

</div>

<!-- 📊 Grafik Compact -->
<div class="chart-card">
    <div class="chart-title">📈 Statistik Aset & Peminjaman</div>
    <canvas id="asetChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('asetChart').getContext('2d');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Kategori Aset', 'Total Aset', 'Aset Dipinjam', 'Menunggu Konfirmasi'],
        datasets: [{
            label: 'Jumlah',
            data: [
                {{ $kategoriaset }},
                {{ $aset }},
                {{ $totalDipinjam }},
                {{ $menungguKonfirmasi }}
            ],
            backgroundColor: [
                'rgba(0, 123, 255, 0.8)',
                'rgba(51, 153, 255, 0.8)',
                'rgba(0, 105, 217, 0.8)',
                'rgba(102, 178, 255, 0.8)'
            ],
            borderColor: [
                '#0056b3',
                '#007bff',
                '#004085',
                '#33b1ff'
            ],
            borderWidth: 2,
            borderRadius: 6,
            hoverBackgroundColor: [
                'rgba(0, 123, 255, 1)',
                'rgba(51, 153, 255, 1)',
                'rgba(0, 105, 217, 1)',
                'rgba(102, 178, 255, 1)'
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
                backgroundColor: '#007bff',
                titleColor: '#fff',
                bodyColor: '#fff',
                cornerRadius: 8,
            }
        }
    }
});
</script>

@endsection
