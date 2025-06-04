@extends('admin')

@section('main')


<!-- <h1 style="
    text-align: center;
    color: white;
    background-color: #007BFF;
    padding: 15px;
    font-size: 28px;
    border-radius: 8px;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    font-family: Arial, sans-serif;
">
 Student List 
</h1> -->

<button style="background-color: blue; color: white; border-radius: 5px; padding: 10px; border: none; margin-bottom: 10px;">
    <a style="text-decoration: none; color: white;" href="{{url('add_student')}}">ADD STUDENTS</a>
</button>
<br><br>

<form action="{{url('liststudent')}}">
    <input type="text" name="search" placeholder="search">
    <button type="submit"style="background-color: green; color: white; border-radius: 5px; padding: 10px; border: none; margin-bottom: 10px;">
    Search</button>
</form>
<br><br>
<table border="1" width="100%" style="border-collapse: collapse; text-align: center;">
    <thead>
        <tr style="background-color: black; color: white;">
            <th style="padding: 10px;">ID</th>
            <th style="padding: 10px;">Name</th>
            <th style="padding: 10px;">Course</th>
            <th style="padding: 10px;">Semester</th>
            <th style="padding: 10px;">Gender</th>
            <th style="padding: 10px;">Fees</th>
            <th style="padding: 10px;">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($student as $st)
    <tr style="background-color: #f9f9f9;">
        <td style="padding: 10px; border: 1px solid #ccc;">{{$st->id}}</td>
        <td style="padding: 10px; border: 1px solid #ccc;">{{$st->sname}}</td>
        <td style="padding: 10px; border: 1px solid #ccc;">{{$st->course}}</td>
        <td style="padding: 10px; border: 1px solid #ccc;">{{$st->sem}}</td>
        <td style="padding: 10px; border: 1px solid #ccc;">{{$st->gender}}</td>
        <td style="padding: 10px; border: 1px solid #ccc;">{{$st->fees}}</td>
        <td style="text-align:center; padding: 10px; border: 1px solid #ccc;">
            <button style="background-color:red; color: white; border-radius:5px; padding: 5px; border: none;">
                <a style="text-decoration:none; color: white;" href="{{url('delete_student',$st->id)}}">Delete</a>
            </button>
            <button style="background-color:green; color: white; border-radius:5px; padding: 5px; border: none;">
                <a style="text-decoration:none; color: white;" href="{{url('openedit_student',$st->id)}}">Edit</a>
            </button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>



<!-- <h1>Student list with Array</h1>
<table border=1>
<thead>
        <tr>
            <th>Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Gender</th>
            <th>Fees</th>
        </tr>
    </thead>
    @foreach($student as $st)
    <tr>
        <td>{{$st['sname']}}</td>
        <td>{{$st['course']}}</td>
        <td>{{$st['sem']}}</td>
        <td>{{$st['gender']}}</td>
        <td>{{$st['fees']}}</td>
    </tr>
    @endforeach
    </tbody>
</table> -->
@endsection
