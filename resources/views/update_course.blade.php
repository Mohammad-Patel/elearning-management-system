@extends('admin')

@section('details')
<style>
    body, html {
        overflow: hidden;
    }
</style>
<div style="display: flex; justify-content: center; align-items: flex-start; height: 100vh; background: #f4f4f4; padding-top: 100px;">
    <div style="background: white; padding: 50px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); max-width: 700px; width: 100%;">
        <h2 style="text-align: center; margin-bottom: 30px;">Enter New Course</h2>

        <form action="{{url('edit_course')}}" method="POST">
            @csrf
            <!-- <ID Hidden> -->
            <input type="hidden" name="id" value="{{$course->id}}">
                <div style="position: relative; margin-bottom: 25px;">
                    <i class="fas fa-hashtag" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: gray;"></i>
                    <input type="text" value="{{$course->id}}" disabled style="width: 100%; padding-left: 45px; height: 55px; background-color: #f5f5f5; color: #888; border: 1px solid #ccc; border-radius: 6px; font-size: 17px; outline: none; cursor: not-allowed;">
                </div>

            <!-- Course ID -->
            <div style="position: relative; margin-bottom: 25px;">
                <i class="fas fa-id-badge" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: gray;"></i>
                <input type="text" name="c_id" value='{{$course->c_id}}' placeholder="Course ID" required 
                    style="width: 100%; padding-left: 45px; height: 55px; border: 1px solid #ccc; border-radius: 6px; font-size: 17px; outline: none;">
            </div>

            <!-- Course Name -->
            <div style="position: relative; margin-bottom: 25px;">
                <i class="fas fa-book" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: gray;"></i>
                <input type="text" name="name" value='{{$course->name}}' placeholder="Course Name" required 
                    style="width: 100%; padding-left: 45px; height: 55px; border: 1px solid #ccc; border-radius: 6px; font-size: 17px; outline: none;">
            </div>

            <!-- Duration -->
            <div style="position: relative; margin-bottom: 25px;">
                <i class="fas fa-clock" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: gray;"></i>
                <input type="text"name="duration"  value='{{$course->duration}}' placeholder="Duration (e.g., 2 Years)" required 
                    style="width: 100%; padding-left: 45px; height: 55px; border: 1px solid #ccc; border-radius: 6px; font-size: 17px; outline: none;">
            </div>

            <!-- Fees -->
            <div style="position: relative; margin-bottom: 25px;">
                <i style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: gray; font-size: 18px;">₹</i>
                <input type="number" name="fees" value='{{$course->fees}}' placeholder="Course Fees" required 
                    style="width: 100%; padding-left: 45px; height: 55px; border: 1px solid #ccc; border-radius: 6px; font-size: 17px; outline: none;">
            </div>

            <!-- Description -->
            <div style="margin-bottom: 25px;">
                <textarea placeholder="Course Description" name="description" value='{{$course->description}}' rows="4" required 
                    style="width: 100%; border: 1px solid #ccc; border-radius: 6px; padding: 12px; font-size: 17px; outline: none; resize: none;"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                style="display: flex; align-items: center; justify-content: center; gap: 10px; height: 55px; width: 100%; background: #2596be; color: white; border: none; border-radius: 6px; font-size: 18px; cursor: pointer; transition: 0.3s;">
                <i class="fas fa-check"></i> EDIT
            </button>
        </form>
    </div>
</div>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script> -->

@endsection
