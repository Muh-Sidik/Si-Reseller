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
                <center>Form Penjualan</center>
            </div>
            <div class="card-body">
                <form action="{{route('penjualan.store')}}" method="POST">
                    @csrf
                        <input type="hidden" value="{{ $auth->id }}" name="id_reseller">
                        <div class="form-group">
                            <label for="id_barang">Nama Barang</label>
                            <select id="id_barang" name="id_barang" class="form-control @error('id_barang') is-invalid @enderror">
                                <option selected>-- Pilih Barang --</option>
                                @foreach ($barang as $item)
                                    <option value="{{$item->id}}">{{ $item->nama_barang }}, stock: {{ $item->stock }}</option>
                                @endforeach
                            </select>
                            @error('id_barang')
                                <div class="invalid-feedback">
                                    Barang harus dipilih!
                                </div>
                            @enderror
                        </div>
                    <div class="form-group">
                        <label>Jumlah Order</label>
                        <input type="number" name="order" onkeypress="return goodchars(event,'1234567890',this)" class="form-control @error('order') is-invalid @enderror" id="order" required placeholder="Masukkan Jumlah Barang">
                        @error('order')
                            <div class="invalid-feedback">
                                Jumlah Order harus diisi!
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#acceptModal" type="button">
                        <i class="fa fa-shopping-basket" aria-hidden="true" ></i>
                        Jual
                    </button>
                    @include('adminty.pages.accept.modal-order-reseller')
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <h4 class="font-weight-bold pb-2 text-center text-capitalize">Riwayat Penjualan</h4>
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
                            <th scope="col" width="120px" class="text-center">Tanggal</th>
                            <th scope="col" width="120px" class="text-center">Nama Barang</th>
                            <th scope="col" width="120px" class="text-center">Total Order</th>
                            <th scope="col" width="120px" class="text-center">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $ds)
                        <tr>
                            <th class="text-center" scope="row">{{$no++}}</th>
                            <td>{{date('d-m-Y, h:i' ), strtotime($ds->created_at)}}</td>
                            <td>{{$ds->nama_barang}}</td>
                            <td>{{$ds->jumlah_jual}}</td>
                            <td>Rp. {{number_format($ds->total_jual,0,',','.')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
