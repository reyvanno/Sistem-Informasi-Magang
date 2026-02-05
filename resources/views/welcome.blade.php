<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Informasi Magang</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .animate-fade-in { animation: fadeIn .8s ease-out forwards; }
        .animate-slide-in { animation: slideIn .6s ease-out forwards; }

        .delay-200 { animation-delay: .2s; }
        .delay-400 { animation-delay: .4s; }
        .delay-600 { animation-delay: .6s; }
        .delay-800 { animation-delay: .8s; }
        .delay-1000 { animation-delay: 1s; }

        .bg-gradient-custom {
            background: linear-gradient(135deg, #f4f7fa, #e1e8ef);
        }

        .btn-hover {
            transition: all .25s ease;
        }
        .btn-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 30px -10px rgba(0,0,0,.18);
        }

        .card-hover {
            transition: all .25s ease;
        }
        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px -12px rgba(0,0,0,.15);
        }
    </style>
</head>

<body class="font-sans bg-gradient-custom min-h-screen">

<!-- HEADER -->
<header class="fixed top-0 inset-x-0 z-50 bg-white/80 backdrop-blur-md border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 h-16 sm:h-20 flex items-center justify-between">

        <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold animate-slide-in">
            <span class="text-blue-600">Sistem</span> Informasi Magang
        </h1>

        <div class="flex items-center gap-4 sm:gap-6">
            @if(auth()->check())
                <a href="{{ auth()->user()->role === 'admin'
                    ? route('dashboard.admin')
                    : route('dashboard.siswa') }}"
                   class="btn-hover text-sm sm:text-base lg:text-lg text-gray-700 hover:text-gray-900 animate-slide-in delay-200">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="btn-hover text-sm sm:text-base lg:text-lg text-gray-700 hover:text-gray-900 animate-slide-in delay-200">
                    Login
                </a>
            @endif
        </div>

    </div>
</header>

<!-- MAIN -->
<main class="pt-28 sm:pt-32 px-4 sm:px-8">
    <div class="max-w-5xl mx-auto text-center">

        <!-- TITLE -->
        <div class="animate-fade-in">
            <h1 class="text-3xl sm:text-4xl lg:text-[52px] font-extrabold text-gray-900 leading-tight">
                Selamat Datang di
                <span class="block text-blue-600 mt-3 sm:mt-4">
                    Sistem Informasi Magang
                </span>
            </h1>
        </div>

        <!-- DESC -->
        <div class="animate-fade-in delay-200 mt-6 sm:mt-8">
            <p class="text-base sm:text-lg lg:text-[22px] text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Sistem terpadu untuk mengelola dan memantau program magang siswa SMK.
                Kelola data peserta, pantau perkembangan, dan tingkatkan efisiensi administrasi magang.
            </p>
        </div>

        <!-- FEATURES -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 mt-14 mb-16">

            <!-- CARD -->
            <div class="card-hover bg-white p-6 sm:p-8 lg:p-10 rounded-3xl border animate-fade-in delay-400">
                <div class="w-14 h-14 sm:w-16 sm:h-16 lg:w-20 lg:h-20 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 21v-2a4 4 0 00-4-4H7a4 4 0 00-4 4v2m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7a4 4 0 118 0 4 4 0 01-8 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold mb-2">Lihat Peserta</h3>
                <p class="text-sm sm:text-base lg:text-lg text-gray-600">
                    Melihat daftar peserta magang dengan tampilan rapi dan terstruktur.
                </p>
            </div>

            <div class="card-hover bg-white p-6 sm:p-8 lg:p-10 rounded-3xl border animate-fade-in delay-600">
                <div class="w-14 h-14 sm:w-16 sm:h-16 lg:w-20 lg:h-20 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold mb-2">Tambah Peserta</h3>
                <p class="text-sm sm:text-base lg:text-lg text-gray-600">
                    Menambahkan peserta baru dengan data lengkap dan validasi otomatis.
                </p>
            </div>

            <div class="card-hover bg-white p-6 sm:p-8 lg:p-10 rounded-3xl border animate-fade-in delay-800">
                <div class="w-14 h-14 sm:w-16 sm:h-16 lg:w-20 lg:h-20 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl lg:text-2xl font-semibold mb-2">Edit & Hapus</h3>
                <p class="text-sm sm:text-base lg:text-lg text-gray-600">
                    Mengedit dan menghapus data peserta dengan aman dan cepat.
                </p>
            </div>

        </div>

        <!-- BUTTON -->
        @guest
        <div class="animate-fade-in delay-1000 flex flex-col sm:flex-row justify-center gap-4 sm:gap-6">
            <a href="{{ route('login') }}"
               class="btn-hover px-6 sm:px-8 py-3 sm:py-4 bg-blue-600 text-white rounded-2xl text-base sm:text-lg lg:text-xl flex items-center gap-3">
                Masuk ke Sistem
            </a>

            <a href="{{ route('register') }}"
               class="btn-hover px-6 sm:px-8 py-3 sm:py-4 border border-blue-600 text-blue-600 rounded-2xl text-base sm:text-lg lg:text-xl">
                Buat Akun Baru
            </a>
        </div>
        @endguest

        <!-- FOOTER -->
        <div class="mt-20 pt-8 border-t text-sm sm:text-base text-gray-600 animate-fade-in">
            Sistem ini dikembangkan dengan ❤️ menggunakan Laravel 12 & Tailwind CSS
        </div>

    </div>
</main>

</body>
</html>
