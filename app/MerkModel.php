<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerkModel extends Model
{
    //
    public $timestamps = false;
    protected $table ='tabel_merek';
     protected $fillable = array('merek');

}
