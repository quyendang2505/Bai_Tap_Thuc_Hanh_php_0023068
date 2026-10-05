<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <!-- Phần Header -->
        @include('partial.header')

        <!-- Phần Sidebar -->
        @include('partial.sidebar')

        <!-- Phần Nội dung chính -->
        <main class="content">
            @yield('content')
        </main>

        <!-- Phần Footer -->
        @include('partial.footer')
    </div>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => toastr.success(@json(session('success'))));
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', () => toastr.error(@json(session('error'))));
        </script>
    @endif
</body>
</html>