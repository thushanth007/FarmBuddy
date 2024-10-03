<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest {

    public function rules()
    {
        return [
            'category_id' => 'required',
            'name' => 'required|min:3',
            'section' => 'required',
            'unit' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image_1' => 'required',
            'information' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}