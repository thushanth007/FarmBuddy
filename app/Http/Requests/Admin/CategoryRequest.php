<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest {

    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'icon' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
