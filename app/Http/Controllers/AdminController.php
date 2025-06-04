<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin; 
use App\Models\PopularCourse;

use App\Models\Student; 
use App\Models\Teacher; 
use App\Models\Course; 


class AdminController extends Controller
{
    
    public function admin(){
        return view('admin');
    }

    public function save_admin(Request $request)
    {
        $id=request('id');
        $fullname=request('fullname');
        $email=request('email');
        $phone=request('phone');
        $username=request('username');
        $password=request('password');
        $imageName = time() . '.' . $request->file('profile')->getClientOriginalExtension();
        $request->file('profile')->move(public_path('profile'), $imageName);

        $admin=Admin::create([

            'id'=>$id,
            'fullname'=>$fullname,
            'email'=>$email,
            'phone'=>$phone,
            'username'=>$username,
            'password' => Hash::make($password),
            'profile'=>$imageName
        ]);

        return redirect()->route('admin_dash')->with('success', 'Admin added successfully!');
    }

    public function admin_dashboard() {
    
        if(!Auth::check())
        {
            return redirect('login');
        }
        
        $totalTeacher=Teacher::count();
        $totalStudent=Student::count();
        $totalCourse=Course::count();

        return view('admin_dashboard', compact('totalTeacher','totalStudent','totalCourse'));
    }

    public function admin_details()
    {
        $admin = Admin::all();

        return view('admin_details', compact('admin'));
    }

    
    public function update_admin($id) {

        $admin=Admin::find($id);

        return view('update_admin',compact('admin'));
    }

    public function edit_admin(Request $request)
    {
        $id=$request->id;
        $fullname=$request->fullname;
        $email=$request->email;
        $phone=$request->phone;
        $username=$request->username;
        $password=$request->password;
        $imageName = time() . '.' . $request->file('profile')->getClientOriginalExtension();
        $request->file('profile')->move(public_path('profile'), $imageName);

        $admin=Admin::find($id);

        $admin->id=$id;
        $admin->fullname=$fullname;
        $admin->email=$email;
        $admin->phone=$phone;
        $admin->username=$username;
        $admin->password=$password;
        $admin->profile=$imageName;

        $admin->save();

        return redirect()->route('admin_details')->with('success', 'Admin Edit successfully!');
    }

    public function add_coursenavigation()
    {
        return view('add_coursenavigation');
    }

    public function save_coursenavigation(Request $request)
    {
        $id=request('id');
        $title=request('title');
        $instructor=request('instructor');
        $duration=request('duration');
        $students=request('students');

        $image = $request->file('courseImage');
        $courseImage = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('image'), $courseImage);

        $popcourse=PopularCourse::create([
            'id'=>$id,
            'title'=>$title,
            'instructor'=>$instructor,
            'duration'=>$duration,
            'students'=>$students,
            'image'=>$courseImage
        ]);

        return redirect()->route('coursenavigation')->with('success','course add successfully!');
    }

    public function coursenavigation()
    {
        $popcourse = PopularCourse::all();
        return view('coursenavigation', compact('popcourse'));
    }

    public function delete_navigation($id)
    {
        $popcourse = PopularCourse::find($id);

        if($popcourse)
        {
            $popcourse->delete();

            return redirect()->route('coursenavigation')->with('success','course Delete successfully!');
        }
        else
        {
            echo"Record Not Found!";
        }
    }
    public function home()
    {
        $popcourse = PopularCourse::all();
        return view('home', compact('popcourse'));
    }


    
}
