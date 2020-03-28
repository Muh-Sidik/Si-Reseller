@extends('adminty.layouts')

@section('content')

<div class="row">
    <div class="col-md">
        <h1 class="font-weight-bold pb-2 text-center text-capitalize">{{str_replace('-',' ',$page)}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-2 pb-2">
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah Data</button>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card card-secondary card-outline">
            <div class="card-header bg-info font-weight-bold text-white p-3">
                <center>Reseller Order</center>
            </div>
            <div class="card-body">
                <form action="{{route('order.store')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="id_reseller" value="{{ Auth::user()->id }}">
                        <div class="form-group col-md">
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

@endsection
