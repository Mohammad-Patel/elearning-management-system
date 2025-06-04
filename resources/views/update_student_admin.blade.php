@extends('admin')

@section('details')

<style>
    .form-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 40px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', sans-serif;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 40px;
        color: #222;
        font-size: 28px;
    }

    .form-section {
        margin-bottom: 40px;
    }

    .form-section h3 {
        margin-bottom: 24px;
        color: #444;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
        font-size: 20px;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
        margin-bottom: 24px;
    }

    .form-col {
        flex: 1;
        min-width: 250px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }

    .form-group input[type="text"],
    .form-group input[type="file"],
    .form-group input[type="date"] {
        width: 100%;
        padding: 12px;
        font-size: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        background-color: #f9f9f9;
    }

    .form-group input[readonly] {
        background-color: #e9ecef;
        color: #1e90ff;
        cursor: not-allowed;
    }

    .form-group input[type="file"] {
        background-color: #fff;
    }

    .form-submit {
        width: 100%;
        background-color: #2596be;
        color: #fff;
        padding: 15px;
        border: none;
        border-radius: 6px;
        font-size: 18px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .form-submit:hover {
        background-color: #1f7ea3;
    }

    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
        }
    }
</style>

<br><br>
<div style="text-align: center; margin-bottom: 20px;">
    <div style="display: inline-block; background-color: #fff; padding: 10px 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
        <h2 style="font-size: 26px; color: #555; margin: 0;">
            Editing Student ID: 
            <span style="color: #1e90ff; font-weight: bold;">{{$student->id}}</span>
        </h2>
    </div>
</div>

<form action="{{ url('edit_student_admin') }}" method="POST" enctype="multipart/form-data" class="form-container">
    @csrf
    <input type="hidden" name="id" value="{{ $student->id }}">

    <h2>Edit Student Details</h2>

    <!-- Personal Info -->
    <div class="form-section">
        <h3>Personal Details</h3>
        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="enrollment_number">Enrollment No.</label>
                    <input type="text" id="enrollment_number" name="enrollment_number" value="{{ $student->enrollment_number }}" readonly style="background-color: #e9ecef; color:#1e90ff; cursor: not-allowed;">
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ $student->name }}" required>
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" id="gender" name="gender" value="{{ $student->gender }}" required>
                </div>
            </div>
        </div>

        <div class="form-row" style="gap: 32px; margin-bottom: 24px;">
    <div class="form-col" style="min-width: 280px;">
        <div class="form-group">
            <label for="birth_date">Date of Birth</label>
            <input type="date" id="birth_date" name="birth_date" value="{{ $student->birth_date }}" required>
        </div>
    </div>
    <div class="form-col" style="min-width: 280px;">
        <div class="form-group">
            <label for="contact">Contact Number</label>
            <input type="text" id="contact" name="contact" value="{{ $student->contact }}" required>
        </div>
    </div>
    <div class="form-col" style="min-width: 280px;">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="{{ $student->email }}" required>
        </div>
    </div>
    <div class="form-col"></div>
</div>


    </div>

    <!-- Academic Info -->
    <div class="form-section">
        <h3>Academic Information</h3>
        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="school_name">School Name</label>
                    <input type="text" id="school_name" name="school_name" value="{{ $student->school_name }}" required>
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="board">Board</label>
                    <input type="text" id="board" name="board" value="{{ $student->board }}" required>
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="passing_year">Passing Year</label>
                    <input type="text" id="passing_year" name="passing_year" value="{{ $student->passing_year }}" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="cgpa">CGPA</label>
                    <input type="text" id="cgpa" name="cgpa" value="{{ $student->cgpa }}" required>
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="course_applied">Course Applied</label>
                    <input type="text" id="course_applied" name="course_applied" value="{{ $student->course_applied }}" required>
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" id="department" name="department" value="{{ $student->department }}" required>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" id="duration" name="duration" value="{{ $student->duration }}" required>
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="admission_cate">Admission Category</label>
                    <input type="text" id="admission_cate" name="admission_cate" value="{{ $student->admission_cate }}" required>
                </div>
            </div>
            <div class="form-col"></div>
        </div>
    </div>

    <!-- Documents -->
    <div class="form-section">
        <h3>Documents</h3>
        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="passport_image">Passport Size Photo</label>
                    <input type="file" id="passport_image" name="passport_image">
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="marksheet_image">Marksheet Image</label>
                    <input type="file" id="marksheet_image" name="marksheet_image">
                </div>
            </div>
            <div class="form-col"></div>
        </div>
    </div>

    <!-- Submit -->
    <button type="submit" class="form-submit">Update Student</button>
</form>

@endsection
