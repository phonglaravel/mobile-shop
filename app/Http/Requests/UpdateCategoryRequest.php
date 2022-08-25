<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'title'=>'unique:categories,title,'.$this->category->id,
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Vui lòng nhập tên',
            'title.unique'=>'Tên đã trùng',
        ];
    }
}
