<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function performances(): BelongsToMany
    {
        return $this->belongsToMany(Performance::class,'cart_performances')->withPivot(['count','price','sum']);//->withPivot(['count','price','sum']);
    }

    public function order(): HasOne //hasMany
    {
        return $this->hasOne(Order::class);
    }
}
