<?php namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {

    public function rules()
    {
        return [
            'first_name' => 'required | min:3',
            'last_name' => 'required | min:3',
            'email' => 'required | email | unique:admins',
            'password' => 'required | min:5',
            'phone' => 'required',
            'street' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'is_agreed' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'is_agreed.required' => 'The field is required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
