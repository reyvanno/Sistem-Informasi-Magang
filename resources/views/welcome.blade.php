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
        /* === ANIMASI (TETAP) === */
        @keyframes fadeIn { from {opacity:0; transform:translateY(20px);} to {opacity:1;} }
        @keyframes slideIn { from {opacity:0; transform:translateX(-15px);} to {opacity:1;} }

        .animate-fade-in { animation: fadeIn .6s ease-out forwards; }
        .animate-slide-in { animation: slideIn .5s ease-out forwards; }

        .delay-200 { animation-delay: .2s; }
        .delay-400 { animation-delay: .4s; }
        .delay-600 { animation-delay: .6s; }
        .delay-800 { animation-delay: .8s; }
        .delay-1000 { animation-delay: 1s; }

        /* === THEME === */
        .bg-gradient-custom { background: linear-gradient(135deg, #f4f7fa, #e1e8ef); }

        .btn-hover { transition: all .25s ease; }
        .btn-hover:hover { transform: translateY(-2px); box-shadow: 0 10px 20px -10px rgba(0,0,0,.15); }

        .card-hover { transition: all .25s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 15px 30px -12px rgba(0,0,0,.15); }

        /* === SCALE DOWN (INTI PERUBAHAN) === */
        .title-xl { font-size: 32px; font-weight: 700; }
        .subtitle-xl { font-size: 16px; }

        header { font-size: 16px; }
    </style>
</head>

<body class="font-sans bg-gradient-custom min-h-screen">

<!-- HEADER -->
<header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">

        <h1 class="text-xl font-bold animate-slide-in">
            <span class="text-blue-600">Sistem</span> Informasi Magang
        </h1>

        <div class="flex items-center gap-4">
            @if(auth()->check())
                <a href="{{ auth()->user()->role === 'admin'
                    ? route('dashboard.admin')
                    : route('dashboard.siswa') }}"
                   class="btn-hover text-base text-gray-700 hover:text-gray-900 animate-slide-in delay-200">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="btn-hover text-base text-gray-700 hover:text-gray-900 animate-slide-in delay-200">
                    Login
                </a>
            @endif
        </div>
    </div>
</header>

<!-- MAIN CONTENT -->
<main class="min-h-screen flex items-center justify-center px-6 pt-28">
    <div class="max-w-5xl mx-auto text-center">

        <!-- TITLE -->
        <div class="animate-fade-in">
            <h1 class="title-xl text-gray-900 leading-snug">
                Selamat Datang di
                <span class="text-blue-600 block mt-2">Sistem Informasi Magang</span>
            </h1>
        </div>

        <!-- DESCRIPTION -->
        <div class="animate-fade-in delay-200 mt-4">
            <p class="subtitle-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Sistem terpadu untuk mengelola dan memantau program magang siswa SMK.
                Kelola data peserta, pantau perkembangan, dan tingkatkan efisiensi administrasi magang.
            </p>
        </div>

        <!-- Feature Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-14">

            <!-- Lihat Peserta -->
            <div class="card-hover bg-white p-6 rounded-2xl shadow-sm border border-gray-200 animate-fade-in delay-400">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 21v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Lihat Peserta</h3>
                <p class="text-sm text-gray-600">
                    Melihat daftar peserta magang dengan tampilan rapi dan terstruktur.
                </p>
            </div>

            <!-- Tambah Peserta -->
            <div class="card-hover bg-white p-6 rounded-2xl shadow-sm border border-gray-200 animate-fade-in delay-600">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Tambah Peserta</h3>
                <p class="text-sm text-gray-600">
                    Menambahkan peserta baru dengan data lengkap dan validasi otomatis.
                </p>
            </div>

            <!-- Edit & Hapus Peserta -->
            <div class="card-hover bg-white p-6 rounded-2xl shadow-sm border border-gray-200 animate-fade-in delay-800">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12H9"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Edit & Hapus Peserta</h3>
                <p class="text-sm text-gray-600">
                    Mengedit maupun menghapus data peserta dengan cepat dan aman.
                </p>
            </div>

        </div>

        <!-- BUTTONS -->
        @guest
            <div class="animate-fade-in delay-800 mt-10 flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('login') }}"
                   class="btn-hover px-6 py-3 bg-blue-600 text-white rounded-xl text-base hover:bg-blue-700">
                    Masuk ke Sistem
                </a>

                @if(Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="btn-hover px-6 py-3 text-blue-600 bg-white border border-blue-600 rounded-xl text-base hover:bg-blue-50">
                        Buat Akun Baru
                    </a>
                @endif
            </div>
        @else
            <div class="animate-fade-in delay-800 mt-10">
                <a href="/dashboard"
                   class="btn-hover px-6 py-3 bg-blue-600 text-white rounded-xl text-base hover:bg-blue-700">
                    Ke Dashboard
                </a>
            </div>
        @endguest

        <!-- FOOTER -->
        <div class="mt-16 pt-6 border-t border-gray-300/50 animate-fade-in delay-1000">
            <p class="text-sm text-gray-600 font-medium">
                Sistem ini dikembangkan dengan ❤️ menggunakan Laravel & Tailwind CSS
            </p>
            <p class="text-xs text-gray-500 mt-2">
                © {{ date('Y') }} Sistem Informasi Magang
            </p>
        </div>

    </div>
</main>

</body>
</html>
