<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Informasi Magang</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes fadeIn { from {opacity:0; transform:translateY(20px);} to {opacity:1;} }
        @keyframes slideIn { from {opacity:0; transform:translateX(-15px);} to {opacity:1;} }

        .animate-fade-in { animation: fadeIn .6s ease-out forwards; }
        .animate-slide-in { animation: slideIn .5s ease-out forwards; }

        .bg-gradient-custom { background: linear-gradient(135deg, #f5f7fa, #e9eef3); }
    </style>
</head>

<body class="font-sans bg-gradient-custom min-h-screen text-gray-700">

<!-- HEADER -->
<header class="fixed top-0 inset-x-0 z-50 bg-white/90 backdrop-blur border-b">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">

        <h1 class="text-lg font-semibold animate-slide-in">
            <span class="text-blue-600">SIM</span> Magang
        </h1>

        @auth
            <a href="{{ auth()->user()->role === 'admin'
                ? route('dashboard.admin')
                : route('dashboard.siswa') }}"
               class="text-sm hover:text-gray-900 animate-slide-in">
                Dashboard
            </a>
        @else
            <a href="{{ route('login') }}" class="text-sm hover:text-gray-900 animate-slide-in">
                Login
            </a>
        @endauth
    </div>
</header>

<!-- MAIN -->
<main class="pt-24 pb-16 px-6">
    <div class="max-w-4xl mx-auto text-center">

        <!-- TITLE -->
        <h1 class="animate-fade-in text-2xl sm:text-3xl font-semibold text-gray-900 leading-snug">
            Sistem Informasi Magang
        </h1>

        <p class="animate-fade-in mt-4 text-sm sm:text-base text-gray-600 max-w-2xl mx-auto">
            Sistem untuk mengelola data peserta magang, memantau perkembangan,  
            dan membantu administrasi secara lebih rapi dan efisien.
        </p>

        <!-- FEATURES -->
        <div class="mt-12 grid grid-cols-1 sm:grid-cols-3 gap-6 text-left">

            <div class="bg-white p-6 rounded-xl border animate-fade-in">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 21v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-gray-900 mb-1">Data Peserta</h3>
                <p class="text-sm text-gray-600">
                    Melihat dan mengelola data peserta magang dengan rapi.
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl border animate-fade-in">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-gray-900 mb-1">Tambah Peserta</h3>
                <p class="text-sm text-gray-600">
                    Input data peserta baru dengan validasi otomatis.
                </p>
            </div>

            <div class="bg-white p-6 rounded-xl border animate-fade-in">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12H9"/>
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-gray-900 mb-1">Kelola Data</h3>
                <p class="text-sm text-gray-600">
                    Edit dan hapus data dengan aman dan cepat.
                </p>
            </div>

        </div>

        <!-- BUTTON -->
        <div class="mt-12 animate-fade-in">
            @guest
                <a href="{{ route('login') }}"
                   class="inline-flex items-center justify-center px-6 py-2.5 rounded-lg bg-blue-600 text-white text-sm hover:bg-blue-700">
                    Masuk ke Sistem
                </a>
            @else
                <a href="/dashboard"
                   class="inline-flex items-center justify-center px-6 py-2.5 rounded-lg bg-blue-600 text-white text-sm hover:bg-blue-700">
                    Ke Dashboard
                </a>
            @endguest
        </div>

        <!-- FOOTER -->
        <div class="mt-16 text-xs text-gray-500">
            © {{ date('Y') }} Sistem Informasi Magang
        </div>

    </div>
</main>

</body>
</html>
