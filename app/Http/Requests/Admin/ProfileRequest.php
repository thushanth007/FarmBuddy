<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest {

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'email | required',
            'password' => 'required_with:password_confirmation|string|confirmed',
            'password_confirmation' => 'required',
            'image' => 'mimes:jpeg,jpg,png|dimensions:max_width=250,max_height=250',
        ];
    }

    public function messages() {
        return [
            'image.dimensions' => 'The image upload size should (250 x 250)px',
        ];
    }

    public function authorize()
    {
        return true;
    }
}