<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\StudentController;

class Student extends Model
{
    protected $table = 'student_details';

    protected $fillable = [
              "enrollment_number",
              "name", 
              "birth_date", 
              "gender", 
              "contact", 
              "email", 
              "school_name", 
              "board", 
              "passing_year", 
              "cgpa", 
              "course_applied", 
              "department", 
              "duration", 
              "admission_cate", 
              "passport_image", 
              "marksheet_image", 
              "payment", 
              "payment_type", 
              "payment_date"];

}
