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
        <h2>Laporan List</h2>
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
                            <th>Jenis</th>
                            <th>Invoice</th>
                            <th>Username</th>
                            <td>Tanggal</td>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no=1)
                        @php($inc=0)
                        @foreach($laporan as $l)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$l->jenis}}</td>
                                <td>{{$l->invoice}}</td>
                                <td>{{$l->user->username}}</td>
                                <td>{{$l->created_at->format('d-m-Y')}}</td>
                                <td>
                                    <a href="{{route('cetak_laporan',$l->invoice)}}" class="btn btn-sm btn-primary" >
                                        <i class="fa fa-print"></i>
                                    </a>
                                    <button @if(Auth::user()->type=='pegawai') class="hide" @endif
                                    href="#" class="btn btn-sm btn-danger btn-hapus" data-laporan-invoice={{$l->invoice}}>
                                        <i class="fa fa-trash"></i>
                                    </button></td>
                            </tr>
                            @php($no++)
                            @php($inc++)
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>

    //DATATABLE LAPORAN TABLE
  $(function () {
    $(function () {
      $('#datatable-laporan').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        "dom":' <"top"><"search"f>rt<"bottom"ip><"clear">, '

      })
    })
  });

  // CONFIRM DELETE SWEETALERT2
  $('.btn-hapus').click(function () {
    var laporanInvoice = $(this).attr("data-laporan-invoice");
    swal({
      title: "Are you sure?",
      text: "Are you sure that you want to delete this laporan?",
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Yes, delete it!",
      confirmButtonColor: "#ec6c62"
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          url: "{{url('api/delete/laporan/')}}"+"/"+laporanInvoice,
          type: "GET",

        }).done(function(data) {
          swal("Deleted!", "Your file was successfully deleted!", "success");
          setTimeout(function () {
            location.reload(true);
          },1000)

        })
          .error(function(data) {
            swal("Oops", "We couldn't connect to the server!", "error");
          });
      } else if (result.dismiss == 'cancel') {
        console.log('cancel');
      }

    })
  });
</script>
@endsection