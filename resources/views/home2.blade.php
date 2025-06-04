<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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
        }

        a {
            text-decoration: none;
        }

        li {
            list-style: none;
        }

        h1 {
            color: white;
            font-size: 24px;
        }

        .btn {
            background: #f05462;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            transition: 0.3s ease-in-out;
            font-weight: bold;
            display: inline-block;
        }

        .btn:hover {
            color: #f05462;
            background: white;
            border: 2px solid #f05462;
        }

        /* Sidebar */
        .side-menu {
            position: fixed;
            background-color: #f05462;
            width: 18vw;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
        }

        .side-menu .brand-name {
            height: 10vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .side-menu ul {
            padding-top: 20px;
        }

        .side-menu li {
            font-size: 18px;
            padding: 12px 30px;
            color: white;
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            border-radius: 6px;
        }

        .side-menu li i {
            font-size: 22px;
        }

        .side-menu li:hover {
            background: white;
            color: #f05462;
            transform: translateX(5px);
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
        }

        /* Main Content */
        .container {
            margin-left: 18vw;
            width: 82vw;
            height: 100vh;
            background: #f1f1f1;
            padding: 20px;
        }

        /* Header */
        .header {
            width: 100%;
            height: 10vh;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
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
            color: #f05462;
        }

        .search button:hover i {
            color: #d43b50;
            transform: scale(1.1);
        }

        /* User Section */
        .user {
            display: flex;
            align-items: center;
        }

    </style>
</head>
<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Brand</h1>
        </div>
        <ul>
            <li><i class="bi bi-speedometer2"></i> Dashboard</li>
            <li><i class="bi bi-book"></i> Student</li>
            <li><i class="bi bi-person-badge"></i> Teacher</li>
            <li><i class="bi bi-bookmark"></i> Course</li>
            <li><i class="bi bi-credit-card"></i> Payment</li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search...">
                    <button type="submit"><i class="bi bi-search"></i></button>
                </div>
                <div class="user">
                    <a href="#" class="btn">+ Add New</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
