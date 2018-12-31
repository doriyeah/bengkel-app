<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
    {{--<link rel="stylesheet" href="{{public_path('assets/bootstrap/css/bootstrap.css')}}">--}}
    <style type="text/css">

        p{
            font-size: 11px;
        }
        .header{
            margin-left: 6em;
            margin-top: -1em;
        }

        .text-header{
            color: #0d6aad;
            text-align: center;
            margin-bottom: -15px;
        }

        .keterangan{
            text-align: center;

        }
        .border{
            border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;
        }

        .allcaps{
            text-transform: uppercase;
        }

        table{
            text-transform: capitalize;
        }
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
        .tg table{border: 1px solid black;}
        .tg td{font-family:Arial;font-size:14px;padding:2px 1px 2px 10px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
        .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
        .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}


    </style>
</head>
<body>
<div class="logo allcaps" style="width:50%; position: absolute;">
    <img src="{{public_path('assets/img/logo.png')}}">
</div>

<div class="header allcaps" >
    <h1 class="text-header">CV BAMBANG MOTOR</h1>
    <div class="keterangan">
        <h4>jual sparepart mobil</h4>
        <p>jalan raya ciputat parung (bojongsari) <br>
            Kec. Bojongsari - Depok <br>
            Telp.(0251)8617405 / HP.081310911006<br></p>
    </div>
</div>
<hr>


<div style="text-align: left; margin-left: 70%">
    <p style="font-size: 15px; text-transform: uppercase;">Laporan : {{$laporan[0]->jenis}}</p>
    <p style="font-size: 15px; text-transform: uppercase;">Tanggal :  {{$laporan[0]->created_at
    ->format('d-m-Y')}}</p>
</div>

<div style="text-align: left; margin-top: -100px">
    <p style="font-size: 15px; text-transform: uppercase;">Invoice &nbsp;&nbsp;&nbsp;:
        {{$laporan[0]->invoice}}</p>
    <p style="font-size: 15px;text-transform: uppercase">Pembuat : {{$laporan[0]->user->username}}</p>

</div>

<br>

<table class="tg">

    <thead>
    <tr class="small">
        <th>Nama Barang</th>
        <th>Tahun</th>
        <th>Harga</th>
        <th style="font-size: 11px">jumlah</th>
        <th style="font-size: 11px">Stok Awal</th>
        <th>Stok</th>
        <th>Total</th>

    </tr>
    </thead>
    <tbody>
    @php
    $count = count($laporan);
    $i = 0;
    @endphp
    @foreach($laporan as $l)
    <tr>
        {{--<td>{{$l->created_at->format('d-m-Y')}}</td>--}}
        @foreach($l->barang as $lb)
        <td>{{$lb->nama}}</td>
        <td>{{$lb->tahun}}</td>
        <td>{{number_format($x = $lb->harga,0,',','.')}}</td>
        @endforeach
        <td>{{$l->jumlah}}</td>
        <td>{{$l->stok_lama}}</td>
        <td>{{$l->stok_baru}}</td>
        <td>{{number_format($total[$i] = $l->jumlah*$x,0,',','.')}}</td>
        @php
        $i++
        @endphp
    </tr>
    @endforeach
    <tr>
        <td> </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Total :</td>
        <td>{{number_format(array_sum($total),0,',','.')}}</td>
    </tr>
    </tbody>

</table>



{{--<script src="{{public_path('assets/lib/jquery/jquery.js')}}"></script>--}}
{{--<script src="{{public_path('assets/bootstrap/js/bootstrap.js')}}"></script>--}}
</body>
</html>