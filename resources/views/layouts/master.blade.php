<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.html-head')

    <!-- Scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    <title>{{$post->title}}</title>
    @stack('endHead')
    @livewireStyles
</head>
<body class="font-sans antialiased">
<script>/**/</script><!-- Empty script to prevent FOUC in Firefox -->
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <main>
        {{ $slot }}
    </main>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
