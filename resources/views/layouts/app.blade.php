<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Product Management System')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        main {
            flex: 1;
        }

        /* Page Titles */
        h2 {
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* Tables */
        table {
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Buttons */
        .btn {
            border-radius: 6px;
        }

        /* Cards / Containers */
        .card-box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        /* Footer spacing */
        footer {
            margin-top: auto;
        }
    </style>
</head>

<body>

    {{--Header--}}
    @include('partials.header')

    {{--Main Content--}}
    <main class="container mt-4">
        @yield('content')
    </main>

    {{--Footer--}}
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>