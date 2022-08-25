<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
            'title' => 'required|unique:coupons',
            'amount' => 'required',
            'price' => 'required',
            'condition' => 'required',
            'day_start' => 'required',
            'day_end' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Mã không được để trống',
            'title.unique' => 'Mã trùng',
            'amount.required' => 'Không được để trống',
            'price.required' => 'Không được để trống',
            'condition.required' => 'Không được để trống',
            'day_start.required' => 'Không được để trống',
            'day_end.required' => 'Không được để trống',

        ];
    }
}
