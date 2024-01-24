<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';
    protected $fillable = ['id', 'date', 'manufactorer_id', 'serial', 'model_id', 'warranty', 'supplier_id'];

    public function manufactorer(): BelongsTo
    {
        return $this->belongsTo(Manufactorer::class, 'manufactorer_id', 'id');
    }

    public function modelAsset(): BelongsTo
    {
        return $this->belongsTo(ModelAsset::class, 'model_id', 'id');
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
      
}
