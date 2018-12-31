<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::all();
        return view('backend.contents.barang-list', compact('barang'));
    }

    public function store(Request $request){
        $barang = new Barang($request->only(
           'nama','tahun','harga','stok'
        ));
        $barang->save();
        $barang->Category()->sync($request->get('category_id'));
        return redirect()->route('index_barang');
    }

    public function destroy($id){
        $barang = Barang::findOrFail($id);
        $barang->delete();
        Session::put('success', 'Your Record Deleted Successfully.');
        return redirect()->route('index_barang');
    }


    public function update(Request $request){
        $barang = Barang::findOrFail($request->barang_id);
        $barang->update($request->all());
        $barang->Category()->sync($request['category_id']);
        return redirect()->back();
    }

    public  function apiDelete($id){
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return response()->json(['succes' => true],200 );
    }


}
