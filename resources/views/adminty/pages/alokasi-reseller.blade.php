@extends('adminty.layouts')

@section('content')
{{-- @php
    dd($reseller);
@endphp --}}
<div class="row">
    <div class="col-md">
        <h2 class="font-weight-bold pb-3 text-center text-capitalize">Reseller Order</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card p-3">
            <div class="table-responsive-sm">
                <table class="table datatable table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th width="3%" scope="col">No.</th>
                            <th scope="col" width="120px" class="text-center">Barang</th>
                            <th scope="col" width="120px" class="text-center">Jumlah</th>
                            <th scope="col" width="120px" class="text-center">Harga Jual</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($barang as $or)
                        <tr>
                            <th class="text-center" scope="row">{{$no++}}</th>
                            <td>{{$or->nama_barang}}</td>
                            <td>{{$or->jumlah_barang}}</td>
                            <td>Rp. {{number_format($or->harga_jual,0,',','.')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
            <div class="card card-secondary card-outline">
                <div class="card-header bg-info font-weight-bold text-white p-3">
                    <center>Reseller Order</center>
                </div>
                <div class="card-body">
                    <form action="{{route('order.store')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_reseller">Nama Reseller</label>
                                <select id="id_reseller" name="id_reseller" class="form-control @error('id_reseller') is-invalid @enderror">
                                    <option selected disabled>-- Pilih Reseller --</option>
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
                                    <option selected disabled>-- Pilih Barang --</option>
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
                        <button class="btn btn-block btn-primary" type="button" data-toggle="modal" data-target="#acceptModal">
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
        <h4 class="font-weight-bold pb-3 text-center">Riwayat Order</h4>
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
                            <th scope="col" width="120px" class="text-center">Reseller</th>
                            <th scope="col" width="120px" class="text-center">Total Order</th>
                            <th scope="col" width="120px" class="text-center">Total Harga</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $or)
                        <tr>
                            <th class="text-center" scope="row">{{$no++}}</th>
                            <td>{{date('d-m-Y, h:i' , strtotime($or->created_at))}}</td>
                            <td>{{$or->nama_barang}}</td>
                            <td>{{$or->nama_reseller}}</td>
                            <td>{{$or->total_order}}</td>
                            <td>Rp. {{number_format($or->total_harga,0,',','.')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




@endsection
