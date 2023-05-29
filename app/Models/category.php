<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'color',
    ];

    public function InternamlInvetation(): HasMany
    {
        return $this->hasMany(InternamlInvetation::class);
    }
}
