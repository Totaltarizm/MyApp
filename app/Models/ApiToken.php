<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class ApiToken extends Model {
        protected function casts()
        {
        return [
        'expires_at' => 'datetime',
        ];
        }
    }
