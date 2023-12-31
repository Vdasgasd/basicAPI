<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;


// class Account extends Model
// {
//     use HasApiTokens, HasFactory;
//     protected $fillable = ['username', 'password'];
// }

class Account extends Authenticatable
{
    use HasApiTokens, HasFactory;
    protected $fillable = ['username', 'password'];
    // ... other model code
}
