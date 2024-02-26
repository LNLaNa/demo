<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function performances(): BelongsToMany
    {
        return $this->belongsToMany(Performance::class, 'genre_performance');
    }
}
