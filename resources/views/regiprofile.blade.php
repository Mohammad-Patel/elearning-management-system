@extends('layouts.app')

@section('title', 'Student List')

@section('content')

<div style="margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; background: #f0f4f8; font-size: 16px;">

@if(session('success'))
    <script>
        Swal.fire({
            title: '✅ Success!',
            text: @json(session('success')),
            icon: 'success',
            confirmButtonText: 'OK',
            width: '650px', // Increased alert box width
            padding: '3em',
            customClass: {
                title: 'swal-title-custom',
                popup: 'swal-popup-custom',
                confirmButton: 'swal-button-custom'
            }
        });
    </script>
    <style>
    /* Custom Title Styling */
    .swal-title-custom {
        font-size: 2.2rem !important;
        font-weight: bold;
        color: #34495e; /* Professional dark slate */
        text-align: center;
        margin-bottom: 1em;
    }

    /* Custom Popup Styling */
    .swal-popup-custom {
        font-size: 1.4rem;
        padding: 2em;
        background-color: #f9f9f9; /* Soft light gray */
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08); /* Softer shadow */
    }

    /* Custom Button Styling */
    .swal-button-custom {
        font-size: 1.2rem;
        padding: 12px 25px;
        background-color: #1f7aec; /* Sleek blue */
        color: white;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    /* Button hover effect */
    .swal-button-custom:hover {
        background-color: #155cc2; /* Darker blue on hover */
    }
</style>

@endif

<div style="min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 40px 0;">
    <div style="width: 90%; max-width: 700px; padding: 30px; background: white; border-radius: 12px; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #2c3e50; margin-bottom: 30px; font-size: 28px;">Register Now</h2>

        <form method="POST" action="{{ url('regiprofile') }}" style="display: flex; flex-direction: column; font-size: 16px;">
            @csrf

            @if ($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <input type="hidden" name="id" value="{{$login->id}}" placeholder="Enter your name" required
                style="padding: 14px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; width: 100%;">

            <label style="margin-bottom: 5px; font-weight: bold;">Full Name</label>
            <input type="text" name="name" value="{{$login->name}}" placeholder="Enter your name" required
                style="padding: 14px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; width: 100%;">

            <label style="margin-bottom: 5px; font-weight: bold;">Email</label>
            <input type="email" name="email" value="{{$login->email}}" placeholder="Enter your email" required
                style="padding: 14px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; width: 100%;">

            <label style="margin-bottom: 5px; font-weight: bold;">Phone Number</label>
            <input type="tel" name="phone" value="{{$login->phone}}" placeholder="Enter your phone number" required
                style="padding: 14px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; width: 100%;">

            <label style="margin-bottom: 5px; font-weight: bold;">Date of Birth</label>
            <input type="date" name="dob" value="{{$login->dob}}" required
                style="padding: 14px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; width: 100%;">

            <label style="margin-bottom: 5px; font-weight: bold;">Address</label>
            <textarea name="address" placeholder="Enter your address" rows="3" required
                style="padding: 14px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 6px; resize: none; font-size: 16px; width: 100%;">{{ $login->address }}</textarea>

            <label style="margin-bottom: 5px; font-weight: bold;">Password</label>
            <div style="position: relative; margin-bottom: 20px;">
                <input type="password" id="password" name="password" value="{{$login->password}}" style="padding: 14px 45px 14px 14px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; width: 100%; height: 48px; box-sizing: border-box;">
                    <span onclick="togglePassword()" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; font-size: 20px; color: #555; line-height: 1;">
                        <i id="eye-icon" class="fa-solid fa-eye"></i>
                    </span>
            </div>

            <label style="display: none;">User Type</label>
            <select name="user_type" required style="display: none;">
                <option value="student" {{ $login->user_type == 'student' ? 'selected' : '' }}>Student</option>
                <option value="teacher" {{ $login->user_type == 'teacher' ? 'selected' : '' }}>Teacher</option>
                <!-- <option value="admin" {{ $login->user_type == 'admin' ? 'selected' : '' }}>Admin</option> -->
            </select>

            <button type="submit"
                style="padding: 14px; background: #3498db; color: white; font-weight: bold; border: none; border-radius: 6px; cursor: pointer; transition: background 0.3s; font-size: 16px;">
                Edit
            </button>
        </form>
    </div>
</div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById("password");
        const icon = document.getElementById("eye-icon");
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>



@endsection
