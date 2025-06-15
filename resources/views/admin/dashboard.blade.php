@extends('layouts.admin')
@section('content')
<div class="container" style="max-width: 900px; margin: 40px auto; background: #fff; min-height: 100vh; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border-radius: 16px; padding: 32px;">
    <div class="header-top" style="display: flex; align-items: center; justify-content: space-between; padding: 0 0 24px 0;">
        <div class="header-title" style="display: flex; align-items: center;">
            <img src="https://img.icons8.com/ios-filled/24/000000/dashboard.png" style="width:28px; margin-right:8px;">
            <h2 style="margin: 0; font-size: 1.5rem; font-family: 'Montserrat', sans-serif; font-weight: 700;">Dashboard</h2>
        </div>
        <div></div> {{-- Placeholder for right alignment --}}
    </div>
    <h2 style="font-size:1.5rem; text-align:left; margin-top:20px; margin-bottom:30px; font-family: 'Montserrat', sans-serif; font-weight: 700;"></h2>
    <div class="stats-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
        <div class="stat-card stat-blue" style="flex: 1; border-radius: 12px; padding: 20px 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; flex-direction: column; align-items: flex-start; color: #fff; background: linear-gradient(90deg, #4e54c8 60%, #8f94fb 100%);">
            <div class="stat-title" style="font-size: 1rem; color: #fff; margin-bottom: 6px;">Total User</div>
            <div class="stat-value" style="font-size: 2rem; font-weight: bold; margin-bottom: 0;">{{ $userCount }}</div>
        </div>
        <div class="stat-card stat-yellow" style="flex: 1; border-radius: 12px; padding: 20px 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; flex-direction: column; align-items: flex-start; color: #fff; background: linear-gradient(90deg, #f7971e 60%, #ffd200 100%);">
            <div class="stat-title" style="font-size: 1rem; color: #fff; margin-bottom: 6px;">Total Produk</div>
            <div class="stat-value" style="font-size: 2rem; font-weight: bold; margin-bottom: 0;">{{ $productCount }}</div>
        </div>
        <div class="stat-card stat-orange" style="flex: 1; border-radius: 12px; padding: 20px 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; flex-direction: column; align-items: flex-start; color: #fff; background: linear-gradient(90deg, #f85700 60%, #ff5858 100%);">
            <div class="stat-title" style="font-size: 1rem; color: #fff; margin-bottom: 6px;">Total Pesanan</div>
            <div class="stat-value" style="font-size: 2rem; font-weight: bold; margin-bottom: 0;">{{ $orderCount }}</div>
        </div>
        <div class="stat-card stat-red" style="flex: 1; border-radius: 12px; padding: 20px 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); display: flex; flex-direction: column; align-items: flex-start; color: #fff; background: linear-gradient(90deg, #e53935 60%, #e35d5b 100%);">
            <div class="stat-title" style="font-size: 1rem; color: #fff; margin-bottom: 6px;">Total Review</div>
            <div class="stat-value" style="font-size: 2rem; font-weight: bold; margin-bottom: 0;">{{ $reviewCount }}</div>
        </div>
    </div>
    <div class="chart-section" style="background: #fff; border-radius: 12px; padding: 30px 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.04);">
        <h3 style="margin-bottom:18px;">Grafik Pesanan:</h3>
        <canvas id="ordersChart" height="80"></canvas>
    </div>
</div>
<script>
    const ctx = document.getElementById('ordersChart').getContext('2d');
    const ordersChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartLabels) !!},
            datasets: [{
                label: 'Pesanan',
                data: {!! json_encode($chartData) !!},
                borderColor: '#4e54c8',
                backgroundColor: 'rgba(78,84,200,0.1)',
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#4e54c8',
                pointBorderColor: '#fff',
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
            },
            scales: {
                x: { grid: { display: false } },
                y: { beginAtZero: true, grid: { color: '#eee' } }
            }
        }
    });
</script>
@endsection 