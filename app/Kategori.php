<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table ='kategoris';
    protected $fillable =['nama_kategori','deskripsi','id_produk'];

    public function produk(){
        return $this->belongsTo(Produk::class,'id_produk');
    }
}
