@extends('template_pegawai.layouts')
@section('title', 'Dashboard Pegawai')

@section('konten')
<style>
    /* 🟦 Card umum */
    .dashboard-card {
        border: none;
        border-radius: 1rem;
        height: 180px;
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
        color: #fff;
        padding: 1rem 1.5rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    /* 🟦 Warna card pegawai tetap */
    .dashboard-bg-dipinjam { 
        background: linear-gradient(120deg, #007bff, #33b1ff); 
    }
    .dashboard-bg-dikembalikan { 
        background: linear-gradient(120deg, #0dcaf0, #007bff); 
    }
    .dashboard-bg-konfirmasi { 
        background: linear-gradient(120deg, #33b1ff, #80d0ff); 
        color: #fff;
    }
    .dashboard-bg-ditolak { 
        background: linear-gradient(120deg, #004e92, #4286f4);
    }

    /* 🟦 Teks & ikon */
    .dashboard-title {
        font-size: 0.9rem;
        font-weight: 700;
        text-transform: uppercase;
        opacity: 0.9;
        margin-bottom: 0.3rem;
    }
    .dashboard-value {
        font-size: 2rem;
        font-weight: 800;
    }
    .dashboard-icon {
        font-size: 3rem;
        opacity: 0.2;
        position: absolute;
        bottom: 15px;
        right: 20px;
    }

    /* 🟦 Progress bar */
    .progress {
        background: rgba(255,255,255,0.2);
        height: 6px;
        border-radius: 10px;
        margin-top: 0.5rem;
    }
    .progress-bar {
        background-color: #fff;
    }

    /* 🟦 Grid layout */
    .dashboard-wrapper { 
        display: grid; 
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); 
        gap: 1.5rem; 
        margin-bottom: 2rem; 
    }

    /* 🟦 Chart card */
    .chart-card {
        border-radius: 1rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
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
    <!-- Dipinjam -->
    <div class="card dashboard-card dashboard-bg-dipinjam shadow-sm">
        <div>
            <div class="dashboard-title">Total Aset Dipinjam</div>
            <div class="dashboard-value">{{ $totalDipinjam }}</div>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 50%"></div>
            </div>
        </div>
        <i class="fas fa-clipboard-list dashboard-icon"></i>
    </div>

    <!-- Dikembalikan -->
    <div class="card dashboard-card dashboard-bg-dikembalikan shadow-sm">
        <div>
            <div class="dashboard-title">Total Aset Dikembalikan</div>
            <div class="dashboard-value">{{ $totalDikembalikan }}</div>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 75%"></div>
            </div>
        </div>
        <i class="fas fa-archive dashboard-icon"></i>
    </div>

    <!-- Menunggu Konfirmasi -->
    <div class="card dashboard-card dashboard-bg-konfirmasi shadow-sm">
        <div>
            <div class="dashboard-title">Menunggu Konfirmasi</div>
            <div class="dashboard-value">{{ $menungguKonfirmasi }}</div>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 60%"></div>
            </div>
        </div>
        <i class="fas fa-hourglass-half dashboard-icon"></i>
    </div>

    <!-- Ditolak -->
    <div class="card dashboard-card dashboard-bg-ditolak shadow-sm">
        <div>
            <div class="dashboard-title">Peminjaman Ditolak</div>
            <div class="dashboard-value">{{ $jumlahDitolak }}</div>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 30%"></div>
            </div>
        </div>
        <i class="fas fa-times-circle dashboard-icon"></i>
    </div>
</div>

<!-- Grafik Bar -->
<div class="chart-card">
    <div class="chart-title">📈 Statistik Aset Pegawai</div>
    <canvas id="asetChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('asetChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Dipinjam', 'Dikembalikan', 'Menunggu Konfirmasi', 'Ditolak'],
        datasets: [{
            label: 'Jumlah',
            data: [
                {{ $totalDipinjam }},
                {{ $totalDikembalikan }},
                {{ $menungguKonfirmasi }},
                {{ $jumlahDitolak }}
            ],
            backgroundColor: [
                'rgba(0, 123, 255, 0.8)',   
                'rgba(23, 162, 184, 0.8)', 
                'rgba(0, 105, 217, 0.8)',   
                'rgba(51, 153, 255, 0.8)'  
            ],
            borderRadius: 6,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        animation: { duration: 1000, easing: 'easeOutQuart' },
        scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } },
        plugins: {
            legend: { display: false },
            tooltip: { callbacks: { label: context => `Jumlah: ${context.parsed.y}` } }
        }
    }
});
</script>
@endsection
