<?php namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest {

    public function rules()
    {
        return [
            'f_name' => 'required|min:3',
            'l_name' => 'required|min:3',
            'email' => 'required|email|min:3',
            'phone' => 'required',
            'message' => 'required|max:100'
        ];
    }

    public function messages()
    {
        return [
            'f_name.required' => 'The first name field is required.',
            'l_name.required' => 'The last name field is required.',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
