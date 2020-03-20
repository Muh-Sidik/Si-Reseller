@extends('adminty.layouts')

@section('content')

<div class="row">
    <div class="col-md">
        <h1 class="font-weight-bold text-center pb-3 text-capitalize">{{str_replace('-',' ',$page)}}</h1>
    </div>
</div>
@include('adminty.pages.modal.modal-reseller')
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
                            <th scope="col" width="120px" class="text-center">Nama Reseller</th>
                            <th scope="col" width="120px" class="text-center">No. Whatsapp</th>
                            <th scope="col" width="120px" class="text-center">Domisili</th>
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
                            <td>{{$ds->nama_reseller}}</td>
                            <td>{{$ds->no_wa}}</td>
                            <td>{{$ds->domisili}}</td>
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

                        @include('adminty.pages.update.modal-reseller')
                        @include('adminty.pages.delete.modal-reseller')

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




@endsection
