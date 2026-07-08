@extends('layouts.dashboard')

@section('isi')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <div class="text-right">
            <span class="text-muted">Ringkasan kinerja fitur admin</span>
        </div>
    </div>

    

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-gold shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-gold text-uppercase mb-1">Pendapatan Potensial</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($availableValue, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-wave fa-2x text-gold"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Produk Tersedia</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $productAvailable }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Produk Tidak Tersedia</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $productUnavailable }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Produk Dibuat per Bulan</h6>
                    <span class="text-muted">{{ $productCount }} Produk</span>
                </div>
                <div class="card-body">
                    <div class="chart-bar" style="height: 350px;">
                        <canvas id="productChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Status Produk</h6>
                    <span class="text-muted">Ketersediaan</span>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2" style="height: 300px;">
                        <canvas id="statusChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Tersedia
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Tidak tersedia
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const monthLabels = @json($monthLabels);
        const monthValues = @json($monthValues);
        const productAvailable = {{ $productAvailable }};
        const productUnavailable = {{ $productUnavailable }};

        const ctx = document.getElementById('productChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: monthLabels,
                datasets: [{
                    label: 'Produk Dibuat',
                    data: monthValues,
                    backgroundColor: 'rgba(117, 82, 7, 0.75)',
                    borderColor: 'rgba(117, 82, 7, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }]
                }
            }
        });

        const pieCtx = document.getElementById('statusChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Tersedia', 'Tidak tersedia'],
                datasets: [{
                    data: [productAvailable, productUnavailable],
                    backgroundColor: ['#4e73df', '#e74a3b'],
                    hoverBackgroundColor: ['#2e59d9', '#be2617'],
                    hoverBorderColor: 'rgba(234, 236, 244, 1)',
                }]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            const label = data.labels[tooltipItem.index] || '';
                            const value = data.datasets[0].data[tooltipItem.index] || 0;
                            return label + ': ' + value;
                        }
                    }
                },
                legend: {
                    position: 'bottom'
                }
            }
        });
    });
</script>

@endsection
