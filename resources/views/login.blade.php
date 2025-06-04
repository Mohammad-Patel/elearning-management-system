<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=1100, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
  <title>User Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body style="background:rgb(228, 239, 240); height: 100vh; display: flex; justify-content: center; align-items: center;"> 

 <!-- Joint Container -->
  <div style="display: flex; width: 1100px; height: 600px; border-radius: 5px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">

    <!-- Login Box (Left Side) -->
    <div style="background: #2596be; padding: 60px; width: 50%;">
      <div style="text-align: center; margin-bottom: 30px; border: 3px solid white; border-radius: 50%; width: 120px; height: 120px; display: flex; justify-content: center; align-items: center; margin: 0 auto;">
        <i class="fas fa-user-lock" style="font-size: 60px; color: white;"></i>
      </div>

      <h2 style="text-align: center; margin-bottom: 25px; color: white;">Login</h2>

      @if($errors->any())
        <div class="alert alert-danger">
          {{ $errors->first() }}
        </div>
      @endif

      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <form action="{{ route('login.process') }}" method="POST">
        @csrf
        <div style="position: relative; margin-bottom: 20px;">
          <i class="fas fa-envelope" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: gray;"></i>
          <input type="email" name="email" class="form-control" placeholder="Email" required style="padding-left: 45px; height: 50px;">
        </div>

        <div style="position: relative; margin-bottom: 20px;">
          <i class="fas fa-lock" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: gray;"></i>
          <input type="password" name="password" class="form-control" placeholder="Password" required style="padding-left: 45px; height: 50px;">
        </div>

        <button type="submit" class="btn btn-light w-100" style="display: flex; align-items: center; justify-content: center; gap: 8px; height: 50px;">
          <i class="fas fa-sign-in-alt"></i> Login
        </button>
      </form>

      <p style="text-align: center; margin-top: 20px; color: white;">
        Don't have an account? <a href="{{url('register')}}" style="color: #ffeb3b;">Register</a>
      </p>
    </div>

    <!-- Image Box (Right Side) -->
    <div style="width: 50%;">
      <img src="https://images.pexels.com/photos/1181391/pexels-photo-1181391.jpeg" alt="Professional Institute" style="width: 100%; height: 100%; object-fit: cover;">
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
