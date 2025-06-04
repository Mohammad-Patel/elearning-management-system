{{-- resources/views/listteacher.blade.php --}}
@extends('layouts.app')

@section('title', 'Teacher List')

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
    background: rgb(204, 227, 231);/* Light gray gradient for a clean, professional look */
    color:rgb(20, 119, 134); /* Darker text for better readability */
    padding: 40px 20px;
    border-radius: 6px;
    text-align: center;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1); /* Soft shadow for a subtle effect */
    margin-bottom: 50px;
    max-width: 1000px;
    margin-left: auto;
    margin-right: auto;
}



    .custom-header h2 {
        font-size: 2.8rem;
        font-weight: 700;
        color:rgb(20, 119, 134);
        margin-bottom: 10px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .custom-header p {
        font-size: 1.1rem;
        opacity: 0.95;
    }

    .table {
        width: 95%;
        margin: auto;
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
        padding: 16px 12px;
        text-transform: uppercase;
        border: none;
    }

    .table tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        border-top: 1px solid #dee2e6;
        font-size: 0.98rem;
        font-weight: 600; /* Bold font */
        color: #333333;   /* Dark text */
    }

    .table tbody tr:hover {
        background-color: #f1faff;
        transition: background-color 0.3s ease;
    }

    .table img {
        border: 2px solid #ccc;
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
</style>

<br><br>
<div class="custom-header">
    <h2>👨‍🏫 Teacher Details</h2>
    <p>Explore individual teacher's info, experience & more!</p>
</div>
<br>
@if(isset($teacher))
    <table class="table text-center">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Photo</th>
                <th>Qualification</th><th>Subject</th><th>Experience</th><th>Message</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->phone }}</td>
                <td><img src="{{ asset('passport_image/'.$teacher->passport_image) }}" width="50" height="50" class="rounded-circle"></td>
                <td>{{ $teacher->qualification }}</td>
                <td>{{ $teacher->subject }}</td>
                <td>{{ $teacher->experience }}</td>
                <td>{{ $teacher->message }}</td>
                <td>
                    <div class="d-flex gap-2 justify-content-center">
                        <a href="{{url('delete_teacher_user',$teacher->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        <a href="{{url('update_teacher_user',$teacher->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="{{url('teacher_print_user',$teacher->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br><br>
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
