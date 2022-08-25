<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address1'=>'required',
            'tinh'=>'required',
            'huyen'=>'required',
            'payment'=>'required',
            

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Không được để trống',
            'email.required'=>'Không được để trống',
            'phone.required'=>'Không được để trống',
            'address1.required'=>'Không được để trống',
            'tinh.required'=>'Không được để trống',
            'huyen.required'=>'Không được để trống',
            'payment.required'=>'Không được để trống',
            

        ];
    }
}
