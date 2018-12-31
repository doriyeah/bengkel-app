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
        <h2>Category Barang</h2>
    </div><!-- sh-pagetitle-left-title -->
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Category Baru</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('post_category')}}">
                        {{ csrf_field() }}
                        <label>Nama</label>
                        <input class="form-control" name="nama" required>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

            <div class="box box-primary">
                <div class="card-body">
                    <div class="box-body">
                        <table id="datatable-category" class="table table-striped table-bordered nowrap" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Category</th>
                                <th @if(Auth::user()->type=='pegawai') class="hide" @endif>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($no= 1)
                            @foreach($category as $c)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$c->nama}}</td>
                                <td @if(Auth::user()->type=='pegawai') class="hide" @endif>
                                    <button href="" class="btn btn-sm btn-warning" data-nama="{{$c->nama}}"
                                    data-catid="{{$c->id}}" data-toggle="modal" data-target="#edit">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button href="#" class="btn btn-sm btn-danger btn-hapus" data-category-id="{{$c->id}}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                                @php($no++)
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form style="width: 40em" method="post" action="{{route('update_category')}}">
                    {{ csrf_field() }}
                    <div class="modal-body modal-lg">
                        <input type="hidden" name="category_id" id="catid" value="">
                        <label>Nama Category</label>
                        <input class="form-control" name="nama" id="nama" required>
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
          $('#datatable-category').DataTable({
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
        var categoryId = $(this).attr("data-category-id");
        swal({
          title: "Are you sure?",
          text: "Are you sure that you want to delete this category?",
          type: "warning",
          showCancelButton: true,
          closeOnConfirm: false,
          confirmButtonText: "Yes, delete it!",
          confirmButtonColor: "#ec6c62"
        }).then(function (result) {
          if (result.value) {
            $.ajax({
              url: "{{url('api/delete/category/')}}"+"/"+categoryId,
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
        var catid = button.data('catid')
        var modal = $(this)

        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #catid').val(catid);

      })
    </script>
@endsection