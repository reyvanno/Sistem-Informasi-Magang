<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Peserta | Sistem Informasi Magang</title>

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

<header class="fixed top-0 w-full bg-white/80 backdrop-blur border-b shadow-sm z-50">
    <div class="max-w-7xl mx-auto px-10 h-20 flex items-center justify-between">

        <h1 class="text-3xl font-bold text-gray-900 animate-slide-in">
            <span class="text-blue-600">Daftar</span> Peserta Magang
        </h1>

        <!-- DROPDOWN PROFIL -->
        <div x-data="{ open:false }" class="relative animate-slide-in">

            <button @click="open = !open"
                    class="flex items-center gap-4 px-4 py-2 rounded-xl hover:bg-gray-100 transition">

                @php $initial = strtoupper(substr(auth()->user()->name,0,1)); @endphp
                <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center
                            text-xl font-bold select-none">
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

            <div x-show="open"
                 @click.away="open = false"
                 x-transition
                 class="absolute right-0 mt-3 w-56 bg-white border rounded-xl shadow-xl py-2">

                @if(auth()->user()->role === 'siswa')
                    <a href="{{ route('profile.edit') }}"
                       class="block px-4 py-3 text-lg hover:bg-gray-100 text-gray-700">
                        Edit Profil
                    </a>
                @endif

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

<main class="max-w-7xl mx-auto px-6 pt-36 pb-24 animate-fade-in">

    @if(session('success'))
        <div id="flash-success"
            class="mb-6 p-4 bg-green-100 border border-green-300 text-green-800 rounded-xl transition-opacity duration-500">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                const el = document.getElementById('flash-success');
                if (el) {
                    el.style.opacity = '0';
                    setTimeout(() => el.remove(), 500);
                }
            }, 3000); // ⬅️ waktu tampil (ms)
        </script>
    @endif

    <div class="flex justify-between items-center mb-10">
        <a href="{{ auth()->user()->isAdmin() 
                ? route('dashboard.admin') 
                : route('dashboard.siswa') }}"
        class="btn-hover px-7 py-3 rounded-xl text-lg bg-gray-700 text-white hover:bg-gray-800">
            ← Dashboard
        </a>

        @if(auth()->user()->isAdmin())
            <a href="{{ route('interns.create') }}"
               class="btn-hover px-7 py-3 rounded-xl text-lg bg-blue-600 text-white hover:bg-blue-700">
                + Tambah Peserta
            </a>
        @endif
    </div>

    <div class="bg-white rounded-3xl border shadow-xl card-hover p-8 overflow-x-hidden">

        @if($interns->count())
            <table class="w-full table-fixed text-[18px] leading-relaxed">

                <thead class="bg-gray-100 text-gray-700">
                    <tr class="h-20 text-center text-xl font-semibold">
                        <th class="px-6">Foto</th>
                        <th class="px-6">Nama</th>
                        <th class="px-6">Jurusan</th>
                        <th class="px-6">Divisi</th>
                        <th class="px-6">Sekolah</th>
                        <th class="px-6">NISN</th>
                        <th class="px-6">Periode</th>
                        <th class="px-6">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                @foreach($interns as $intern)
                    <tr class="hover:bg-gray-50 transition text-center h-32">
                        <td class="px-6 py-6">
                            <div class="w-28 h-28 mx-auto rounded-full overflow-hidden shadow bg-gray-100">
                                <img src="{{ $intern->foto_url }}"
                                    alt="Foto {{ $intern->name }}"
                                    class="w-full h-full object-cover object-center">
                            </div>
                        </td>

                        <td class="px-4 py-6 max-w-[260px] break-words">
                            <div class="text-xl font-bold text-gray-900">{{ $intern->name }}</div>
                            <div class="text-gray-600 text-[15px] truncate">{{ $intern->email }}</div>
                            <div class="text-gray-600 text-[15px]">{{ $intern->phone }}</div>
                        </td>

                        <td class="px-6 py-6">
                            <span class="inline-block px-4 py-2 rounded-2xl bg-blue-100 text-blue-800 text-base font-semibold">
                                {{ config('internship.jurusan')[$intern->major] ?? $intern->major }}
                            </span>
                        </td>

                        <td class="px-6 py-6 text-lg">{{ $intern->divisi }}</td>
                        <td class="px-6 py-6 text-lg">{{ $intern->school }}</td>
                        <td class="px-6 py-6 text-lg">{{ $intern->nisn }}</td>

                        <td class="px-6 py-6 text-[17px]">
                            {{ $intern->start_date?->format('d/m/Y') }}<br>
                            <span class="text-gray-500">s/d</span><br>
                            {{ $intern->end_date?->format('d/m/Y') }}
                        </td>

                        <td class="px-6 py-6 text-center">
                            <div class="flex flex-col items-center gap-2 w-full">

                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('interns.show', $intern) }}"
                                    class="btn-hover w-24 py-2 bg-green-600 text-white rounded-lg text-sm hover:bg-green-700">
                                        Lihat
                                    </a>

                                    <a href="{{ route('interns.edit', $intern) }}"
                                    class="btn-hover w-24 py-2 bg-yellow-500 text-white rounded-lg text-sm hover:bg-yellow-600">
                                        Edit
                                    </a>

                                    <form action="{{ route('interns.destroy', $intern) }}"
                                        method="POST"
                                        onsubmit="return confirm('Hapus peserta ini?')">
                                        @csrf @method('DELETE')
                                        <button
                                            class="btn-hover w-24 py-2 bg-red-600 text-white rounded-lg text-sm hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('siswa.interns.show', $intern) }}"
                                    class="btn-hover w-24 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">
                                        Detail
                                    </a>
                                @endif

                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        @else
            <p class="text-center text-xl text-gray-500 py-10">Belum ada data peserta magang.</p>
        @endif

    </div>
</main>

</body>
</html>
