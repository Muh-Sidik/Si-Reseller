@extends('reseller.layouts')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card bg-c-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h3 class="text-white">{{ $total_barang }}</h3>
                        <h6 class="text-white m-b-0">Jumlah Barang</h6>
                    </div>
                    <div class="col-4 text-right">
                        {{-- <canvas id="update-chart-3" height="50"></canvas> --}}
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card bg-c-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h3 class="text-white">{{ $hasil_jual }}</h3>
                        <h6 class="text-white m-b-0">Barang Terjual</h6>
                    </div>
                    <div class="col-4 text-right">
                        {{-- <canvas id="update-chart-3" height="50"></canvas> --}}
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card bg-instagram update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">Rp. {{number_format($beli_barang,0,',','.')}}</h4>
                        <h6 class="text-white m-b-0">Modal Beli</h6>
                    </div>
                    <div class="col-4 text-right">
                        <canvas id="update-chart-1" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-c-yellow update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">Rp. {{number_format($total_jual,0,',','.')}}</h4>
                        <h6 class="text-white m-b-0">Hasil Penjualan</h6>
                    </div>
                    <div class="col-4 text-right">
                        <canvas id="update-chart-2" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-c-lite-green update-card">
            <div class="card-block">
                <div class="row align-items-end">
                    <div class="col-8">
                        <h4 class="text-white">Rp. {{number_format($keuntungan,0,',','.')}}</h4>
                        <h6 class="text-white m-b-0">Keuntungan</h6>
                    </div>
                    <div class="col-4 text-right">
                        <canvas id="update-chart-3" height="50"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"></div>

            <div class="panel-body">
                <canvas id="Chart" width="400" height="200"></canvas>
            </div>

        </div>
    </div>
</div>


@endsection

@push('script')
<script>
    var date = [01, 02, 03, 04, 05, 06, 07, 08, 09, 10, 11, 12]
    axios({
        method: 'POST',
        url: '{{ url("api/page/chart/reseller/profit") }}',
        data: {
            bulan: date,
        }
    })
    .then((response) => {
        var ctx = document.getElementById('Chart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Keuntungan (Rp. )',
                backgroundColor: 'rgb(135,206,250)',
                borderColor: 'rgb(0,191,255)',
                data: response.data
            }]
        },

        // Configuration options go here
        options: {}
    });
    })



</script>

@endpush

