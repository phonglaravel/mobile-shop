<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCateRequest extends FormRequest
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
            'category_id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Không được để trống',
            'category_id.required'=>'Không được để trống'
        ];
    }

}
