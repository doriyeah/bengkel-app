<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','tahun','harga','stok'];


    public function Category(){
        return $this->belongsToMany(Category::class,'category_barang')
            ->withPivot('category_id','barang_id')->withTimestamps();
    }

    public function Laporan(){
        return $this->belongsTo(Laporan::class,'id');
    }
}
