<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Laporan;
use Illuminate\Http\Request;
use PDF;
use DB;
use View;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(){

        $laporan = Laporan::distinct('invoice')->get();
        return view('backend.contents.laporan-list', compact('laporan'));
    }

    public function masuk(){
        return view('backend.contents.laporan-masuk');
    }

    public function keluar(){
        return view('backend.contents.laporan-keluar');
    }

    public function store(Request $request){

        $i=0;
        $invoice = Carbon::now()->format('Y-m-d-').str_random(4);
        foreach ($request['barang_id'] as $barang){
        $laporan = new Laporan($request->only(
            'jenis'));
           $laporan->jumlah = $request['jumlah'][$i];
           $laporan->barang_id = $barang;
           $laporan->user_id = \Auth::id();
           $laporan->stok_lama = $request['stok_lama'][$i];
           $laporan->stok_baru = $request['stok_baru'][$i];
           $laporan->invoice = $invoice;
           $laporan->save();


            $stok_barang = Barang::where('id',$request['barang_id'][$i])->first();
            $stok_barang->stok = $request['stok_baru'][$i];
            $stok_barang->save();
           $i++;
        }



        return redirect()->back();
    }


    public  function apiDelete($invoice){
        $laporan = Laporan::where('invoice',$invoice)->get();
        foreach ($laporan as $l){
            $l->delete();
        }
        return response()->json(['succes' => true],200 );
    }

    public function createPDF($invoice){
        $tanggal = Carbon::now()->format('Y-m-d H:i:s');
        $laporan = Laporan::where('invoice',$invoice)->get();
        $pdf = PDF::loadView('pdf-laporan', compact('laporan'))->setPaper('a4');
        $pdf->setIsRemoteEnable = true;
        ini_set('max_execution_time',5400);
        ini_set('memory_limit','10000M');
        return $pdf->stream($tanggal.'-laporan.pdf');
    }
}
