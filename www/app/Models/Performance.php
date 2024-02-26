<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Performance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'genre_performances');
    }
    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class,'cart_performances')->withPivot(['count','price','sum']);//->withPivot(['count','price','sum'])
    }
}
