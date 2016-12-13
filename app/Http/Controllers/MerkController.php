<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MerkRequest;
use App\MerkModel;
use Datatables;
class MerkController extends Controller
{
    //

     /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function add()
    {
    	return view('merk.add');
    }

    public function store(MerkRequest $request)
    {
    	$stat=0;
        $id=$request->input('id');
        $action ='';
        if($id>0)
        {
            $model=MerkModel::find($id);
            $model->merek = $request->input('merek');
            $action=$model->save();
        }else
        {
            $action = MerkModel::create([
                'merek'=>$request->input('merek')
            ]);
        }
    	
        if($action){
            $stat=1;
        }
    	return response()->json(['return'=>$stat]);
    }

    public function show()
    {
        $getData = MerkModel::select(['id','merek']);
        return Datatables::of($getData)->make(true);
    }

    public function delete(Request $request)
    {
        $stat=0;
        $term = $request->get('id');
        if((MerkModel::destroy($term)))
        {
            $stat=1;
        }
        return response()->json(['return'=>$stat]);
    }
}
