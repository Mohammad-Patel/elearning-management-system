@extends('admin')

@section('details')

<style>
    .form-container {
        max-width: 1200px;
        margin: auto;
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
        margin-bottom: 20px;
        color: #444;
        border-bottom: 1px solid #ddd;
        padding-bottom: 8px;
        font-size: 20px;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
    }

    .form-col {
        flex: 1;
        min-width: 0;
    }

    .form-group {
        margin-bottom: 20px;
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
<form action="{{ url('edit_amount') }}" method="POST" enctype="multipart/form-data" class="form-container">
    @csrf
    <input type="hidden" name="id" value="{{ $student->id }}">

    <h2>Edit Student Details</h2>

    <!-- Personal Info -->
    <div class="form-section">
        <h3>Personal Details</h3>
        <div class="form-row">
            <!-- <div class="form-col">
                <div class="form-group">
                    <label for="enrollment_number">Enrollment No.</label>
                    <input type="text" id="enrollment_number" name="enrollment_number" value="{{ $student->enrollment_number }}" readonly style="background-color: #e9ecef; color:#1e90ff; cursor: not-allowed;">
                </div>
            </div> -->
            <div class="form-col">
                <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <input type="text" id="student_id" name="student_id" value="{{ $student->id }}" required disabled style="background-color: #e9ecef; color:#1e90ff; cursor: not-allowed;">
                </div>
            </div>

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
        </div>
    </div>

    <!-- Academic Info -->
    <div class="form-section">
        <h3>Academic Information</h3>

        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" id="department" name="department" value="{{ $student->department }}" required>
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

    <!-- Payment Info -->
    <div class="form-section">
        <h3>Payment Information</h3>

        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label for="payment">Amount</label>
                    <input type="text" id="payment" name="payment" value="{{ $student->payment }}" required>
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="payment_type">Payment Type</label>
                    <input type="text" id="payment_type" name="payment_type" value="{{ $student->payment_type }}" required>
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label for="payment_date">Payment Date</label>
                    <input type="text" id="payment_date" name="payment_date" value="{{ $student->payment_date }}" required>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit -->
    <button type="submit" class="form-submit">Update Student</button>
</form>

@endsection
