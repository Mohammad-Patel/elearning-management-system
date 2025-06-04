@extends('layouts.app')

@section('title', 'Student List')

@section('content')

@if(session('success'))
    <script>
        Swal.fire({
            title: '✅ Success!',
            text: @json(session('success')),
            icon: 'success',
            confirmButtonText: 'OK',
            width: '600px',
            padding: '2.5em',
            customClass: {
                title: 'swal-title-large',
                popup: 'swal-popup-large',
                confirmButton: 'swal-button-large'
            }
        });
    </script>

    <style>
        .swal-title-large {
            font-size: 2rem !important;
            font-weight: bold;
        }
        .swal-popup-large {
            font-size: 1.3rem;
        }
        .swal-button-large {
            font-size: 1.1rem;
            padding: 10px 20px;
        }
    </style>
@endif

<style>
    body {
        background: linear-gradient(to right top, #e0f0ff, #f0f8ff);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .custom-header {
        background: rgb(204, 227, 231);
        color: rgb(20, 119, 134);
        padding: 40px 20px;
        border-radius: 6px;
        text-align: center;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px; /* Reduced bottom margin */
        max-width: 1000px;
        margin-left: auto;
        margin-right: auto;
    }

    .custom-header h2 {
        font-size: 2.8rem;
        font-weight: 700;
        color: rgb(20, 119, 134);
        margin-bottom: 10px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .custom-header p {
        font-size: 1.1rem;
        opacity: 0.95;
    }

    .table-container {
        overflow-x: auto;
        margin-bottom: 20px; /* Reduced space after the table */
    }

    .table {
        width: 100%;
        min-width: 1000px;  /* Prevents shrinking of the table */
        border-collapse: collapse;
        background-color: #ffffff;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .table thead {
        background: rgb(20, 119, 134);
        color: white;
        font-size: 1.1rem;
        font-weight: bold;
    }

    .table thead th {
        padding: 14px 10px;
        text-transform: uppercase;
        border: none;
        white-space: nowrap;
    }

    .table tbody td {
        padding: 12px 10px;
        vertical-align: middle;
        border-top: 1px solid #dee2e6;
        font-size: 0.95rem;
        font-weight: 600;
        color: #333333;
    }

    .table tbody tr:hover {
        background-color: #f1faff;
        transition: background-color 0.3s ease;
    }

    .table img {
        border: 2px solid #ccc;
        border-radius: 50%;
        object-fit: cover;
    }

    .btn-sm {
        font-size: 0.85rem;
        padding: 5px 10px;
        border-radius: 6px;
    }

    .btn-sm i {
        margin-right: 4px;
    }

    .d-flex.gap-2 {
        gap: 0.5rem;
    }

    /* To disable zoom-out on mobile */
    @media (max-width: 1000px) {
        body {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-container {
            min-width: 1000px; /* Prevent shrinking */
            overflow-x: auto;
        }

        .table {
            min-width: 1000px;
        }
    }
</style>
<br><br><br>
<div class="custom-header">
    <h2>🎓 Student Details</h2>
    <p>All student profiles, admissions & payment info!</p>
</div>
<br><br>

@if(isset($student))
    <div class="table-container">
        <table class="table text-center">
            <thead>
                <tr>
                    <th>ID</th><th>Enroll</th><th>Name</th><th>Birth</th><th>Gender</th><th>Phone</th><th>Email</th><th>School</th>
                    <th>Board</th><th>Year</th><th>Dept</th><th>Duration</th><th>Category</th><th>Photo</th><th>Marksheet</th>
                    <th>Payment</th><th>Type</th><th>Date</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->enrollment_number }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->birth_date }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->contact }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->school_name }}</td>
                    <td>{{ $student->board }}</td>
                    <td>{{ $student->passing_year }}</td>
                    <td>{{ $student->department }}</td>
                    <td>{{ $student->duration }}</td>
                    <td>{{ $student->admission_cate }}</td>
                    <td><img src="{{ asset('passport_image/'.$student->passport_image) }}" width="50" height="50"></td>
                    <td><img src="{{ asset('marksheet_image/'.$student->marksheet_image) }}" width="50" height="50"></td>
                    <td>{{ $student->payment }}</td>
                    <td>{{ $student->payment_type }}</td>
                    <td>{{ $student->payment_date }}</td>
                    <td>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ url('delete_student_user', $student->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <a href="{{ url('update_student_user', $student->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="{{ url('student_print_user', $student->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@elseif(isset($message))
    <div style="
        max-width: 1500px;
        margin: 2rem auto 0 auto;
        padding: 25px 30px;
        background-color: #fff8e1;
        border-left: 8px solid #ffc107;
        border-radius: 12px;
        font-weight: bold;
        font-size: 2.0rem;
        text-align: center;
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    ">
        <i class="fas fa-exclamation-triangle" style="margin-right: 1rem; color: #ffc107; font-size: 1.8rem;"></i>
        {{ $message }}
    </div>
@endif

@endsection
