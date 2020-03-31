@extends('reseller.layouts')

@section('content')

<div class="row">
    <div class="col-md">
        <h1 class="font-weight-bold pb-2 text-center text-capitalize">{{str_replace('-',' ',$page)}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-2 pb-2">
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-square" aria-hidden="true"></i>Order Barang</button>
    </div>
</div>
@include('reseller.pages.modal.modal-barang')

<div class="row">
    <div class="col-md">
        <div class="card p-3">
            <div class="table-responsive-sm">
                <table class="table datatable table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th width="3%" scope="col">No.</th>
                            <th scope="col" width="120px" class="text-center">Nama Barang</th>
                            <th scope="col" width="120px" class="text-center">Harga Beli</th>
                            <th scope="col" width="120px" class="text-center">Harga Jual</th>
                            <th scope="col" width="120px" class="text-center">Stock Barang</th>
                            <th scope="col" width="120px" class="text-center">Kategori</th>
                            <th scope="col" width="120px" class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $ds)
                        <tr>
                            <th class="text-center" scope="row">{{$no++}}</th>
                            <td>{{$ds->nama_barang}}</td>
                            <td>Rp. {{number_format($ds->harga_beli,0,',','.')}}</td>
                            <td>Rp. {{number_format($ds->harga_jual,0,',','.')}}</td>
                            @if ($ds->stock_barang > 0)
                            <td>{{$ds->stock_barang}}</td>
                            @else
                            <td>0</td>
                            @endif
                            <td>{{$ds->nama_kategori}}</td>
                            <td>Rp. {{number_format($ds->total_beli,0,',','.')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
