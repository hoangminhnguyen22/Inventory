<?php

namespace App\Http\Requests\Asset;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssetRequest extends FormRequest
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
            //asset
            'code' => 'required|unique:assets,code,'.$this->asset->id,
            'name' => 'required',
            'location_id' => 'required',
            'category_id' => 'required',
            'condition' => 'required',
            'price' => 'required',

            //purchase
            'serial' => 'required|unique:purchases,serial,'.$this->asset->purchase_id,
            'date' => 'required',
            'warranty' => 'required',            
            'supplier_id' => 'required',
            'manufactorer_id' => 'required',
            'model_id' => 'required',

            //image
            // 'image_upload' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //asset
            'code.required' => 'không để trống code',
            'code.unique'=>'code đã tồn tại',
            'name.required' => 'không để trống tên',            
            'location_id.required' => 'Vui lòng chọn Location',
            'category_id.required' => 'Vui lòng chọn Category',
            'condition.required' => 'Vui lòng chọn Condition',
            'price.required' => 'Không để trống Price',

            //purchase
            'serial.required' => 'không để trống serial',
            'serial.unique'=>'serial đã tồn tại',
            'date.required' => 'Vui lòng chọn ngày',            
            'warranty.required' => 'không để trống thời gian bảo hành',            
            'supplier_id.required' => 'Vui lòng chọn nhà cungg cấp',
            'manufactorer_id.required' => 'Vui lòng chọn nhà sản xuất',
            'model_id.required' => 'Vui lòng chọn Model',

            //image
            // 'image_upload.required' => 'Vui lòng chọn ảnh',

        ];
    }

    public function purchase()
    {
        $purchase = [
            'date' => $this->date,
            'serial' => $this->serial,
            'warranty' => $this->warranty,
            'supplier_id' => $this->supplier_id,
            'manufactorer_id' => $this->manufactorer_id,
            'model_id' => $this->model_id,
        ];

        $asset = [
            'code' => $this->code,
            'name' => $this->name,
            'location_id' => $this->location_id,            
            'category_id' => $this->category_id,            
            'condition' => $this->condition,         
            'price' => $this->price,            
            'note' => $this->note,            
        ];
        return [
            'purchase' => $purchase,
            'asset' => $asset,
        ];
    }
}
