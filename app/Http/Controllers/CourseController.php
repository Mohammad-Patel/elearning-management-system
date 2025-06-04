<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function add_course() {
        return view('add_course');
    }
    
    public function save_course(Request $req)
    {  
        $id=request('id');
        $c_id=request('c_id');
        $name=request('name');
        $duration=request('duration');
        $fees=request('fees');
        $description=request('description');

        Course::create([
            'id'=>$id,
            'c_id' =>$c_id,
            'name' => $name,
            'duration' => $duration,
            'fees' => $fees,
            'description' => $description,
        ]);

        return redirect()->route('course_description')->with('success', 'Course submitted successfully!'); // ✅ If listcourse is a named route
    }


    public function course_description(Request $req)
    {
        $course=Course::all();

        return view('course_description',compact('course'));
    }

    public function delete_course($id)
    {
        $id=$id;
        $course=Course::where('id',$id)->first();
        
        if($course)
        {
            $course->delete();
            return redirect()->route('course_description')->with('success', 'Course deleted successfully!');
        }
        else
        {
            echo"Course is not Found";
        }
    }

    public function update_course($id)
    {
        $id=$id;

        $course=Course::where('id',$id)->first();

        return view('update_course',compact('course'));
    }

    public function edit_course(Request $request)
    {
        $id=$request->id;
        $c_id=$request->c_id;
        $name=$request->name;
        $duration=$request->duration;
        $fees=$request->fees;
        $description=$request->description;

        $course=Course::where('id',$id)->first();

        $course->id=$id;
        $course->c_id=$c_id;
        $course->name=$name;
        $course->duration=$duration;
        $course->fees=$fees;
        $course->description=$description;

        $course->save();

        return redirect()->route('course_description')->with('success', 'Course Edit successfully!');
    }
}
