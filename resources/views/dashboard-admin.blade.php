<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin | Sistem Informasi Magang</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/alpinejs" defer></script>

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <style>
        @keyframes fadeIn { from {opacity:0; transform:translateY(30px);} to {opacity:1;} }
        @keyframes slideIn { from {opacity:0; transform:translateX(-25px);} to {opacity:1;} }

        .animate-fade-in { animation: fadeIn .9s ease-out forwards; }
        .animate-slide-in { animation: slideIn .7s ease-out forwards; }

        .btn-hover:hover { transform: translateY(-3px); box-shadow:0 15px 30px -10px rgba(0,0,0,.2); }
        .card-hover:hover { transform: translateY(-6px); box-shadow:0 22px 40px -12px rgba(0,0,0,.15); }

        .bg-gradient-custom { background: linear-gradient(135deg, #f4f7fa, #e1e8ef); }
    </style>
</head>

<body class="font-sans bg-gradient-custom min-h-screen text-[18px]">

<!-- HEADER -->
<header class="fixed top-0 w-full bg-white/80 backdrop-blur border-b shadow-sm z-50">
    <div class="max-w-7xl mx-auto px-10 h-20 flex items-center justify-between">

        <h1 class="text-3xl font-bold text-gray-900 animate-slide-in">
            <span class="text-blue-600">Dashboard</span> Admin
        </h1>

        <!-- PROFIL -->
        <div x-data="{ open:false }" class="relative animate-slide-in">
            <button @click="open = !open"
                    class="flex items-center gap-4 px-4 py-2 rounded-xl hover:bg-gray-100 transition">

                @php $initial = strtoupper(substr(auth()->user()->name,0,1)); @endphp
                <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center text-xl font-bold">
                    {{ $initial }}
                </div>

                <span class="font-semibold text-lg text-gray-800">
                    {{ auth()->user()->name }}
                </span>

                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="open" @click.away="open=false" x-transition
                 class="absolute right-0 mt-3 w-56 bg-white border rounded-xl shadow-xl py-2">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-4 py-3 text-lg text-red-600 hover:bg-red-50">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<!-- CONTENT -->
<main class="max-w-7xl mx-auto px-10 pt-36 pb-24 animate-fade-in">
    <div class="bg-white rounded-3xl border shadow-xl p-12 card-hover">

        <h2 class="text-4xl font-bold text-gray-900 mb-6">
            Selamat Datang, <span class="text-blue-600">{{ auth()->user()->name }}</span>!
        </h2>

        <p class="text-2xl text-gray-700 mb-10">
            Anda login sebagai
            <span class="bg-blue-100 text-blue-800 px-4 py-1 rounded-xl font-semibold">
                admin
            </span>
        </p>

        <a href="{{ route('interns.index') }}"
           class="btn-hover px-10 py-4 bg-blue-600 text-white rounded-2xl text-2xl hover:bg-blue-700">
            Kelola Peserta Magang
        </a>

    </div>
</main>

</body>
</html>
