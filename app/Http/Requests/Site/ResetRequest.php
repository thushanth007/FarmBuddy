<?php namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest {

    public function rules()
    {
        return [
            'password' => 'required | min:5 | same:confirm_password',
            'confirm_password' => 'required',
        ];
    }

    public function messages()
    {
        return [

        ];
    }

    public function authorize()
    {
        return true;
    }
}
