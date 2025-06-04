<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();
            $table->string('enrollment_number')->unique(); // Unique Enrollment Number
            $table->string('name'); // ✅ "sname" ko "name" kar diya
            $table->date('birth_date'); // ✅ "Birth_date" ko "birth_date" kar diya
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('contact');
            $table->string('email');
            $table->string('school_name'); // ✅ "lastschool_name" ko "school_name" kar diya
            $table->string('board');
            $table->integer('passing_year');
            $table->integer('cgpa');
            $table->string('course_applied');
            $table->string('department');
            $table->integer('duration');
            $table->string('admission_cate');
            $table->string('passport_image');
            $table->string('marksheet_image');
            $table->integer('payment');
            $table->string('payment_type');
            $table->date('payment_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_details');
    }
};
