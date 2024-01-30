<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'code' => $this->code,
                'id' => $this->id,
                'name' => $this->name,
                'location' => $this->location->name,
                'category' => $this->category->name,
                'condition' => $this->condition,
                'purchase' => [
                    'date' =>$this->purchase->date,
                    'serial' =>$this->purchase->serial,
                    'warrranty' =>$this->purchase->warranty,
                    'supplier' =>$this->purchase->supplier->name,
                    'model' =>$this->purchase->modelAsset->name,
                    'manufactorer' =>$this->purchase->manufactorer->name,
                ],
                'price' => $this->price,
                'note' => $this->note,
        ];
    }
}
