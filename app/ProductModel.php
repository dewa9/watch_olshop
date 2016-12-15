<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    //
    public $timestamps = false;
    protected $table='tabel_produk';
    protected $fillable = array('kode_produk',
    	'id_merek','nama_produk',
    	'harga','gambar1','gambar2',
    	'gambar3','deskripsi');
}
