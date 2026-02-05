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
        @keyframes slideIn { from {opacity:0; transform:translateX(-20px);} to {opacity:1;} }

        .animate-fade-in { animation: fadeIn .8s ease-out forwards; }
        .animate-slide-in { animation: slideIn .6s ease-out forwards; }

        .delay-200 { animation-delay: .2s; }
        .delay-400 { animation-delay: .4s; }
        .delay-600 { animation-delay: .6s; }

        .bg-gradient-custom {
            background: linear-gradient(135deg, #f4f7fa, #e1e8ef);
        }

        .btn-hover {
            transition: all .3s ease;
        }

        .btn-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px -8px rgba(0,0,0,.15);
        }
    </style>
</head>

<body class="font-sans bg-gradient-custom min-h-screen text-base">

<header class="fixed top-0 w-full bg-white/80 backdrop-blur border-b shadow-sm z-50">
    <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">

        <h1 class="text-2xl font-bold animate-slide-in">
            <span class="text-blue-600">Sistem</span> Informasi Magang
        </h1>

        <div>
            @auth
                <a href="{{ auth()->user()->role === 'admin' ? route('dashboard.admin') : route('dashboard.siswa') }}"
                   class="btn-hover text-base font-medium text-gray-700">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="btn-hover text-base font-medium text-gray-700">
                    Login
                </a>
            @endauth
        </div>

    </div>
</header>

<main class="min-h-screen flex items-center justify-center pt-24 px-6">
    <div class="max-w-4xl text-center">

        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 animate-fade-in">
            Selamat Datang di
            <span class="text-blue-600 block mt-2">
                Sistem Informasi Magang
            </span>
        </h1>

        <p class="text-lg md:text-xl text-gray-600 mt-6 animate-fade-in delay-200">
            Sistem terpadu untuk mengelola dan memantau program magang siswa SMK.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-14 animate-fade-in delay-400">

            <div class="bg-white rounded-2xl p-6 shadow border">
                <h3 class="text-lg font-semibold mb-2">Lihat Peserta</h3>
                <p class="text-gray-600">
                    Menampilkan data peserta magang dengan rapi.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow border">
                <h3 class="text-lg font-semibold mb-2">Tambah Peserta</h3>
                <p class="text-gray-600">
                    Menambahkan peserta magang dengan validasi otomatis.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow border">
                <h3 class="text-lg font-semibold mb-2">Kelola Data</h3>
                <p class="text-gray-600">
                    Edit dan hapus data peserta dengan aman.
                </p>
            </div>

        </div>

        @guest
        <div class="mt-14 flex justify-center gap-4 animate-fade-in delay-600">
            <a href="{{ route('login') }}"
               class="btn-hover px-8 py-3 bg-blue-600 text-white rounded-xl text-base">
                Masuk
            </a>

            @if(Route::has('register'))
            <a href="{{ route('register') }}"
               class="btn-hover px-8 py-3 bg-white border border-blue-600 text-blue-600 rounded-xl text-base">
                Daftar
            </a>
            @endif
        </div>
        @endguest

        <div class="mt-16 text-sm text-gray-500">
            © {{ date('Y') }} Sistem Informasi Magang
        </div>

    </div>
</main>

</body>
</html>
