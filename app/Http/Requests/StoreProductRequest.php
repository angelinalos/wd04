<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'=> 'required|min:2',
            'category_id'=>'required|integer|min:0',
            'price'=>'required|integer|min:1',
            'description'=>'required|min:10',
            'picture'=>'mimes:jpg,png,bmp'
        ];
    }
}
