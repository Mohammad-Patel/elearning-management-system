<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.21/dist/sweetalert2.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.21/dist/sweetalert2.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Admin Panel</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            background: #f8f9fa;
            margin-top: 10vh; /* Navbar ke height ke hisaab se adjust */
            min-height: 100vh;
            display: flex;
            background: #f8f9fa;
            padding-top: 0;  /* Yaha padding-top ko 0 kar diya gaya */
        }


        a {
            text-decoration: none;
        }

        li {
            list-style: none;
        }

        h1 {
            color: white;
            font-size: 20px;
            margin-top: 5px;
        }

        .btn {
            background: #2596be;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            transition: 0.3s ease-in-out;
            font-weight: bold;
            display: inline-block;
        }

        .btn:hover {
            color: #2596be;
            background: white;
            border: 2px solid #2596be;
        }

        /* Sidebar */
        .side-menu {
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(135deg, #2596be, #2596be);
            width: 18vw;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.2);
            transition: 0.3s ease-in-out;
            z-index: 1000;  /* Sidebar ko top pe laane ke liye */
        }


        .brand-name {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .brand-logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            border: 3px solid white;
            box-shadow: 0px 4px 8px rgba(255, 255, 255, 0.2);
        }

        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .side-menu ul {
            padding-top: 20px;
            width: 100%;
        }

        .side-menu li {
            font-size: 18px;
            padding: 12px 30px;
            color: white;
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            border-radius: 6px;
            position: relative;
        }

        .side-menu li i {
            font-size: 22px;
        }

        .side-menu li:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            transform: translateX(10px);
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .side-menu li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 5px;
            height: 0%;
            background: white;
            transition: height 0.3s ease-in-out;
        }

        .side-menu li:hover::before {
            height: 100%;
        }

        /* Main Content */
        .container {
            width: calc(100% - 18vw); /* Sidebar ki width ke hisaab se adjust */
            margin-left: 18vw;
            height: 100vh;
            background: #f1f1f1;
            padding: 0; /* Extra padding hata di */
        }


        /* Header */
        .header {
            position: fixed;
            top: 0;
            left: 18vw; /* Sidebar ke right me ho */
            width: calc(100% - 18vw);
            height: 10vh;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            z-index: 999; /* Navbar ko sidebar ke upar rakhne ke liye */
        }

        .nav {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Search Bar */
        .search {
            display: flex;
            align-items: center;
            background: #f1f1f1;
            border-radius: 30px;
            padding: 8px 15px;
            box-shadow: inset 2px 2px 5px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease-in-out;
        }

        .search:hover {
            background: #e9ecef;
        }

        .search input {
            border: none;
            background: transparent;
            padding: 8px;
            outline: none;
            width: 250px;
            font-size: 16px;
        }

        .search button {
            border: none;
            background: transparent;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        .search button i {
            font-size: 22px;
            color: #2596be;
        }

        .search button:hover i {
            color: #2596be;
            transform: scale(1.1);
        }

        /* User Section */
        .user {
            display: flex;
            align-items: center;
        }

        .img-case {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 15px;
            border: 2px solid #2596be;
        }

        .img-case img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Dropdown Menu */
        .dropdown {
            position: absolute;
            top: 50px;
            right: 0;
            background: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            width: 150px;
            opacity: 0;  
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease-in-out;
        }

        .dropdown.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
            transition: 0.3s ease-in-out;
        }

        .dropdown a:hover {
            background: #2596be;
            color: white;
        }

    </style>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <div class="brand-logo">
                <img src="{{ asset('img/campus.jpg') }}" alt="Brand Logo">
            </div>
            <br>
            <h1 style="font-size: 30px;">Admin</h1>
        </div>

<ul style="list-style: none; padding: 0; margin: 0; text-align: center; color: white;">
    <hr style="width: 80%; border: 0.5px solid rgba(255, 255, 255, 0.5); margin: 5px auto;">

    <li>
        <a href="{{url('admin_dashboard')}}" style="text-decoration: none; color: white; display: flex; align-items: center; gap: 35px; justify-content: center;">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
    </li>

    <hr style="width: 80%; border: 0.5px solid rgba(255, 255, 255, 0.5); margin: 5px auto;">

    <li>
        <a href="{{url('admin_details')}}" style="text-decoration: none; color: white; display: flex; align-items: center; gap: 35px; justify-content: center;">
            <i class="bi bi-person-circle"></i> Admin Profile
        </a>
    </li>

    <hr style="width: 80%; border: 0.5px solid rgba(255, 255, 255, 0.5); margin: 5px auto;">

    <li>
        <a href="{{url('student_description')}}" style="text-decoration: none; color: white; display: flex; align-items: center; gap: 35px; justify-content: center;">
            <i class="bi bi-book"></i> Student
        </a>
    </li>

    <hr style="width: 80%; border: 0.5px solid rgba(255, 255, 255, 0.5); margin: 5px auto;">

    <li>
        <a href="{{url('teacher_description')}}" style="text-decoration: none; color: white; display: flex; align-items: center; gap: 35px; justify-content: center;">
            <i class="bi bi-person-badge"></i> Teacher
        </a>
    </li>

    <hr style="width: 80%; border: 0.5px solid rgba(255, 255, 255, 0.5); margin: 5px auto;">

    <li>
        <a href="{{url('course_description')}}" style="text-decoration: none; color: white; display: flex; align-items: center; gap: 35px; justify-content: center;">
            <i class="bi bi-bookmark"></i> Course
        </a>
    </li>

    <hr style="width: 80%; border: 0.5px solid rgba(255, 255, 255, 0.5); margin: 5px auto;">

    <li>
        <a href="{{url('amount')}}" style="text-decoration: none; color: white; display: flex; align-items: center; gap: 35px; justify-content: center;">
            <i class="bi bi-credit-card"></i> Payment
        </a>
    </li>

    <hr style="width: 80%; border: 0.5px solid rgba(255, 255, 255, 0.5); margin: 5px auto;">

    <li>
        <a href="{{url('reviews')}}" style="text-decoration: none; color: white; display: flex; align-items: center; gap: 35px; justify-content: center;">
            <i class="bi bi-chat-dots"></i> Reviews
        </a>
    </li>

    <hr style="width: 80%; border: 0.5px solid rgba(255, 255, 255, 0.5); margin: 5px auto;">

    <li style="position: relative;">
    <a href="javascript:void(0);" id="settingsBtn" style="text-decoration: none; color: white; display: flex; align-items: center; gap: 35px; justify-content: center;">
        <i class="fas fa-cog"></i>LayoutSetting
    </a>
    
    <!-- Dropdown menu -->
    <ul id="settingsDropdown" style="display: none; position: absolute; top: 100%; left: 0; list-style: none; padding: 10px; margin: 0; z-index: 1000;">
        <li><a href="{{url('coursenavigation')}}" style="color: white; text-decoration: none;"><i class="fas fa-compass" style="margin-right: 20px;"></i> Course Navigation</a></li>
                <hr style="width: 80%; border: 0.5px solid rgba(255, 255, 255, 0.5); margin: 5px auto;">
        <li><a href="#" style="color: white; text-decoration: none;"><i class="fas fa-chalkboard-teacher" style="margin-right: 20px;"></i> Expert Instructors</a></li>
                <hr style="width: 80%; border: 0.5px solid rgba(255, 255, 255, 0.5); margin: 5px auto;">
    </ul>
    </li>


    <hr style="width: 80%; border: 0.5px solid rgba(255, 255, 255, 0.5); margin: 5px auto;">
</ul>

    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search...">
                    <button type="submit"><i class="bi bi-search"></i></button>
                </div>
                <div class="user" id="userDropdown">
                <div class="user" id="userDropdown" style="display: flex; align-items: center; gap: 20px;">
    <div class="img-case">
        <img src="{{ asset('img/team-1.jpg') }}" alt="Brand Logo">
    </div>
    <div class="dropdown-container" style="position: relative; display: flex; align-items: center; gap:0px;">

    <button class="dropdown-toggle" onclick="toggleDropdown()" 
        style="background: white; color: #2596be; padding: 10px 18px; border-radius: 8px; border: none; cursor: pointer; font-weight: bold;">
        <h2 style="color: #2596be;">Profile ▼</h2>
    </button>
    <div class="dropdown-menu" id="dropdownMenu" 
        style="position: absolute; top: 50px; right: 0; background: #2596be; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); 
               border-radius: 8px; overflow: hidden; display: none; width: 120px; text-align: center; z-index: 1000;">
        <a href="{{url('logout')}}" style="display: block; padding: 10px; color: white; text-decoration: none; transition: 0.3s ease-in-out; font-size: 18px;">
            <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i> Logout
        </a>

        <a href="#" style="display: block; padding: 10px; color: white; text-decoration: none; transition: 0.3s ease-in-out; font-size: 18px;">
    <i class="fas fa-cog" style="margin-right: 8px;"></i> Settings
</a>

    </div>
</div>

</div>

            </div>
        </div>
    </div>

    @yield('details')
    <script>
        document.getElementById("settingsBtn").addEventListener("click", function () {
        var dropdown = document.getElementById("settingsDropdown");
        dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
        });

        function toggleDropdown() {
            var menu = document.getElementById("dropdownMenu");
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
        }

        document.addEventListener("click", function(event) {
            if (!event.target.closest(".user")) {
                document.getElementById("dropdownMenu").style.display = "none";
            }
        });
    </script>


</body>
</html>
