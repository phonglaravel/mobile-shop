<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentBlogRequest extends FormRequest
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
            'email'=>'required|email',
            'comment'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Không được để trống',
            'email.email'=>'Sai định dạng email',
            'email.required'=>'Không được để trống',
            'comment.required'=>'Không được để trống'
        ];
    }
}
