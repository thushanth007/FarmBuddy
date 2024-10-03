<?php namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class SellerRegisterRequest extends FormRequest {

    public function rules()
    {
        return [
            'farm_name' => 'required | min:3',
            'first_name' => 'required | min:3',
            'last_name' => 'required | min:3',
            'email' => 'required | email | unique:admins',
            'password' => 'required | min:5',
            'phone' => 'required',
            'category_id' => 'required',
            'street' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
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
