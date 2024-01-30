<?php

namespace App\Http\Requests\Location;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLocationRequest extends FormRequest
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
            'name' => 'required',
            'note' => 'required',
            'department_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không để trống tên',            
            'note.required' => 'Không để trống ghi chú',
            'department_id.required' => 'Vui lòng chọn phòng ban',
        ];
    }
}
