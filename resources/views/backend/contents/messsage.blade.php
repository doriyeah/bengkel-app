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
        <h2>Message</h2>
    </div><!-- sh-pagetitle-left-title -->
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    @if ($message = Session::get('success'))
                        <div class="custom-alerts alert alert-success fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            {!! $message !!}
                        </div>
                        <?php Session::forget('success');?>
                    @endif
                </div>
                <div class="box-body">
                    <table id="datatable-laporan" class="table table-striped table-bordered"
                           cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No.Telpon</th>
                            <td>Message</td>
                            <td>Tanggal</td>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no=1)

                       @foreach($pesan as $m)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$m->nama}}</td>
                                <td>{{$m->email}}</td>
                                <td>{{$m->no_telp}}</td>
                                <td>{{$m->message}}</td>
                                <td>{{$m->created_at->format('d-m-Y')}}</td>
                                <td>
                                    <button @if(Auth::user()->type=='pegawai') class="hide" @endif
                                    href="#" class="btn btn-sm btn-danger btn-hapus" data-message={{$m->id}}>
                                        <i class="fa fa-trash"></i>
                                    </button></td>
                            </tr>
                            @php($no++)

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection