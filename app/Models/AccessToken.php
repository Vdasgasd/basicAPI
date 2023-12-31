<?php // app/Models/AccessToken.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessToken extends Model
{
    protected $table = 'oauth_access_tokens';

    protected $fillable = [
        'id',
        'user_id',
        'client_id',
        'scopes',
        'revoked',
        'expires_at',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'revoked' => 'boolean',
        'expires_at' => 'datetime',
    ];
}
