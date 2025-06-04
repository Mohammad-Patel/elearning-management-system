<!-- resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
</head>
<body>
    <header>
        <h1>My Website Header</h1>
    </header>

    <main>
        @yield('main')  {{-- Yahan child view ka content aayega --}}
       
        {{-- Yahan pe jo bhi code likhna hai wo execute hoga --}}
        <p>This code will execute after</p>
        <p>Some extra content that should be displayed</p>

        @php exit; @endphp  {{-- Yahan se code execution ruk jayega --}}
    </main>

    <p>Footer Content</p>
    <p>Footer Content</p>
    <footer>
        <p>Footer Content</p>
    </footer>
</body>
</html>
