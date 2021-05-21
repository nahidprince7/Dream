<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|max:255',
//            'employee_code' => 'nullable|max:255|unique:users',
            'email' => 'email|max:255|unique:users',
            'gender' => 'required',
            'picture' => 'unique:users|mimes:jpeg,JPEG,JPG,jpg,png,PNG|max:1000',
//            'password' => 'required', 'string', 'min:6', 'confirmed',
            'password' => 'required|string|min:6|confirmed',
            'number' => 'required|min:9|max:11'
        ];
    }
}
