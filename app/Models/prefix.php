<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class prefix extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'languge',
    ];
    public function InternamlInvetation(): HasMany
    {
        return $this->hasMany(InternamlInvetation::class);
    }

    public function exInvite(): HasMany
    {
        return $this->hasMany(exInvite::class);
    }
}
