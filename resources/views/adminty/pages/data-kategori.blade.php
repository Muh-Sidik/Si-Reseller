@extends('adminty.layouts')

@section('content')

<div class="row">
    <div class="col-md">
        <h1 class="font-weight-bold pb-3 text-center text-capitalize">{{str_replace('-',' ',$page)}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card p-3">
            <div class="table-responsive-sm">
                <table class="table datatable table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th width="3%" scope="col">No.</th>
                            <th scope="col" width="120px" class="text-center">Nama kategori</th>
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
                            <td>{{$ds->nama_kategori}}</td>
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

                        @include('adminty.pages.update.modal-kategori')
                        @include('adminty.pages.delete.modal-kategori')

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
            <div class="card card-secondary card-outline">
                <div class="card-header bg-info font-weight-bold text-white p-3">
                    <center>Tambah Kategori</center>
                </div>
                <div class="card-body">
                    <form action="{{route('kategori.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label >Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" required placeholder="Masukkan Nama kategori">
                            @error('nama_kategori')
                                <div class="invalid-feedback">
                                    Nama Kategori harus diisi!
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-block btn-primary" type="submit">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                            Tambah Kategori
                        </button>
                    </form>
                </div>
            </div>
        </div>
</div>




@endsection
