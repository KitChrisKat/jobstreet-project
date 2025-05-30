<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Events\Registered;

class User extends Authenticatable
{
    protected $fillable = [
        'role',
        'name',
        'email',
        'password',
        'status',
        'company_name',
        'location',
        // add other fields as needed
    ];
}
