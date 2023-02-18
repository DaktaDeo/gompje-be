<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.html-head')

    <!-- Scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    <?php
        $title = '';//data_get($parsedFrontMatter, 'title')
    ?>

    <title>{{$title}}</title>
    @stack('endHead')
    @livewireStyles
</head>
<body class="font-sans antialiased">
<script>/**/</script><!-- Empty script to prevent FOUC in Firefox -->
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    @if($title !== null)
    <h1>
        <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight sm:text-4xl">
            {{$title}}
        </span>
    </h1>
    @endif

    <main>
        {{ $slot }}
    </main>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
