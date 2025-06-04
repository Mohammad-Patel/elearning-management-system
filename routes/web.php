<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DemoController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Review;
use App\Models\Admin; 
use App\Models\Login;
use App\Models\PopularCourse; 


Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'registerProcess'])->name('register.process');

Route::get('/editProfile/{id}', [RegisterController::class, 'editProfile'])->name('profile.edit');
Route::post('/regiprofile', [RegisterController::class, 'regiprofile'])->name('profile.update');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::get('add_student', [StudentController::class, 'add_student'])->name('add.student');
Route::post('save_student',[StudentController::class,'save_student'])->name('save');
Route::get('liststudent/{id}',[StudentController::class,'liststudent'])->name('xyz');
Route::get('student_print_admin/{id}',[StudentController::class,'student_print_admin']);
Route::get('student_print_user/{id}',[StudentController::class,'student_print_user']);
Route::get('student_description',[StudentController::class,'student_description'])->name('student_desc');
Route::get('update_student_admin/{id}',[StudentController::class,'update_student_admin']);
Route::post('edit_student_admin',[StudentController::class,'edit_student_admin']);
Route::get('amount',[StudentController::class,'amount'])->name('amount');
Route::get('amount_details/{id}', [StudentController::class, 'amount_details']);
Route::get('update_student_user/{id}',[StudentController::class,'update_student_user']);
Route::post('edit_student_user',[StudentController::class,'edit_student_user']);
Route::get('update_amount/{id}', [StudentController::class, 'update_amount']);
Route::post('edit_amount', [StudentController::class, 'edit_amount']);
Route::get('delete_student_admin/{id}',[StudentController::class,'delete_student_admin']);
Route::get('delete_student_user/{id}',[StudentController::class,'delete_student_user']);


Route::get('teacher_description',[TeacherController::class,'teacher_description'])->name('teacher_desc');
Route::get('add_teacher',[TeacherController::class,'add_teacher'])->name('add_teacher')->middleware('auth');
Route::post('save_teacher',[TeacherController::class,'save_teacher'])->name('save_teacher');
Route::get('listteacher/{id}',[TeacherController::class,'listteacher'])->name('listteacher');
Route::get('delete_teacher_admin/{id}',[TeacherController::class,'delete_teacher_admin']);
Route::get('update_teacher_admin/{id}',[TeacherController::class,'update_teacher_admin']);
Route::post('edit_teacher_admin',[TeacherController::class,'edit_teacher_admin']);
Route::get('teacher_print_admin/{id}',[TeacherController::class,'teacher_print_admin']);
Route::get('teacher_print_user/{id}',[TeacherController::class,'teacher_print_user']);
Route::get('delete_teacher_user/{id}',[TeacherController::class,'delete_teacher_user']);
Route::get('update_teacher_user/{id}',[TeacherController::class,'update_teacher_user']);
Route::post('edit_teacher_user',[TeacherController::class,'edit_teacher_user']);
Route::get('layout',[TeacherController::class,'layout']);


Route::get('/add_review', [ReviewController::class, 'add_review'])->name('add_review');
Route::post('/save_review', [ReviewController::class, 'save_review'])->name('save_review');
Route::get('/reviews', [ReviewController::class, 'reviews'])->name('reviews');
Route::get('/delete_review/{id}', [ReviewController::class, 'delete_review'])->name('delete_review');

Route::get('course_description',[CourseController::class,'course_description'])->name('course_description');
Route::get('add_course',[CourseController::class,'add_course']);
Route::post('save_course',[CourseController::class,'save_course'])->name('save_course');
Route::get('delete_course/{id}',[CourseController::class,'delete_course']);
Route::get('update_course/{id}', [CourseController::class, 'update_course'])->name('update_course');
Route::post('edit_course', [CourseController::class, 'edit_course'])->name('edit_course');
//Route::get('listcourse',[CourseController::class,'listcourse'])->name('listcourse');


Route::get('admin',[AdminController::class,'admin']);
Route::get('admin_dashboard',[AdminController::class,'admin_dashboard'])->name('admin_dash')->middleware('auth');
Route::post('save_admin',[AdminController::class,'save_admin']);
Route::get('update_admin/{id}',[AdminController::class,'update_admin']);
Route::post('edit_admin',[AdminController::class,'edit_admin']);
Route::get('temp', [AdminController::class, 'temp']);
Route::get('coursenavigation',[AdminController::class,'coursenavigation'])->name('coursenavigation');
Route::post('save_coursenavigation',[AdminController::class,'save_coursenavigation']);
Route::get('add_coursenavigation',[AdminController::class,'add_coursenavigation']);
Route::get('delete_navigation/{id}',[AdminController::class,'delete_navigation']);
Route::get('home',[AdminController::class,'home'])->name('home');

Route::get('admin_details',[AdminController::class,'admin_details'])->name('admin_details');



Route::get('master',[DemoController::class,'master']);
Route::get('contact',[DemoController::class,'contact']);
Route::get('about',[DemoController::class,'about']);

Route::get('navbar',[DemoController::class,'navbar']);
Route::get('footer',[DemoController::class,'footer']);

