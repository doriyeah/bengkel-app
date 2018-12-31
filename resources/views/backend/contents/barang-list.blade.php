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
        <h2>List Barang</h2>
    </div><!-- sh-pagetitle-left-title -->
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">

                </div>
                <div class="box-body table-responsive">
                    <table id="datatable-barang" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Tahun</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <th>category</th>
                            <th @if(Auth::user()->type=='pegawai') class="hide" @endif>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no=1)
                        @foreach($barang as $b)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$b->nama}}</td>
                            <td>{{$b->tahun}}</td>
                            <td>{{number_format($b->harga,0,',','.')}}</td>
                            <td>{{$b->stok}}</td>
                            <td>

                                {{--add comma to instance--}}
                                @foreach($b->Category as $bc=>$value)
                                    @if(count($bc) != $bc+1)
                                    {{$value->nama}}
                                    @else
                                        {{$value->nama}} ,
                                    @endif
                                @endforeach
                            </td>
                            <td @if(Auth::user()->type=='pegawai') class="hide" @endif>
                                <button href="#" class="btn btn-sm btn-warning" data-nama="{{$b->nama}}"
                                data-tahun="{{$b->tahun}}" data-harga="{{$b->harga}}" data-barid="{{$b->id}}"
                                data-toggle="modal" data-target="#edit" data-category="{{$b->category}}">
                                    <i class="fa fa-pencil"></i>
                                </button>

                                <button href="#" class="btn btn-sm btn-danger btn-hapus" data-barang-id={{$b->id}}>
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

    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form style="width: 40em" method="post" action="{{route('update_barang')}}">
                    {{ csrf_field() }}
                    <div class="modal-body modal-lg">
                        <input type="hidden" name="barang_id" id="barid" value="">
                        <label>Nama Barang</label>
                        <input class="form-control" name="nama" id="nama" required>
                        <label>Tahun</label>
                        <input class="form-control" name="tahun" id="tahun" required>
                        <label>Harga</label>
                        <input class="form-control" name="harga" id="harga" required>
                        <label>Category</label>
                        @php($category = \App\Category::all())
                        <select class="form-control js-selectize-barang" multiple name="category_id[]" id="category" required>
                            @foreach($category as $c)
                                <option value="{{$c->id}}">{{$c->nama}}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
      $(function () {
        // datatables

        $(function () {
          $('#datatable-barang').DataTable({
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


      $('.btn-hapus').click(function () {
        var barangId = $(this).attr("data-barang-id");
        swal({
          title: "Are you sure?",
          text: "Are you sure that you want to delete this barang?",
          type: "warning",
          showCancelButton: true,
          closeOnConfirm: false,
          confirmButtonText: "Yes, delete it!",
          confirmButtonColor: "#ec6c62"
        }).then(function (result) {
          if (result.value) {
            $.ajax({
              url: "{{url('api/delete/barang/')}}"+"/"+barangId,
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


      $('#edit').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var nama = button.data('nama')
        var tahun = button.data('tahun')
        var harga = button.data('harga')
        var barid = button.data('barid')
        var category = button.data('category')
        var modal = $(this)

        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #tahun').val(tahun);
        modal.find('.modal-body #harga').val(harga);
        modal.find('.modal-body #barid').val(barid);
        modal.find('.modal-body #category').val(category);
      })


    </script>
@endsection


