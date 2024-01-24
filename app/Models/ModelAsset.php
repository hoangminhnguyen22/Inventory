<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class ModelAsset extends Model
{
    use HasFactory;
    protected $table = 'models';
    protected $fillable = ['id', 'name'];

    public function asset(): HasOneThrough
    {
        return $this->hasOneThrough(
            Asset::class,
            Purchase::class,
            'model_id',        
            'purchase_id',           
            'id',                  
            'id'                   
        );  
    }
}
