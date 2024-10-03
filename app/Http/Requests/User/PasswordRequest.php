<?php namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest {

    public function rules()
    {
        return [
          
            'old_password' => 'required',
            'new_password' => 'required | min:5 | same:confirm_password',
            'confirm_password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            
            'old_password.required' => 'Fill the old password',
            'new_password.required' => 'Fill the new password',
            'confirm_password.required' => 'Fill the confirm password',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
