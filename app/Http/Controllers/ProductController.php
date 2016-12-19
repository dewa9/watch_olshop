<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductImagerequest;
use App\ProductModel;
use App\MerkModel;
use Datatables;
use App\Http\Requests;
class ProductController extends Controller
{
    //
    public function add()
    {
    	$arrmerk = MerkModel::pluck('merek', 'id');

      $arrgender = array();
      $arrgender['1']='Men';
      $arrgender['0']='Women';
    	return view('product.add',['arrmerk'=>$arrmerk,'arrgender'=>$arrgender]);
    }

       public function store(ProductRequest $request)
       {
       		$stat=0;
          $id=0;
          
       		$action = ProductModel::create(['kode_produk'=>$request->input('kode_produk'),
       			'id_merek'=>$request->input('id_merek'),
       			'nama_produk'=>$request->input('nama_produk'),
       			'harga'=>$request->input('harga'),
       			'deskripsi'=>$request->input('deskripsi')
            ]);
            if($action)
            {
            	$stat=1;
            	$id=$action->id;
            }
            return response()->json(['return'=>$stat,'id'=>$id]);
       }

       public function storeImage(Request $request)
       {
          $id = $request->input('id-produks');
          $models = ProductModel::where('id',$id)->first();

          $imgpath1 = $request->file('gambar1');
          $img_data1 = file_get_contents($imgpath1);
          $first_base64 = base64_encode($img_data1);

          $imgpath2 = $request->file('gambar2');
          $img_data2 = file_get_contents($imgpath2);
          $second_base64 = base64_encode($img_data2);

          $imgpath3 = $request->file('gambar3');
          $img_data3 = file_get_contents($imgpath3);
          $third_base64 = base64_encode($img_data3);

          $models->gambar1 = $first_base64;
          $models->gambar2 = $second_base64;
          $models->gambar3 = $third_base64;
          $execute = $models->save();
          if($execute){
            return Redirect::back();
          }
       }
}
