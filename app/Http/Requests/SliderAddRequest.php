<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:sliders|max:255',
            'description' => 'required',
            'image_path' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Tên không được phép trống!',
            'description.required' =>'Tên không được phép trống!',
            'image_path.required' =>' không được phép trống!',
            'name.unique' =>'Tên không được phép trùng!',
            'name.max' =>'Độ dài tên vượt quá 255 ký tự!',
        ];
    }
}