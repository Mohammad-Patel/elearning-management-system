<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function add_student(){

        return view('add_student');
    }

    public function save_student(Request $request){

        $lastStudent = Student::latest('id')->first();
        $enrollment_number = 'ENR' . date('Y') . str_pad(($lastStudent ? $lastStudent->id + 1 : 1), 5, '0', STR_PAD_LEFT);

        $id=request('id');
        $name=request('name');
        $birth_date=request('birth_date');
        $gender=request('gender');
        $contact=request('contact');
        $email=request('email');
        $school_name=request('school_name');
        $board=request('board');
        $passing_year=request('passing_year');
        $cgpa=request('cgpa');
        $course_applied=request('course_applied');
        $department=request('department');
        $duration = intval(preg_replace('/[^0-9]/', '', request('duration'))); 
        $admission_cate=request('admission_cate');
        
        $imageName1 = time() . '.' . $request->file('passport_image')->getClientOriginalExtension();
        $request->file('passport_image')->move(public_path('passport_image'), $imageName1);
        
        $imageName2 = time() . '.' . $request->file('marksheet_image')->getClientOriginalExtension();
        $request->file('marksheet_image')->move(public_path('marksheet_image'), $imageName2);
        
        $payment=request('payment');
        $payment_type=request('payment_type');
        $payment_date=request('payment_date');

        $student=Student::create([
                     'id'=>$id,
                     'enrollment_number'=>$enrollment_number,
                     'name'=>$name,
                     'birth_date'=>$birth_date,
                     'gender'=>$gender,
                     'contact'=>$contact,
                     'email'=>$email,
                     'school_name'=>$school_name,
                     'board'=>$board,
                     'passing_year'=>$passing_year,
                     'cgpa'=>$cgpa,
                     'course_applied'=>$course_applied,
                     'department'=>$department,
                     'duration'=>$duration,
                     'admission_cate'=>$admission_cate,
                     'passport_image'=>$imageName1,
                     'marksheet_image'=>$imageName2,
                     'payment'=>$payment,
                     'payment_type'=>$payment_type,
                     'payment_date'=>$payment_date
                ]);

             return redirect()->route('xyz',['id' => $student -> id])->with('success', 'Student data saved successfully!');
    }

    public function liststudent($id)
    {
        $student=Student::find($id);

        if($student)
        {
            return view('liststudent',compact('student'));
        }
        else
        {
            return view('liststudent')->with('message', 'Record is Not Available');
        }
    }

    public function delete_student_user($id)
    {
        $student=Student::find($id);

        if($student)
        {
            $student->delete();

            return redirect()->route('xyz',['id' => $student -> id])->with('success','Student Details Delete Success!');
        }
        
        echo"Record Not Found!";
    }

    public function update_student_user($id)
    {
        $id=$id;
        $student=Student::where('id',$id)->first();

        return view('update_student_user',compact('student'));
    }

    public function edit_student_user(Request $request)
    {
        $id=$request->id;
        $name=$request->name;
        $birth_date=$request->birth_date;
        $gender=$request->gender;
        $contact=$request->contact;
        $email=$request->email;
        $school_name=$request->school_name;
        $board=$request->board;
        $passing_year=$request->passing_year;
        $cgpa=$request->cgpa;
        $course_applied=$request->course_applied;
        $department=$request->department;
        $duration = $request->duration;
        $admission_cate=$request->admission_cate;
        
        $imageName1 = time() . '_passport.' . $request->file('passport_image')->getClientOriginalExtension();
        $request->file('passport_image')->move(public_path('passport_image'), $imageName1);
    
        $imageName2 = time() . '_marksheet.' . $request->file('marksheet_image')->getClientOriginalExtension();
        $request->file('marksheet_image')->move(public_path('marksheet_image'), $imageName2);

        $student=Student::where('id',$id)->first();

        $student->id=$id;
        $student->name=$name;
        $student->birth_date=$birth_date;
        $student->gender=$gender;
        $student->contact=$contact;
        $student->email=$email;
        $student->school_name=$school_name;
        $student->board=$board;
        $student->passing_year=$passing_year;
        $student->cgpa=$cgpa;
        $student->course_applied=$course_applied;
        $student->department=$department;
        $student->duration=$duration;
        $student->admission_cate=$admission_cate;
        $student->passport_image = $imageName1;
        $student->marksheet_image = $imageName2;


        $student->save();

        return redirect()->route('xyz',['id' => $student -> id])->with('success','Student Details Update Success!');
    }


    public function delete_student_admin($id)
    {
        $student=Student::find($id);

        if($student)
        {
            $student->delete();

            return redirect()->route('student_desc')->with('success','Student Details Delete Success!');
        }
        
        echo"Record Not Found!";
    }

    public function update_student_admin($id)
    {
        $id=$id;
        $student=Student::where('id',$id)->first();

        return view('update_student_admin',compact('student'));
    }

    public function edit_student_admin(Request $request)
    {
        $id=$request->id;
        $name=$request->name;
        $birth_date=$request->birth_date;
        $gender=$request->gender;
        $contact=$request->contact;
        $email=$request->email;
        $school_name=$request->school_name;
        $board=$request->board;
        $passing_year=$request->passing_year;
        $cgpa=$request->cgpa;
        $course_applied=$request->course_applied;
        $department=$request->department;
        $duration = $request->duration;
        $admission_cate=$request->admission_cate;
        
        $imageName1 = time() . '_passport.' . $request->file('passport_image')->getClientOriginalExtension();
        $request->file('passport_image')->move(public_path('passport_image'), $imageName1);
    
        $imageName2 = time() . '_marksheet.' . $request->file('marksheet_image')->getClientOriginalExtension();
        $request->file('marksheet_image')->move(public_path('marksheet_image'), $imageName2);

        $student=Student::where('id',$id)->first();

        $student->id=$id;
        $student->name=$name;
        $student->birth_date=$birth_date;
        $student->gender=$gender;
        $student->contact=$contact;
        $student->email=$email;
        $student->school_name=$school_name;
        $student->board=$board;
        $student->passing_year=$passing_year;
        $student->cgpa=$cgpa;
        $student->course_applied=$course_applied;
        $student->department=$department;
        $student->duration=$duration;
        $student->admission_cate=$admission_cate;
        $student->passport_image = $imageName1;
        $student->marksheet_image = $imageName2;


        $student->save();

        return redirect()->route('student_desc',['id' => $student -> id])->with('success', 'Student data Edit successfully!');
    }

    public function student_print_user($id) {
        $stu = Student::find($id);

        if(!$stu){
            return redirect()->back()->with('error','Student not found!');
        }
    
        return view('student_print_user', compact('stu')); 
    }

    public function student_description(Request $request)
    {
        $stu = Student::where($request->all())->get();

        return view('student_description',compact('stu'));
    }

    public function amount()
    {
        $stu = Student::all();
        $totalAmount = Student::sum('payment'); 
        return view('amount', compact('stu','totalAmount'));
    }

    public function amount_details($id)
    {
        $student = Student::find($id); 
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found!');
        }

        return view('amount_details', compact('student'));
    }

    public function update_amount($id)
    {
        $id=$id;

        $student=Student::find($id);

        return view('update_amount',compact('student'));
    }

    public function edit_amount(Request $request)
    {
        $id=$request->id;
        $name=$request->name;
        $department=$request->department;
        $admission_cate=$request->admission_cate;
        $payment=$request->payment;
        $payment_type=$request->payment_type;
        $payment_date=$request->payment_date;

        $student=Student::find($id);

        $student->id=$id;
        $student->name=$name;
        $student->department=$department;
        $student->admission_cate=$admission_cate;
        $student->payment=$payment;
        $student->payment_type=$payment_type;
        $student->payment_date=$payment_date;

        $student->save();

        return redirect()->route('amount',['id' => $student -> id])->with('success', 'Student Amount data Edit successfully!');
    }

    public function student_print_admin($id) {
        $stu = Student::find($id);

        if(!$stu){
            return redirect()->back()->with('error','Student not found!');
        }
    
        return view('student_print_admin', compact('stu')); 
    }
}
