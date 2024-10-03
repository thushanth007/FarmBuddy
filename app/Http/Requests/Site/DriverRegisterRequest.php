<?php namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class DriverRegisterRequest extends FormRequest {

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
            'license' => 'required',
            'vehicle_type' => 'required',
            'model' => 'required',
            'registration_number' => 'required',
            'bank_name' => 'required',
            'bank_account_number' => 'required',
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
