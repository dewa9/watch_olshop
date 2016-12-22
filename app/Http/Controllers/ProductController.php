<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductImagerequest;
use App\ProductModel;
use App\MerkModel;
use Datatables;
use Illuminate\Support\Facades\Redirect;
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

       public function storeImage(ProductImagerequest $request)
       {
          $id = $request->input('id-produks');
          $models = ProductModel::where('id',$id)->first();

          $first_imgpath = $request->file('gambar1');
          $first_img_data = file_get_contents($first_imgpath);
          $first_base64 = base64_encode($first_img_data);

          $second_imgpath = $request->file('gambar2');
          $second_img_data = file_get_contents($second_imgpath);
          $second_base64 = base64_encode($second_img_data);

          $third_imgpath = $request->file('gambar3');
          $third_img_data = file_get_contents($third_imgpath);
          $third_base64 = base64_encode($third_img_data);

          $models->gambar1 = $first_base64;
          $models->gambar2 = $second_base64;
          $models->gambar3 = $third_base64;
          $execute = $models->save();
          if($execute){
            return Redirect::back();
          }
       }

       public function getDataProduct()
       {
          $getData = ProductModel::with(['relasi_merek' => function($query){
            $query->select();
          }])->select('id','id_merek','nama_produk','harga','kode_produk');
          return Datatables::of($getData)->make(true);
       }

       public function show()
       {
          return view('product.show');
       }

       public function delete($id)
       {
            $statreturn = 0;
            $model = new ProductModel;
            $data  = $model->find($id);
            $destroy = $data->delete();
            if($destroy){
              $statreturn = 1;
            }
            return response()->json(['return' => $statreturn]);
       }

       public function detail($id){
         $getData = ProductModel::with(['relasi_merek','relasi_spesifikasi'])->find($id)->get();
         return view('product.detail', ['datadetail'=>$getData]);
       }
}
