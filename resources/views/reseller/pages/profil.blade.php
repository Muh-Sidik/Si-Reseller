@extends('reseller.layouts')

@section('content')

<div class="row">
    <div class="col-md">
        <h1 class="font-weight-bold pb-2 text-center text-capitalize">{{str_replace('-',' ',$page)}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-md">
        <div class="card card-secondary card-outline">
            <div class="card-header bg-info font-weight-bold text-white p-3">
                <center>Profil Pengguna (Reseller)</center>
            </div>
            <div class="card-body">
                <div class="col-md-6">
                    <label for="">Nama</label>
                    <h5>{{ $reseller->nama_reseller }}</h5>
                </div>
                <div class="col-md-6">
                    <label for="">Username</label>
                    <h5>{{ Auth::user()->username }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
