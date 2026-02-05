<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Informasi Magang</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* === ANIMASI === */
        @keyframes fadeIn { from {opacity:0; transform:translateY(30px);} to {opacity:1;} }
        @keyframes slideIn { from {opacity:0; transform:translateX(-25px);} to {opacity:1;} }

        .animate-fade-in { animation: fadeIn .9s ease-out forwards; }
        .animate-slide-in { animation: slideIn .7s ease-out forwards; }

        .delay-200 { animation-delay: .2s; }
        .delay-400 { animation-delay: .4s; }
        .delay-600 { animation-delay: .6s; }
        .delay-800 { animation-delay: .8s; }
        .delay-1000 { animation-delay: 1s; }

        /* === THEME === */
        .bg-gradient-custom { background: linear-gradient(135deg, #f4f7fa, #e1e8ef); }

        .btn-hover { transition: all .3s ease; }
        .btn-hover:hover { transform: translateY(-3px); box-shadow: 0 16px 30px -10px rgba(0,0,0,.18); }

        .card-hover { transition: all .3s ease; }
        .card-hover:hover { transform: translateY(-6px); box-shadow: 0 22px 40px -12px rgba(0,0,0,.15); }

        /* ⬇️ HANYA UKURAN DITURUNKAN (INI INTINYA) */
        .title-xl {
            font-size: 40px;   /* sebelumnya 52px */
            font-weight: 800;
        }

        .subtitle-xl {
            font-size: 18px;   /* sebelumnya 22px */
        }

        header {
            font-size: 18px;   /* sebelumnya 22px */
        }
    </style>
</head>

<body class="font-sans bg-gradient-custom min-h-screen text-[16px]">

<!-- HEADER -->
<header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">

        <h1 class="text-2xl font-bold animate-slide-in">
            <span class="text-blue-600">Sistem</span> Informasi Magang
        </h1>

        <div class="flex items-center gap-6">
            @if(auth()->check())
                <a href="{{ auth()->user()->role === 'admin'
                    ? route('dashboard.admin')
                    : route('dashboard.siswa') }}"
                   class="btn-hover text-[16px] text-gray-700 hover:text-gray-900 animate-slide-in delay-200">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="btn-hover text-[16px] text-gray-700 hover:text-gray-900 animate-slide-in delay-200">
                    Login
                </a>
            @endif
        </div>
    </div>
</header>

<!-- MAIN CONTENT -->
<main class="min-h-screen flex items-center justify-center px-6 pt-32">
    <div class="max-w-5xl mx-auto text-center">

        <!-- TITLE -->
        <div class="animate-fade-in">
            <h1 class="title-xl text-gray-900 leading-tight">
                Selamat Datang di
                <span class="text-blue-600 block mt-3">
                    Sistem Informasi Magang
                </span>
            </h1>
        </div>

        <!-- DESCRIPTION -->
        <div class="animate-fade-in delay-200 mt-6">
            <p class="subtitle-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Sistem terpadu untuk mengelola dan memantau program magang siswa SMK.  
                Kelola data peserta, pantau perkembangan, dan tingkatkan efisiensi administrasi magang.
            </p>
        </div>

        <!-- Feature Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16 mt-14">

            <div class="card-hover bg-white p-8 rounded-3xl shadow-sm border border-gray-200 animate-fade-in delay-400">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Lihat Peserta</h3>
                <p class="text-base text-gray-600">
                    Melihat daftar peserta magang dengan tampilan lebih rapi dan terstruktur.
                </p>
            </div>

            <div class="card-hover bg-white p-8 rounded-3xl shadow-sm border border-gray-200 animate-fade-in delay-500">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Tambah Peserta</h3>
                <p class="text-base text-gray-600">
                    Menambahkan peserta baru dengan data lengkap dan validasi otomatis.
                </p>
            </div>

            <div class="card-hover bg-white p-8 rounded-3xl shadow-sm border border-gray-200 animate-fade-in delay-600">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Edit & Hapus Peserta</h3>
                <p class="text-base text-gray-600">
                    Mengedit data peserta maupun menghapusnya dengan proses cepat dan aman.
                </p>
            </div>

        </div>

        <!-- BUTTONS -->
        @guest
            <div class="animate-fade-in delay-800 mt-12 flex flex-col sm:flex-row justify-center gap-6">

                <a href="{{ route('login') }}"
                   class="btn-hover px-8 py-3 bg-blue-600 text-white rounded-2xl text-[18px] hover:bg-blue-700 flex items-center gap-3">
                    Masuk ke Sistem
                </a>

                @if(Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="btn-hover px-8 py-3 text-blue-600 bg-white border border-blue-600 rounded-2xl text-[18px] hover:bg-blue-50">
                        Buat Akun Baru
                    </a>
                @endif

            </div>
        @else
            <div class="animate-fade-in delay-800 mt-12">
                <a href="/dashboard"
                   class="btn-hover px-8 py-3 bg-blue-600 text-white rounded-2xl text-[18px] hover:bg-blue-700">
                    Ke Dashboard
                </a>
            </div>
        @endguest

        <!-- Additional Info -->
        <div class="mt-16 pt-8 border-t border-gray-300/50 animate-fade-in delay-1000">
            <p class="text-base text-gray-600 font-medium">
                Sistem ini dikembangkan dengan ❤️ menggunakan Laravel 12 & Tailwind CSS
            </p>
            <p class="text-sm text-gray-500 mt-2">
                © {{ date('Y') }} Sistem Informasi Magang — Hak Cipta Dilindungi.
            </p>
        </div>

    </div>
</main>

</body>
</html>
