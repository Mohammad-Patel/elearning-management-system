<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // public function teacher_description() {
    //     return view('teacher_description');
    // }

    public function layout()
    {
         return view('layout');
    }

    public function add_teacher() {
        return view('add_teacher');
    }

    public function save_teacher(Request $request)
    {
        $id=request('id');
        $name=request('name');
        $email=request('email');
        $phone=request('phone');
       
        $imageName = time() . '.' . $request->file('passport_image')->getClientOriginalExtension();
        $request->file('passport_image')->move(public_path('passport_image'), $imageName);

        $qualification=request('qualification');
        $subject=request('subject');
        $experience = intval(preg_replace('/[^0-9]/', '', request('experience')));
        $message=request('message');

        $teacher=Teacher::create([
                
               'id'=>$id,
               'name'=>$name,
               'email'=>$email,
               'phone'=>$phone,
               'passport_image'=>$imageName,
               'qualification'=>$qualification,
               'subject'=>$subject,
               'experience'=>$experience,
               'message'=>$message
        ]);

        return redirect()->route('listteacher', ['id' => $teacher->id])->with('success', 'Teacher data saved successfully!');

    }

    public function listteacher($id)
    {
        $teacher = Teacher::find($id);

        if ($teacher) 
        {
            return view('listteacher', compact('teacher'));
        } 
        else 
        {
            return view('listteacher')->with('message', 'Record is Not Available');
        }
    }

    public function delete_teacher_user($id)
    {
        $teacher=Teacher::where('id',$id)->first();

        if($teacher)
        {
            $teacher->delete();
            return redirect()->route('listteacher', ['id' => $teacher->id])->with('success', 'Teacher Delete successfully!');
        }
        echo"Record Are Not Found";  
    }

    public function update_teacher_user($id)
    {
        $id=$id;

        $teacher=Teacher::find($id);

        return view('update_teacher_user',compact('teacher'));
    }

    public function edit_teacher_user(Request $request)
    {

        $id=$request->id;
        $name=$request->name;
        $email=$request->email;
        $phone=$request->phone;
       
        $imageName = time() . '.' . $request->file('passport_image')->getClientOriginalExtension();
        $request->file('passport_image')->move(public_path('passport_image'), $imageName);

        $qualification=$request->qualification;
        $subject=$request->subject;
        $experience = $request->experience;
        $message=$request->message;

        $teacher=Teacher::find($id);

        $teacher->id=$id;
        $teacher->name=$name;
        $teacher->email=$email;
        $teacher->phone=$phone;
        $teacher->passport_image = $imageName;
        $teacher->qualification=$qualification;
        $teacher->subject=$subject;
        $teacher->experience=$experience;
        $teacher->message=$message;

        $teacher->save();

        return redirect()->route('listteacher', ['id' => $teacher->id])->with('success', 'Teacher Data Update successfully!');
    }

    public function teacher_print_user($id) {
        $teacher = Teacher::find($id);

        if(!$teacher){
            return redirect()->back()->with('error','Teacher not found!');
        }
    
        return view('teacher_print_user', compact('teacher')); 
    }

    public function teacher_description(Request $request){

        $teacher=Teacher::where($request->all())->get();
 
        return view('teacher_description',compact('teacher'));
    }

    public function delete_teacher_admin($id)
    {
        $teacher=Teacher::where('id',$id)->first();

        if($teacher)
        {
            $teacher->delete();
            return redirect()->route('teacher_desc')->with('success','Teacher Details Delete Success!');
        }
        echo"Record Are Not Found";  
    }

    public function update_teacher_admin($id)
    {
        $id=$id;

        $teacher=Teacher::find($id);

        return view('update_teacher_admin',compact('teacher'));
    }

    public function edit_teacher_admin(Request $request)
    {

        $id=$request->id;
        $name=$request->name;
        $email=$request->email;
        $phone=$request->phone;
       
        $imageName = time() . '.' . $request->file('passport_image')->getClientOriginalExtension();
        $request->file('passport_image')->move(public_path('passport_image'), $imageName);

        $qualification=$request->qualification;
        $subject=$request->subject;
        $experience = $request->experience;
        $message=$request->message;

        $teacher=Teacher::find($id);

        $teacher->id=$id;
        $teacher->name=$name;
        $teacher->email=$email;
        $teacher->phone=$phone;
        $teacher->passport_image = $imageName;
        $teacher->qualification=$qualification;
        $teacher->subject=$subject;
        $teacher->experience=$experience;
        $teacher->message=$message;

        $teacher->save();

        return redirect()->route('teacher_desc')->with('success', 'Teacher information update successfully!');
    }

    //show button with print page
    public function teacher_print_admin($id) {
        $teacher = Teacher::find($id);

        if(!$teacher){
            return redirect()->back()->with('error','Teacher not found!');
        }
    
        return view('teacher_print_admin', compact('teacher')); 
    }
}
