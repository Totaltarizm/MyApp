<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiToken extends Model
{

    protected $guarded = false;
    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
        ];
    }

    public static function generateToken(): string
    {
        return Str::random(60);
    }

}
