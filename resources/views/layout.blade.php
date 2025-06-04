<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Font Awesome ya CSS yahan include karo --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh; font-family: Arial, sans-serif; margin: 0;">

    {{-- Navbar --}}
    @include('navbar')

    {{-- Page Content --}}
    <div class="content" style="flex: 1; padding: 20px;">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('footer')

</body>
</html>
