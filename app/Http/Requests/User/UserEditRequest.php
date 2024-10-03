<?php namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest {

    public function rules()
    {
        return [
            'first_name' => 'required | min:3',
            'last_name' => 'required | min:3',
            'email' => 'required | email',
            'phone' => 'required',
            'street' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }

    public function authorize()
    {
        return true;
    }
}
