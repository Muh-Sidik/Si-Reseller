@extends('adminty.layouts')

@section('content')

<div class="row">
    <div class="col-md">
        <h1 class="font-weight-bold pb-3 text-center text-capitalize">{{str_replace('-',' ',$page)}}</h1>
    </div>
</div>
@include('adminty.pages.modal.modal-supplier')
<div class="row">
    <div class="col-md-2 pb-2">
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-square" aria-hidden="true"></i>Tambah Data</button>
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
                            <th scope="col" width="120px" class="text-center">Nama Supplier</th>
                            <th scope="col" width="100px" class="text-center">No.HP</th>
                            <th scope="col" width="120px" class="text-center">Alamat</th>
                            <th scope="col" width="120px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $ds)
                        <tr>
                            <th class="text-center" scope="row">{{$no++}}</th>
                            <td>{{$ds->nama_supplier}}</td>
                            <td>{{$ds->no_hp}}</td>
                            <td>{{$ds->alamat}}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="">
                                    <button type="button"  class="btn btn-success" data-toggle="modal" data-target="#updateModal{{$ds->id}}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <button type="submit" data-toggle="modal" data-target="#deleteModal{{$ds->id}}"  class="btn btn-danger btn-delete">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        @include('adminty.pages.update.modal-supplier')
                        @include('adminty.pages.delete.modal-supplier')

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




@endsection
