<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title'=>'required',
            'tinhtrang'=>'required',
            'bosanpham'=>'required',
            'baohanh'=>'required',
            'goibaohanh'=>'required',
            'description'=>'required',
            'kithuat'=>'required',
            
            

        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Không được để trống',
            'tinhtrang.required'=>'Không được để trống',
            'bosanpham.required'=>'Không được để trống',
            'baohanh.required'=>'Không được để trống',
            'goibaohanh.required'=>'Không được để trống',
            'description.required'=>'Không được để trống',
            'kithuat.required'=>'Không được để trống',
            
            
        ];
    }
}
