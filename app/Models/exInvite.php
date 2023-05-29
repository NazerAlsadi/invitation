<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class exInvite extends Model
{
    use HasFactory;
    protected $fillable = ['prefix_id','fullName',
                           'email','mobile','company',
                           'jobfunction','status_id'];

    public function prefix(): BelongsTo
    {
        return $this->belongsTo(prefix::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(status::class);
    }
}
