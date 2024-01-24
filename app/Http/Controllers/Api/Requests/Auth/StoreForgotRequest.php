<?php

namespace App\Http\Controllers\Api\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreForgotRequest extends FormRequest
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
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'không để trống Email',
        ];
    }
}
