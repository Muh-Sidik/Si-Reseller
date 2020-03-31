@extends('reseller.layouts')

@section('content')

<div class="row">
    <div class="col-md">
        <h1 class="font-weight-bold pb-2 text-center text-capitalize">{{str_replace('-',' ',$page)}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card card-secondary card-outline">
            <div class="card-header bg-info font-weight-bold text-white p-3">
                <center>Penjualan</center>
            </div>
            <div class="card-body">
                <form action="{{route('order.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_reseller">Nama Reseller</label>
                            <select id="id_reseller" name="id_reseller" class="form-control @error('id_reseller') is-invalid @enderror">
                                <option selected>-- Pilih Reseller --</option>
                                @foreach ($reseller as $res)
                                    <option value="{{$res->id}}">{{ $res->nama_reseller }}</option>
                                @endforeach
                            </select>
                            @error('id_reseller')
                                <div class="invalid-feedback">
                                    Barang harus dipilih!
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_barang">Nama Barang</label>
                            <select id="id_barang" name="id_barang" class="form-control @error('id_barang') is-invalid @enderror">
                                <option selected>-- Pilih Barang --</option>
                                @foreach ($barang as $item)
                                    <option value="{{$item->id}}">{{ $item->nama_barang }}</option>
                                @endforeach
                            </select>
                            @error('id_barang')
                                <div class="invalid-feedback">
                                    Barang harus dipilih!
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Order</label>
                        <input type="number" name="total_order" onkeypress="return goodchars(event,'1234567890',this)" class="form-control @error('total_order') is-invalid @enderror" id="total_order" required placeholder="Masukkan Jumlah Barang">
                        @error('total_order')
                            <div class="invalid-feedback">
                                Jumlah Order harus diisi!
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-block btn-primary" type="button">
                        <i class="fa fa-plus-square" aria-hidden="true" data-toggle="modal" data-target="#acceptModal"></i>
                        Order
                    </button>
                    @include('adminty.pages.accept.modal-order-reseller')
                </form>
            </div>
        </div>
    </div>
</div>

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
