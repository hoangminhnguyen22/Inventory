<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manufactorer extends Model
{
    use HasFactory;

    protected $table = 'manufactorers';
    protected $fillable = ['id', 'name'];

    public function assets(): HasManyThrough
    {
        return $this->hasManyThrough(
            Asset::class,               // class xa
            Purchase::class,            // class trung gian
            'manufactorer_id',          // khóa ngoại trung gian
            'purchase_id',              // khóa ngoại xa
            'id',                       // khóa chính hiện tại
            'id'                        // khóa chính trung gian
        );            // chưa xác định
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class, 'manufactorer_id', 'id');            // chưa xác định
    }
}
