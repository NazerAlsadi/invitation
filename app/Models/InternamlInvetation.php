<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InternamlInvetation extends Model
{
    use HasFactory;
    protected $fillable = ['prefix_id','fullName',
                           'email','mobile',
                           'category_id','email_verify'];

    public function prefix(): BelongsTo
    {
        return $this->belongsTo(prefix::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }
}
