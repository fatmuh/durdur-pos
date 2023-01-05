@extends('layouts.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Data Pemasukan
                </div>
                <div class="card-body">
                    <div id="grafik_pemasukan"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Data Pengeluaran
                </div>
                <div class="card-body">
                    <div id="grafik"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var biaya = {!! json_encode($biaya) !!};
    var bulan_pengeluaran = {!! json_encode($bulan_pengeluaran) !!};
    Highcharts.chart('grafik', {
        title : {
            text: 'Grafik Pengeluaran Bulanan'
        },
        xAxis : {
            categories : bulan_pengeluaran
        },
        yAxis : {
            title: {
                text : 'Nominal Pengeluaran Bulanan'
            }
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [
            {
                name: 'Nominal Pengeluaran',
                data: biaya
            }
        ]
    });
</script>

<script type="text/javascript">
    var total_pembayaran = {!! json_encode($total_pembayaran) !!};
    var bulan_pemasukan = {!! json_encode($bulan_pemasukan) !!};
    Highcharts.chart('grafik_pemasukan', {
        title : {
            text: 'Grafik Pemasukan Bulanan'
        },
        xAxis : {
            categories : bulan_pemasukan
        },
        yAxis : {
            title: {
                text : 'Nominal Pemasukan Bulanan'
            }
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [
            {
                name: 'Nominal Pemasukan',
                data: total_pembayaran
            }
        ]
    });
</script>
@endsection
