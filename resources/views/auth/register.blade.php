<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Daftar') }} - Sistem Informasi Magang</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        @keyframes fadeIn { from {opacity: 0;} to {opacity: 1;} }
        @keyframes slideUp { from {opacity: 0; transform: translateY(25px);} to {opacity: 1; transform: translateY(0);} }

        .animate-fade-in { animation: fadeIn .6s ease-out forwards; }
        .animate-slide-up { animation: slideUp .7s ease-out forwards; }

        .bg-gradient-auth {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }

        .btn-hover {
            transition: all .3s ease;
        }

        .btn-hover:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(0,0,0,.12);
        }

        .input-xl {
            font-size: 20px;
            padding: 18px 22px;
            border-radius: 14px;
        }

        .label-xl {
            font-size: 20px;
            font-weight: 600;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gradient-auth min-h-screen animate-fade-in">

<!-- HEADER -->
<header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-sm border-b border-gray-200/70">
    <div class="max-w-7xl mx-auto px-10">

        <div class="flex justify-between items-center h-20">

            <!-- LOGO -->
            <a href="{{ url('/') }}" class="flex items-center gap-4 animate-slide-up">
                <!-- IKON GEDUNG ASLI (XL) -->
                <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16
                             m14 0h2m-2 0h-5m-9 0H3
                             m2 0h5M9 7h1m-1 4h1
                             m4-4h1m-1 4h1
                             m-5 10v-5a1 1 0 011-1h2
                             a1 1 0 011 1v5
                             m-4 0h4" />
                </svg>

                <span class="text-3xl font-bold text-gray-900">
                    <span class="text-blue-600">Sistem</span> Magang
                </span>
            </a>

            <!-- NAV -->
            <div class="hidden sm:flex items-center gap-6 animate-slide-up">
                <span class="text-xl text-gray-700">Sudah punya akun?</span>

                <a href="{{ route('login') }}"
                   class="btn-hover px-6 py-3 text-xl font-semibold text-blue-600 hover:text-blue-700">
                    Masuk
                </a>

                <a href="{{ url('/') }}"
                   class="btn-hover px-6 py-3 text-xl font-semibold text-gray-700 hover:text-gray-900 flex items-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7
                                 M5 10v10a1 1 0 001 1h3
                                 m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3
                                 m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2
                                 a1 1 0 011 1v4a1 1 0 001 1
                                 m-6 0h6" />
                    </svg>
                    Beranda
                </a>
            </div>
        </div>
    </div>
</header>


<!-- MAIN CONTENT -->
<main class="min-h-screen flex items-center justify-center px-6 pt-40 pb-20">

    <div class="max-w-lg w-full animate-slide-up">

        <!-- CARD -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-12">

            <!-- TITLE -->
            <div class="text-center mb-10">
                <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M18 9v3m0 0v3m0-3h3
                                 m-3 0h-3m-2-5a4 4 0 11-8 0
                                 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>

                <h2 class="text-4xl font-bold text-gray-900 mb-4">Buat Akun Baru</h2>

                <p class="text-xl text-gray-600">
                    Daftar untuk mulai menggunakan sistem
                </p>
            </div>


            <!-- FORM -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- NAME -->
                <div class="mb-8">
                    <label for="name" class="label-xl block mb-3">Nama Lengkap</label>

                    <input id="name"
                           type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           placeholder="Nama lengkap Anda"
                           class="input-xl block w-full border border-gray-300 rounded-xl @error('name') border-red-400 @enderror">

                    @error('name')
                    <p class="text-red-600 text-lg mt-3">{{ $message }}</p>
                    @enderror
                </div>

                <!-- EMAIL -->
                <div class="mb-8">
                    <label for="email" class="label-xl block mb-3">Email</label>

                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           placeholder="nama@email.com"
                           class="input-xl block w-full border border-gray-300 rounded-xl @error('email') border-red-400 @enderror">

                    @error('email')
                    <p class="text-red-600 text-lg mt-3">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-lg font-medium text-gray-700">
                            {{ __('Kata Sandi') }}
                        </label>
                    </div>

                    <div class="relative">
                        <input id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                            class="input-focus block w-full px-5 py-4 pr-14 text-lg border border-gray-300 rounded-xl focus:border-blue-500 focus:ring-blue-500 transition @error('password') border-red-300 @enderror">
                        
                        <!-- Toggle Button -->
                        <button type="button"
                                onclick="togglePassword('password', this)"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">

                            <!-- Eye (default) -->
                            <svg class="w-7 h-7 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>

                            <!-- Eye Slash (hidden by default) -->
                            <svg class="w-7 h-7 eye-closed hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7
                                        a9.97 9.97 0 012.108-3.563m3.75-2.3A9.99 9.99 0 0112 5
                                        c4.477 0 8.268 2.943 9.542 7a9.963 9.963 0 01-4.043 5.23M15 12
                                        a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3l18 18" />
                            </svg>

                        </button>
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-lg font-medium text-gray-700 mb-2">
                        {{ __('Konfirmasi Kata Sandi') }}
                    </label>

                    <div class="relative">
                        <input id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                            class="input-focus block w-full px-5 py-4 pr-14 text-lg border border-gray-300 rounded-xl focus:border-blue-500 focus:ring-blue-500 transition">

                        <button type="button"
                                onclick="togglePassword('password_confirmation', this)"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">

                            <svg class="w-7 h-7 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
                                        -1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>

                            <svg class="w-7 h-7 eye-closed hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7
                                        a9.97 9.97 0 012.108-3.563m3.75-2.3A9.99 9.99 0 0112 5
                                        c4.477 0 8.268 2.943 9.542 7a9.963 9.963 0 01-4.043 5.23M15 12
                                        a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3l18 18" />
                            </svg>

                        </button>
                    </div>
                </div>

                <!-- TERMS -->
                <div class="mb-10">
                    <label class="flex items-start gap-3 text-xl">
                        <input type="checkbox"
                               name="terms"
                               required
                               class="w-6 h-6 rounded border-gray-300 text-blue-600">
                        <span class="text-gray-700 leading-snug">
                            Saya setuju dengan
                            <a href="#" class="text-blue-600 hover:text-blue-700">Syarat & Ketentuan</a>
                            dan
                            <a href="#" class="text-blue-600 hover:text-blue-700">Kebijakan Privasi</a>.
                        </span>
                    </label>
                </div>

                <!-- SUBMIT -->
                <button type="submit"
                        class="btn-hover w-full py-4 bg-blue-600 text-white text-2xl font-bold rounded-2xl hover:bg-blue-700 flex items-center justify-center gap-3">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M18 9v3m0 0v3m0-3h3
                                 m-3 0h-3m-2-5a4 4 0 11-8 0
                                 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    Daftar Sekarang
                </button>

            </form>
        </div>

        <!-- BACK -->
        <div class="text-center mt-10">
            <a href="{{ url('/') }}"
               class="text-xl text-gray-700 hover:text-gray-900 flex items-center justify-center gap-3 btn-hover">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke beranda
            </a>
        </div>

        <div class="mt-10 text-center text-gray-600 text-xl">
            © {{ date('Y') }} Sistem Informasi Magang
        </div>
    </div>
</main>

</body>
<script>
function togglePassword(id, btn) {
    const input = document.getElementById(id);
    const openIcon = btn.querySelector('.eye-open');
    const closeIcon = btn.querySelector('.eye-closed');

    if (input.type === 'password') {
        input.type = 'text';
        openIcon.classList.add('hidden');
        closeIcon.classList.remove('hidden');
    } else {
        input.type = 'password';
        openIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
    }
}
</script>
</html>
