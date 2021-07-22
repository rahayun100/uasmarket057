<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //

    protected $table ='produks';
    protected $fillable = ['nama_produk','stok','deskripsi','harga','id_kategori'];

    
public function kategori(){
    return $this->belongsTo(Kategori::class,'id_kategori');
}
}
