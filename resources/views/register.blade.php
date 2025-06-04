<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>


<body style="margin: 0; padding: 0; font-family: 'Segoe UI', sans-serif; background: #f0f4f8; font-size: 16px;">

@include('navbar2')

@if(session('success'))
    <div style="color: green; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div style="min-height: 100vh; display: flex; justify-content: center; align-items: center; padding: 40px 0;">
    <div style="width: 90%; max-width: 700px; padding: 30px; background: white; border-radius: 12px; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #2c3e50; margin-bottom: 30px; font-size: 28px;">Register Now</h2>

        <form method="POST" action="{{ route('register.process') }}" style="display: flex; flex-direction: column; font-size: 16px;">
            @csrf
            <label style="margin-bottom: 5px; font-weight: bold;">Full Name</label>
            <input type="text" name="name" placeholder="Enter your name" required
                style="padding: 14px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; width: 100%;">

            <label style="margin-bottom: 5px; font-weight: bold;">Email</label>
            <input type="email" name="email" placeholder="Enter your email" required
                style="padding: 14px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; width: 100%;">

            <label style="margin-bottom: 5px; font-weight: bold;">Phone Number</label>
            <input type="tel" name="phone" placeholder="Enter your phone number" required
                style="padding: 14px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; width: 100%;">

            <label style="margin-bottom: 5px; font-weight: bold;">Date of Birth</label>
            <input type="date" name="dob" required
                style="padding: 14px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; width: 100%;">

            <label style="margin-bottom: 5px; font-weight: bold;">Address</label>
            <textarea name="address" placeholder="Enter your address" rows="3" required
                style="padding: 14px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 6px; resize: none; font-size: 16px; width: 100%;"></textarea>

            <label style="margin-bottom: 5px; font-weight: bold;">Password</label>
            <input type="password" name="password" placeholder="Create a password" required
                style="padding: 14px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; width: 100%;">

            <label style="margin-bottom: 5px; font-weight: bold;">User Type</label>
            <select name="user_type" required
                style="padding: 14px; margin-bottom: 25px; border: 1px solid #ccc; border-radius: 6px; font-size: 16px; width: 100%;">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>

            <button type="submit"
                style="padding: 14px; background: #3498db; color: white; font-weight: bold; border: none; border-radius: 6px; cursor: pointer; transition: background 0.3s; font-size: 16px;">
                Register
            </button>

            <p style="margin-top: 15px; text-align: center;">
                Already registered? <a href="/login" style="color: #3498db; text-decoration: none;">Login</a>
            </p>
        </form>
    </div>
</div>

@include('footer')

</body>
</html>
