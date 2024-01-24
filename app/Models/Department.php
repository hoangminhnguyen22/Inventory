<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $fillable = ['id', 'name', 'floor', 'unit', 'address', 'zipcode'];

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class, 'location_id', 'id');            // chưa xác định
    }
}
