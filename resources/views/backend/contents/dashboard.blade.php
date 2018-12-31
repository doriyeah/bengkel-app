@extends('backend.layouts.master')
@section('breadcrumb')
    <nav class="breadcrumb">
        <a class="breadcrumb-item active" href="">Dashboard</a>
        {{-- <a class="breadcrumb-item" href="index.html">Pages</a> --}}
    </nav>
@endsection
@section('title')
    <div class="sh-pagetitle-title">
        <span>Bengkel</span>
        <h2>Dashboard</h2>
    </div><!-- sh-pagetitle-left-title -->
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart" style="margin-top: 20px"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Barang</span>
                    <span class="info-box-number">{{\App\Barang::all()->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-tag" style="margin-top: 20px"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Category</span>
                    <span class="info-box-number">{{\App\Category::all()->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-list" style="margin-top: 20px"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Laporan</span>
                    <span class="info-box-number">{{count(\App\Laporan::distinct('invoice')->get())}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-user" style="margin-top: 20px"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pegawai</span>
                    <span class="info-box-number">{{\App\User::where('type','!=','admin')->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>


        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope" style="margin-top: 20px"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pesan</span>
                    <span class="info-box-number">{{\App\Message::all()->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

    </div>



@endsection