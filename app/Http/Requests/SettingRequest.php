<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'config_key'    => 'required|max:255|unique:settings',
            'config_value'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'config_key.required'   => 'Không được phép trống!',
            'config_key.unique'     => 'Dữ liệu đã có trong hệ thống!',
            'config_value.required' => 'Không được phép trống!',
        ];
    }
}