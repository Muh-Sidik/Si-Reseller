@extends('adminty.layouts')

@section('content')

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
                            <th scope="col" width="120px" class="text-center">Supplier</th>
                            <th scope="col" width="120px" class="text-center">Kategori</th>
                            <th scope="col" width="120px" class="text-center">Total Order</th>
                            <th scope="col" width="120px" class="text-center">Total Harga</th>
                            <th scope="col" width="120px" class="text-center">Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($order as $or)
                        <tr>
                            <th class="text-center" scope="row">{{$no++}}</th>
                            <td>{{date('d-m-Y', strtotime($or->created_at))}}</td>
                            <td>{{$or->nama_barang}}</td>
                            <td>{{$or->nama_supplier}}</td>
                            <td>{{$or->nama_kategori}}</td>
                            <td>{{$or->total_order}}</td>
                            <td>Rp. {{number_format($or->total_harga,0,',','.')}}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="">
                                    <button type="submit" data-toggle="modal" data-target="#deleteModal{{$or->id_order}}"  class="btn btn-danger btn-delete">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('adminty.pages.delete.modal-order')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <h1 class="font-weight-bold text-center pb-3 text-capitalize">{{ $title }}</h1>
    </div>
</div>


@php
    $no = 1;
@endphp

<div class="row">
    @foreach ($data as $ds)
    @php
        $barang = DB::table('barang')->where('id_supplier', $ds->id)->get();
    @endphp
    <div class="col-md-4 col-sm-6">
        <div class="card">
            <div class="card-header h4 text-white" style="background: rgb(48,60,84);">
                <h4 class="card-title text-center m-0">{{$ds->nama_supplier}}</h4>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($barang as $item)
                    <li class="list-group-item">
                        {{$item->nama_barang}}
                            <form action="{{route('barang.stock',$item->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <div class="input-group mt-1">
                                        <input type="text" class="form-control @error('total_order') is-invalid @enderror" name="total_order" placeholder="Tambah Stock" aria-describedby="basic-addon2">
                                        <input type="hidden" name="id_barang" value="{{ $item->id }}">
                                        <input type="hidden" name="id_supplier" value="{{ $item->id_supplier}}">
                                        <input type="hidden" name="id_kategori" value="{{ $item->id_kategori}}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary float-right" type="submit"><i class="fa fa-plus-square" aria-hidden="true"></i></button>
                                        </div>
                                        @error('total_order')
                                            <div class="invalid-feedback">
                                                Stock harus diisi!
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        @endforeach
</div>


@endsection
