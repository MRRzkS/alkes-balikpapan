<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Alkes Balikpapan') }} — Admin</title>
    <script>
        (function () {
            try {
                var t = localStorage.getItem('theme');
                if (t !== 'light' && t !== 'dark') t = 'dark';
                document.documentElement.classList.toggle('dark', t === 'dark');
            } catch (e) {}
        })();
    </script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-ink-900 dark:text-ink-100 transition-colors duration-500 relative overflow-x-hidden min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

    {{-- Ambient blobs --}}
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden" aria-hidden="true">
        <div class="animate-float absolute top-0 right-0 w-[28rem] h-[28rem] rounded-full bg-brand-400/20 blur-[100px]"></div>
        <div class="animate-float absolute bottom-0 left-0 w-[24rem] h-[24rem] rounded-full bg-brand-600/15 blur-[90px]" style="animation-delay: -4s;"></div>
    </div>

    <div>
        <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-brand-700 dark:text-white text-lg justify-center mb-6">
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-brand-500 to-brand-700 text-white shadow-lg shadow-brand-600/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12h14"/></svg>
            </span>
            Alkes Balikpapan
        </a>
    </div>

    <div class="glass w-full sm:max-w-md mt-2 px-6 py-8 sm:rounded-2xl">
        {{ $slot }}
    </div>
</body>
</html>
