<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'department_id', 'note'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'location_id', 'id');            // chưa xác định
    }

    // cái nào có khóa ngoại cái đó thuộc về cái kia
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');          // chưa xác định
    }

    //them localSerach
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $data = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
