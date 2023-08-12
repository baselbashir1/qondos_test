<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // protected $guard = 'client';
    protected $fillable = ['name', 'email', 'phone', 'city', 'password'];
}
