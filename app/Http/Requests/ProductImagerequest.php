<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProductImagerequest extends FormRequest
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
        'id-produks'=>'required',
        'gambar1'=>'required',
        'gambar2' => 'required',
        'gambar3'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'gambar1.required'=>'mohon diisi !',
            'gambar2.required'=>'mohon diisi !',
            'gambar3.required'=>'mohon diisi !'
        ];
    }
}
