<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SpesificationRequest;
use App\Http\Requests;
use App\SpesificationModel;
//use Datatables;
class SpesificationController extends Controller
{
    //
    public function store(Request $request)
    {
    	$stat=0;
          
       		$action = SpesificationModel::create(
       			[
       			'id_produk'=>$request->input('id_produk'),
       			'series'=>$request->input('series'),
       			'gender'=>$request->input('gender'),
       			'garansi_produk'=>$request->input('garansi_produk'),
       			'case_diameter'=>$request->input('case_diameter'),
       			'case_thickness'=>$request->input('case_thickness'),
       			'water_resistant'=>$request->input('water_resistant'),
       			'case_material'=>$request->input('case_material'),
       			'case_back'=>$request->input('case_back'),
       			'glass_material'=>$request->input('glass_material'),
       			'strap_material'=>$request->input('strap_material'),
       			'clasp'=>$request->input('clasp'),
       			'calendar'=>$request->input('calendar'),
       			'driving_system'=>$request->input('driving_system'),
       			'caliber_number'=>$request->input('caliber_number'),
       			'case'=>$request->input('case'),
       			'case_coating'=>$request->input('case_coating'),
       			'lumibright'=>$request->input('lumibright'),
       			'accuracy'=>$request->input('accuracy'),
       			'magnetic_reluctance'=>$request->input('magnetic_reluctance'),
       			'luminious_lumibrite'=>$request->input('luminious_lumibrite'),
       			'movement'=>$request->input('movement'),
       			'dial_color'=>$request->input('dial_color'),
       			'bracelet'=>$request->input('bracelet'),
       			'features'=>$request->input('features'),
       			'weight_after_packing'=>$request->input('weight_after_packing'),
       			'inside_box'=>$request->input('inside_box'),
            ]);
            if($action)
            {
            	$stat=1;
            }
            return response()->json(['return'=>$stat,'id'=>$request->input('id_produk')]);
    }

    public function update(Request $request)
    {

          $model = SpesificationModel::findOrFail($request->get('pk'));
          $name = $request->get('name');
          $value =$request->get('value');
          $model->$name = $value;
          $model->save();
    }
}
