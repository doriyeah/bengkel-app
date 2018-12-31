<div id="modal-barang" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form style="width: 40em" method="post" action="{{route('post_barang')}}">
                {{ csrf_field() }}
                <div class="modal-body modal-lg">
                    <label>Nama Barang</label>
                    <input class="form-control" name="nama" required>
                    <label>Tahun</label>
                    <input class="form-control" name="tahun" required>
                    <label>Harga</label>
                    <input class="form-control" name="harga" required>
                    <label>Stock</label>
                    <input class="form-control" name="stok" required>
                    <label>Category</label>
                    @php($category = \App\Category::all())
                    <select class="form-control js-selectize-barang" multiple name="category_id[]" required>
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

