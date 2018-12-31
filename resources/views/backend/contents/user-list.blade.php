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
        <h2>User List</h2>
    </div><!-- sh-pagetitle-left-title -->
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">

                </div>
                <div class="box-body">
                    <table id="datatable-user" class="table table-striped table-bordered nowrap"
                           cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>

                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no=1)
                        @foreach($user as $u)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$u->nama}}</td>
                                <td>{{$u->username}}</td>

                                <td>
                                    <button @if(Auth::user()->type=='pegawai') class="hide" @endif
                                    href=""  class="btn btn-sm btn-warning" data-userid="{{$u->id}}"
                                    data-nama="{{$u->nama}}" data-username="{{$u->username}}"
                                            data-toggle="modal" data-target="#edit">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button @if(Auth::user()->type=='pegawai') class="hide" @endif href="#" class="btn btn-sm btn-danger btn-hapus" data-user-id={{$u->id}}>
                                        <i class="fa fa-trash"></i>
                                    </button></td>
                                @php($no++)
                            </tr>
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
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body modal-lg">
                    <form style="width: 40em" method="post" action="{{route('update_user')}}">
                        {{ csrf_field() }}
                        <div class="modal-body modal-lg">
                            <input type="hidden" name="user_id" id="userid" value="">
                            <label>Nama</label>
                            <input class="form-control" name="nama" id="nama" required>
                            <label>Username</label>
                            <input class="form-control" name="username" id="username" required>
                            <label>password</label>
                            <input class="form-control" name="password" id="password" type="password" required>
                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
      $(function () {
        $(function () {
          $('#datatable-user').DataTable({
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
        var userId = $(this).attr("data-user-id");
        swal({
          title: "Are you sure?",
          text: "Are you sure that you want to delete this User",
          type: "warning",
          showCancelButton: true,
          closeOnConfirm: false,
          confirmButtonText: "Yes, delete it!",
          confirmButtonColor: "#ec6c62"
        }).then(function (result) {
          if (result.value) {
            $.ajax({
              url: "{{url('api/delete/user/')}}"+"/"+userId,
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
        var username = button.data('username')
        var userid = button.data('userid')
        var modal = $(this)

        modal.find('.modal-body #nama').val(nama);
        modal.find('.modal-body #username').val(username);
        modal.find('.modal-body #userid').val(userid);
      })
    </script>
@endsection