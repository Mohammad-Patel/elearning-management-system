<?php

// app/Models/Login.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{
    use HasFactory;

    protected $table = 'login'; // 👈 if your table is named 'login'

    protected $fillable = [
        'name', 'email', 'phone', 'dob', 'address', 'password', 'user_type'
    ];
}
