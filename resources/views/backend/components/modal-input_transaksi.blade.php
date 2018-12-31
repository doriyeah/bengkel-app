

<div id="modal-transaksi" class="modal fade" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title">Input Transaksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form method="post" action="{{route('post_laporan')}}" id="transaksi">
                {{ csrf_field() }}
                <div class="col-md-12">
                    <label>Jenis Transaksi</label>
                    <select class="form-control js-selectize-transaksi input-sm" name="jenis" id="jenis">
                        @if(Auth::user()->type=='admin')
                            <option value="Barang Masuk">Barang Masuk</option>
                            <option value="Barang Keluar">Barang Keluar</option>
                        @endif
                        <option>Barang Keluar</option>
                    </select>
                </div>
                <div class="modal-body modal-lg" >
                    <div class="row increment ">
                        <div class="col-md-4 barang">
                            @php($barang = \App\Barang::all())
                            <label>Nama Barang</label>
                            <select class="form-control combobox barang-id" id="barang_id_0" name="barang_id[]" required>
                                @foreach($barang as $b)
                                    <option></option>
                                    <option value="{{$b->id}}">{{$b->nama}} ({{$b->tahun}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1 jumlah">
                            <label>Jumlah</label>
                            <input class="form-control input-jumlah" type="text" id="jumlah_0" name="jumlah[]" required>
                        </div>
                        <div class="col-md-2 harga">
                            <label>Harga</label>
                            <input class="form-control input-harga" readonly id="harga_0" value="" name="total[]" type="text" required>
                        </div>
                        <div class="col-md-2 total">
                            <label>Total</label>
                            <input class="form-control input-total" readonly id="total_0" value="" name="input_total[]" type="text" required>
                        </div>

                        <div class="col-md-1 stok-lama">
                            <label class="small">Stok Lama</label>
                            <input class="form-control input-stoklama" readonly id="stok_lama_0" name="stok_lama[]" type="text" required>
                        </div>
                        <div class="col-md-1 stok-baru">
                            <label class="small">Stok Baru</label>
                            <input class="form-control input-stok" readonly id="stok_baru_0" name="stok_baru[]" type="text" required>
                        </div>

                        <div class="col-md-1 action">
                            <label>Action</label>
                            <button class="btn btn-success" type="button" id="add"><i class="fa fa-plus"></i></button>
                        </div>


                    </div>




                    {{--Clone Transaksi--}}
                    {{--<div class="clone hide">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-5">--}}
                                {{--@php($barang = \App\Barang::all())--}}
                                {{--<label>Nama Barang</label>--}}
                                {{--<select class="form-control combobox" id="barang_id" name="barang_id[]" required>--}}
                                    {{--@foreach($barang as $b)--}}
                                        {{--<option></option>--}}
                                        {{--<option value="{{$b->id}}">{{$b->nama}} ({{$b->tahun}})</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-1">--}}
                                {{--<label>Jumlah</label>--}}
                                {{--<input class="form-control jumlah" type="text" id="jumlah" name="jumlah[]" required>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-2">--}}
                                {{--<label>Harga</label>--}}
                                {{--<input class="form-control total" readonly id="harga" value="" name="total[]" type="text" required>--}}
                            {{--</div>--}}

                            {{--<div class="col-md-2">--}}
                                {{--<label>Stok Lama</label>--}}
                                {{--<input class="form-control stok_lama" readonly id="stok_lama_transaksi" name="stok_lama[]" type="text" required>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-1">--}}
                                {{--<label>Stok</label>--}}
                                {{--<input class="form-control stok_baru" readonly id="stok_baru_transaksi" name="stok_baru[]" type="text" required>--}}
                            {{--</div>--}}

                            {{--<div class="col-md-1">--}}
                                {{--<label>Action</label>--}}
                                {{--<button class="btn btn-danger remove" type="button"><i class="fa fa-close"></i></button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                    <hr>
                    <div class="row">
                        <div class="col-md-8" style="text-align: right">
                            <h3 id="">Total </h3>
                        </div>
                        <div class="col-md-3">
                            <h3 id="total-transaksi">: 0</h3>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>
