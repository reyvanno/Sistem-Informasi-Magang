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
        .btn-hover:hover { transform: translateY(-4px); box-shadow: 0 18px 35px -10px rgba(0,0,0,.18); }

        .card-hover { transition: all .3s ease; }
        .card-hover:hover { transform: translateY(-8px); box-shadow: 0 25px 45px -12px rgba(0,0,0,.15); }

        .title-xl { font-size: 52px; font-weight: 800; }
        .subtitle-xl { font-size: 22px; }

        header { font-size: 22px; }

        .rounded-xl-xl { border-radius: 22px; }
    </style>
</head>

<body class="font-sans bg-gradient-custom min-h-screen">

<!-- HEADER -->
<header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-10 h-20 flex items-center justify-between">

        <h1 class="text-3xl font-bold animate-slide-in">
            <span class="text-blue-600">Sistem</span> Informasi Magang
        </h1>

        <div class="flex items-center gap-6">
            @if (Route::has('login'))
                @auth
                    <a href="/dashboard"
                       class="btn-hover text-[20px] text-gray-700 hover:text-gray-900 animate-slide-in delay-200">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="btn-hover text-[20px] text-gray-700 hover:text-gray-900 animate-slide-in delay-200">
                        Masuk
                    </a>
                @endauth
            @endif
        </div>
    </div>
</header>


<!-- MAIN CONTENT -->
<main class="min-h-screen flex items-center justify-center px-10 pt-32">
    <div class="max-w-5xl mx-auto text-center">

        <!-- TITLE -->
        <div class="animate-fade-in">
            <h1 class="title-xl text-gray-900 leading-tight">
                Selamat Datang di
                <span class="text-blue-600 block mt-4">Sistem Informasi Magang</span>
            </h1>
        </div>

        <!-- DESCRIPTION -->
        <div class="animate-fade-in delay-200 mt-8">
            <p class="subtitle-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Sistem terpadu untuk mengelola dan memantau program magang siswa SMK.  
                Kelola data peserta, pantau perkembangan, dan tingkatkan efisiensi administrasi magang.
            </p>
        </div>

        <!-- Feature Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-20">

            <!-- Lihat Peserta -->
            <div class="card-hover bg-white p-10 rounded-3xl shadow-sm border border-gray-200 animate-fade-in animation-delay-400">
                <div class="w-20 h-20 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 21v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7a4 4 0 118 0 4 4 0 01-8 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3">Lihat Peserta</h3>
                <p class="text-lg text-gray-600">
                    Melihat daftar peserta magang dengan tampilan lebih rapi dan terstruktur.
                </p>
            </div>

            <!-- Tambah Peserta -->
            <div class="card-hover bg-white p-10 rounded-3xl shadow-sm border border-gray-200 animate-fade-in animation-delay-500">
                <div class="w-20 h-20 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3">Tambah Peserta</h3>
                <p class="text-lg text-gray-600">
                    Menambahkan peserta baru dengan data lengkap dan validasi otomatis.
                </p>
            </div>

            <!-- Edit & Hapus Peserta -->
            <div class="card-hover bg-white p-10 rounded-3xl shadow-sm border border-gray-200 animate-fade-in animation-delay-600">
                <div class="w-20 h-20 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0zM4 4l16 16" />
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3">Edit & Hapus Peserta</h3>
                <p class="text-lg text-gray-600">
                    Mengedit data peserta maupun menghapusnya dengan proses cepat dan aman.
                </p>
            </div>

        </div>

        <!-- BUTTONS -->
        @guest
            <div class="animate-fade-in delay-800 mt-16 flex flex-col sm:flex-row justify-center gap-6">

                <a href="{{ route('login') }}"
                class="btn-hover px-10 py-4 bg-blue-600 text-white rounded-2xl text-[22px] hover:bg-blue-700 flex items-center gap-3">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                    Masuk ke Sistem
                </a>

                @if(Route::has('register'))
                    <a href="{{ route('register') }}"
                    class="btn-hover px-10 py-4 text-blue-600 bg-white border border-blue-600 rounded-2xl text-[22px] hover:bg-blue-50 flex items-center gap-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Buat Akun Baru
                    </a>
                @endif

            </div>
        @else
            <div class="animate-fade-in delay-800 mt-16">
                <a href="/dashboard"
                   class="btn-hover px-10 py-4 bg-blue-600 text-white rounded-2xl text-[22px] hover:bg-blue-700">
                    Ke Dashboard
                </a>
            </div>
        @endguest

        <!-- Additional Info -->
        <div class="mt-20 pt-10 border-t border-gray-300/50 animate-fade-in animation-delay-1000">
            <p class="text-xl text-gray-600 font-medium leading-relaxed">
                Sistem ini dikembangkan dengan ❤️ menggunakan Laravel 12 & Tailwind CSS
            </p>
            <p class="text-lg text-gray-500 mt-3">
                © {{ date('Y') }} Sistem Informasi Magang — Hak Cipta Dilindungi.
            </p>
        </div>

    </div>
</main>

</body>
</html>
