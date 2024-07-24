<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8">
    <link href="{{ asset('assets/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
    <title>Job Tracker System</title>
    @vite('resources/css/app.css')
</head>
<body class="py-5 md:py-0">
    <div id="app"></div>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @vite('resources/js/app.js')
</body>
</html>