<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Tailwind CSS -->
    <script src="{{ asset('js/browser@4.js') }}"></script>
    <!-- Alpine.js and Chart.js -->
    <script defer src="{{ asset('js/alpine-cdn.min.js') }}"></script>
    <script src="{{ asset('js/chart.umd.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body class="bg-slate-950">
    <div class="min-h-screen flex flex-col" x-data="dashboard()">
