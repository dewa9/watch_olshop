<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'kode_produk'=>'required|unique:tabel_produk',
            'id_merek' =>'required',
            'nama_produk'=>'required',
            'harga' => 'required|numeric',
            'gambar1'=>'required',
            'gambar2'=>'required',
            'gambar3'=>'required',
            'deskripsi'=>'required'

        ];
    }

    public function messages()
    {
        return[
        //
        'kode_produk.required'=>'mohon diisi!',
        'kode_produk.unique'=>'kode sudah ada!',
        'id_merek.required'=>'mohon diisi!',
        'nama_produk.required'=>'mohon diisi!',
        'harga.required'=>'mohon diisi!',
        'harga.numeric'=>'harus angka!',
        'gambar1.required'=>'mohon diisi!',
        'gambar2.required'=>'mohon diisi!',
        'gambar3.required'=>'mohon diisi!',
        'deskripsi.required'=>'mohon diisi!'
        ];
    }
}
