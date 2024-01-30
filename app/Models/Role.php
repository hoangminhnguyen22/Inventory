<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Permission;
class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = ['id', 'name', 'permissions'];

    // public function users(): HasMany         //dungf many to many
    // {
    //     return $this->hasMany(User::class, 'role_id', 'id');            // chưa xác định
    // }

    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class);
    // }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $data = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
