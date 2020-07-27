<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name'    => 'bail|required|min:5|max:255|unique:products',
            'price' => 'required|numeric',
            'content' => 'required',
            'category_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'    => 'Tên không được để trống!',
            'name.unique'      => 'Tên không được phép trùng!',
            'name.min'         => 'Tên ít nhất phải chứa 5 ký tự',
            'name.max'         => 'Tên vượt quá phạm vi cho phép',
            'price.required'   => 'Giá không được để trống!',
            'price.numeric'   => 'Hãy nhập số cho giá sản phẩm!',
            'content.required' => 'Nội dung không được phép trống!',
            'category_id.required' => 'Bạn hãy chọn danh mục sản phẩm!'
        ];
    }
}
