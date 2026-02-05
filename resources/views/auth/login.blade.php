<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | Sistem Informasi Magang</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .bg-gradient-auth {
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        }

        .btn-hover {
            transition: all .3s ease;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,.12);
        }
    </style>
</head>

<body class="font-sans antialiased bg-gradient-auth min-h-screen">

<header class="fixed top-0 w-full bg-white/80 backdrop-blur border-b shadow-sm">
    <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
        <a href="/" class="text-xl font-bold text-gray-900">
            <span class="text-blue-600">Sistem</span> Magang
        </a>

        <a href="/" class="text-base text-gray-600">
            Beranda
        </a>
    </div>
</header>

<main class="min-h-screen flex items-center justify-center pt-24 px-6">
    <div class="w-full max-w-md bg-white rounded-2xl shadow border p-8">

        <h2 class="text-2xl font-bold text-center mb-6">
            Masuk ke Sistem
        </h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-5">
                <label class="block text-sm font-medium mb-2">
                    Username (NIP / NISN)
                </label>
                <input type="text"
                       name="username"
                       value="{{ old('username') }}"
                       required
                       class="w-full rounded-xl border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-blue-500">
                @error('username')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium mb-2">
                    Kata Sandi
                </label>
                <input type="password"
                       name="password"
                       required
                       class="w-full rounded-xl border-gray-300 px-4 py-3 focus:border-blue-500 focus:ring-blue-500">
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="btn-hover w-full py-3 bg-blue-600 text-white rounded-xl text-base font-semibold">
                Masuk
            </button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-6">
            © {{ date('Y') }} Sistem Informasi Magang
        </p>

    </div>
</main>

</body>
</html>
