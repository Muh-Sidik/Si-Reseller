@extends('reseller.layouts')

@section('content')

<div class="row">
    <div class="col-md">
        <h1 class="font-weight-bold pb-2 text-center text-capitalize">{{str_replace('-',' ',$page)}}</h1>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-header-text">About Me</h5>
        <button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
<i class="icofont icofont-edit"></i>
</button>
    </div>
    <div class="card-block">
        <div class="view-info">
            <div class="row">
                <div class="col-lg-12">
                    <div class="general-info">
                        <div class="row">
                            <div class="col-lg-12 col-xl-6">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nama Lengkap</th>
                                                <td>{{ $reseller->nama_reseller }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nama Toko</th>
                                                <td>{{ $reseller->nama_reseller }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">No. Whatsapp</th>
                                                <td>{{ $reseller->no_wa }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Domisili</th>
                                                <td>{{ $reseller->domisili }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end of table col-lg-6 -->
                            <div class="col-lg-12 col-xl-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Username</th>
                                                <td>{{ Auth::user()->username }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Password</th>
                                                <td><a href="#!"><span class="__cf_email__" data-cfemail="4206272f2d02273a232f322e276c212d2f">[password&#160;protected]</span></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end of table col-lg-6 -->
                        </div>
                        <!-- end of row -->
                    </div>
                    <!-- end of general info -->
                </div>
                <!-- end of col-lg-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of view-info -->
        <div class="edit-info">
            <div class="row">
                <div class="col-lg-12">
                    <div class="general-info">
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                                                    <input type="text" class="form-control" placeholder="Nama Lengkap">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                                                    <input type="text" class="form-control" placeholder="Nama Toko">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
                                                    <input type="text" class="form-control" placeholder="No. Whatsapp">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icofont icofont-location-pin"></i></span>
                                                    <input type="text" class="form-control" placeholder="Domisili">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button href="#!" class="btn btn-primary waves-effect waves-light m-r-20">Save</button>
                            </div>
                            <!-- end of table col-lg-6 -->
                            <div class="col-lg-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icofont icofont-mobile-phone"></i></span>
                                                    <input type="text" class="form-control" placeholder="Username">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icofont icofont-social-twitter"></i></span>
                                                    <input type="text" class="form-control" placeholder="Password">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button href="#!" class="btn btn-primary waves-effect waves-light m-r-20">Save</button>
                            </div>
                        <!-- end of row -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="text-center">
                                    <a href="#!" id="edit-cancel" class="btn btn-default waves-effect">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of edit info -->
                </div>
                <!-- end of col-lg-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of edit-info -->
    </div>
    <!-- end of card-block -->
</div>



@endsection

