<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\AdminController;

class Admin extends Model
{
    protected $table='admin';
    protected $fillable=['fullname', 'email', 'phone', 'username', 'password', 'profile'];
}
