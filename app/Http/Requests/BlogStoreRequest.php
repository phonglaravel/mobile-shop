<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
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
            'title' => 'required|unique:blogs',
            'content' => 'required',
            'image'=> 'required',
            'loai' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Không được để trống',
            'content.required' => 'Không được để trống',
            'title.unique' => 'Tên trùng xin chọn lại',
            'image.required' => 'Không được để trống',
            'loai.required' => 'Không được để trống'
        ];
    }
}
