<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','barang_id','jenis','jumlah','stok_lama','stok_baru','invoice'];

    public function Barang(){
        return $this->hasMany(Barang::class,'id','barang_id');
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
