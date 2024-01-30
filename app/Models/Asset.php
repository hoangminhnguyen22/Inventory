<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use App\Models\Purchase;
use App\Models\Manufactorer;

class Asset extends Model
{
    use HasFactory;
    
    protected $table = 'assets';
    protected $fillable = ['id', 'code', 'location_id', 'name', 'category_id', 'condition', 'purchase_id', 'price', 'note'];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function purchase(): BelongsTo
    {
        return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
    }

    public function manufactorer()                          // không inverse được (dùng has many through manufactorer 
    {                                                       // trỏ xa tới assets thì được nhưng không biết ngược lại)
        $purchase = Purchase::find($this->purchase_id);
        return Manufactorer::find($purchase->id);
    }

    // public function manufactorer(): HasOneThrough
    // {
    //     return $this->hasOneThrough(
    //         manufactorer::class,
    //         Purchase::class,
    //         'Manufactory_id', // Foreign key on the cars table...
    //         'Purchase_id', // Foreign key on the owners table...
    //         'id', // Local key on the mechanics table...
    //         'id' // Local key on the cars table...
    //     );
    // }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $data = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
