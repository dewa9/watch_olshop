<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\ProductModel;
use App\MerkModel;
use Datatables;
class ProductController extends Controller
{
    //
    public function add()
    {
    	$arrmerk = MerkModel::pluck('merek', 'id');
		$arrgender = array();
		$arrgender['1']='Male';
		$arrgender['0']='Female';
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
}
