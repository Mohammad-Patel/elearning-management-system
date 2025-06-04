@extends('home')

@section('main')


<form action='{{ url("UpdateStudent") }}' method="post" style="width: 400px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; background: #f9f9f9; font-family: Arial, sans-serif;">
    @csrf

    <h1 style="text-align: center; color: #333;">EDIT STUDENT</h1>
    
    <label>Id:</label>
    <input type="number" name="id" value="{{$stu->id}}" style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;">
    
    <label>Name:</label>
    <input type="text" name="sname" value="{{$stu->sname}}" style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;">
    
    <label>Course:</label>
    <input type="text" name="course" value="{{$stu->course}}" style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;">
    
    <label>SEM:</label>
    <input type="text" name="sem" value="{{$stu->sem}}" style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;">
    
    <label>Gender:</label>
    <input type="text" name="gender" value="{{$stu->gender}}" style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;">
    
    <label>Fees:</label>
    <input type="text" name="fees" value="{{$stu->fees}}" style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;">
    
    <button type="submit" style="width: 100%; background:rgb(85, 87, 184); color: #fff; border: none; padding: 10px; font-size: 16px; cursor: pointer;">EDIT</button>
</form>

@endsection