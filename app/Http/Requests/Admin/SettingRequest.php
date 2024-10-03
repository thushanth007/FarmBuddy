<?php namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest {

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif',
        ];
    }

    public function authorize()
    {
        return true;
    }
}