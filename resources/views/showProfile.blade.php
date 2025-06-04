<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Profile Image</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            flex-direction: column;
        }

        .brand-logo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid #2596be;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        h2 {
            margin-top: 20px;
            color: #2596be;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="content">
    <div class="brand-logo">
    <img src="{{ asset('profile/'.$admin->profile) }}" alt="Profile Image">

</div>
    </div>

</body>
</html>
