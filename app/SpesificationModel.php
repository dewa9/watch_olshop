<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpesificationModel extends Model
{
    //
    public $timestamps = false;
    protected $table='tabel_spesifikasi';
    protected $fillable = array('id_produk',
    	'series','gender',
    	'garansi_produk','case_diameter','case_thickness',
    	'water_resistant','case_material','case_back','glass_material'
    	,'strap_material'
    	,'clasp'
    	,'calendar'
    	,'driving_system'
    	,'caliber_number'
    	,'case'
    	,'case_coating'
    	,'lumibright'
    	,'accuracy'
    	,'magnetic_reluctance'
    	,'luminious_lumibrite'
    	,'movement','dial_color'
    	,'bracelet'
    	,'features'
    	,'weight_after_packing','inside_box'
    	);
}
