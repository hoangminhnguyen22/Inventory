<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:users',
            'name' => 'required',
            'phone' => 'required|unique:users',
            'password' => 'required',
            're-password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'không để trống email',
            'email.unique'=>'email đã tồn tại',
            'name.required' => 'không để trống tên',            
            'phone.required' => 'không để trống số điện thoai',
            'phone.unique'=>'số điện thoại đã tồn tại',
            'password.required' => 'không để trống mật khẩu',
            're-password.required' => 'vui lòng nhập lại mật khẩu',
            're-password.same' => 'mật khẩu không giống nhau',
        ];
    }
}
