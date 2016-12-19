<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class SpesificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'series'=>'required',
            'gender'=>'required',
            'garansi_produk'=>'required',
            'case_diameter'=>'required',
            'case_thickness'=>'required',
            'glass_material'=>'required',
            'strap_material'=>'required',
            'caliber_number'=>'required',
            'movement'=>'required',
            'weight_after_packing'=>'required',
            'inside_box'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'series.required'=>'mohon diisi !',
            'gender.required'=>'mohon diisi !',
            'garansi_produk.required'=>'mohon diisi !',
            'case_diameter.required'=>'mohon diisi !',
            'case_thickness.required'=>'mohon diisi !',
            'glass_material.required'=>'mohon diisi !',
            'strap_material.required'=>'mohon diisi !',
            'caliber_number.required'=>'mohon diisi !',
            'movement.required'=>'mohon diisi !',
            'weight_after_packing.required'=>'mohon diisi !',
            'inside_box.required'=>'mohon diisi !',
        ];
    }
}
