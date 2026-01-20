<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen p-10">

    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow p-10">
        <h1 class="text-3xl font-bold mb-6">Edit Profil Akun</h1>

        @if(session('success'))
            <p class="mb-4 p-3 bg-green-100 border border-green-300 rounded text-green-700">
                {{ session('success') }}
            </p>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block font-semibold mb-2">Nama Lengkap</label>
                <input type="text" name="name"
                       class="w-full rounded-xl border p-4 text-lg"
                       value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-6">
                <label class="block font-semibold mb-2">Email</label>
                <input type="email" name="email"
                       class="w-full rounded-xl border p-4 text-lg"
                       value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-6" x-data="{ show: false }">
                <label class="block text-lg font-semibold text-gray-800 mb-2">
                    Password Baru
                </label>

                <div class="relative">
                    <input :type="show ? 'text' : 'password'"
                        name="password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500"
                        placeholder="••••••••">

                    <button type="button"
                            @click="show = !show"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>

                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.973 9.973 0 012.182-3.568M9.88 9.88A3 3 0 0114.12 14.12M6.228 6.228L3 3m0 0l3 3m-3-3l18 18"/>
                        </svg>
                    </button>
                </div>

                @error('password')
                <p class="text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6" x-data="{ show2: false }">
                <label class="block text-lg font-semibold text-gray-800 mb-2">
                    Konfirmasi Password Baru
                </label>

                <div class="relative">
                    <input :type="show2 ? 'text' : 'password'"
                        name="password_confirmation"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500"
                        placeholder="••••••••">

                    <button type="button"
                            @click="show2 = !show2"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                        <svg x-show="!show2" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>

                        <svg x-show="show2" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.973 9.973 0 012.182-3.568M9.88 9.88A3 3 0 0114.12 14.12M6.228 6.228L3 3m0 0l3 3m-3-3l18 18"/>
                        </svg>
                    </button>
                </div>
            </div>

            <button class="px-8 py-4 bg-blue-600 text-white text-xl rounded-xl hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </form>
    </div>

</body>
</html>
