<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;


class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $fillable = ['id', 'name'];

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class, 'supplier_id', 'id');
    }

    public function assets(): HasManyThrough
    {
        return $this->hasManyThrough(
            Asset::class,               // class xa
            Purchase::class,            // class trung gian
            'supplier_id',          // khóa ngoại trung gian
            'purchase_id',              // khóa ngoại xa
            'id',                       // khóa chính hiện tại
            'id'                        // khóa chính trung gian
        );            // chưa xác định
    }
}
