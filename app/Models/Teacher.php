<?php

namespace App\Models;

use App\Http\Controllers\TeacherController;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table='teacher_details';
    protected $fillable=["name", "email", "phone", "passport_image", "qualification", "subject", "experience", "message"];
}
