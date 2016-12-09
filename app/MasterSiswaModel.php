<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterSiswaModel extends Model
{
    //
    public $timestamps = false;
    protected $table='mastersiswa';
    protected $fillable = array('nis', 'nama', 'alamat');


}

