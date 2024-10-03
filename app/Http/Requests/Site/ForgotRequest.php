<?php namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ForgotRequest extends FormRequest {

    public function rules()
    {
        return [
            'email' => 'required|email',
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
