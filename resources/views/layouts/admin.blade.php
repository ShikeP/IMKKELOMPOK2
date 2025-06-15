<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { padding-left: 180px; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    @include('partials.admin_sidebar')
    <main class="p-6">
        @yield('content')
    </main>
</body>
</html> 