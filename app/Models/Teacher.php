<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    protected $guarded = false;

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
