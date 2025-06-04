<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\AdminController;

class PopularCourse extends Model
{
        protected $table='popular_course';
        protected $fillable=['title', 'image', 'instructor', 'duration', 'students'];
}
