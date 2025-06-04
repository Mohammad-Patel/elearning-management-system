<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CourseController;

class Course extends Model
{
    protected $table='course_details';
    protected $fillable=['c_id', 'name', 'duration', 'fees', 'description'];
}
