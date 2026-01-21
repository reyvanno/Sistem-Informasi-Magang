<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Peserta | Sistem Informasi Magang</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <style>
        @keyframes fadeIn { from {opacity:0; transform:translateY(30px);} to {opacity:1; transform:translateY(0);} }
        @keyframes slideIn { from {opacity:0; transform:translateX(-25px);} to {opacity:1; transform:translateX(0);} }

        .animate-fade-in { animation: fadeIn .9s ease-out forwards; }
        .animate-slide-in { animation: slideIn .7s ease-out forwards; }

        .btn-hover { transition: all .3s ease; }
        .btn-hover:hover { transform: translateY(-3px); box-shadow: 0 15px 30px -10px rgba(0,0,0,.20); }

        .card-hover:hover { transform: translateY(-6px); box-shadow: 0 22px 40px -12px rgba(0,0,0,.15); }

        .bg-gradient-custom { background: linear-gradient(135deg, #f4f7fa, #e1e8ef); }
    </style>
</head>

<body class="font-sans bg-gradient-custom min-h-screen text-[18px]">

<header class="fixed top-0 w-full bg-white/80 backdrop-blur border-b shadow-sm z-50">
    <div class="max-w-7xl mx-auto px-10 h-20 flex items-center justify-between">

        <h1 class="text-3xl font-bold text-gray-900 animate-slide-in">
            <span class="text-blue-600">Detail</span> Peserta Magang
        </h1>

    </div>
</header>

<main class="max-w-7xl mx-auto px-10 pt-36 pb-24 animate-fade-in">

    <!-- BACK + EDIT -->
    <div class="flex justify-between items-center mb-10">
        <a href="{{ auth()->user()->isAdmin() ? route('interns.index') : route('siswa.interns.index') }}"
           class="btn-hover px-7 py-3 bg-gray-700 text-white rounded-xl text-lg hover:bg-gray-800">
            ← Kembali
        </a>

        @if(auth()->user()->isAdmin())
            <a href="{{ route('interns.edit', $intern) }}"
               class="btn-hover px-7 py-3 bg-yellow-500 text-white rounded-xl text-lg hover:bg-yellow-600">
                Edit Data
            </a>
        @endif
    </div>

    <div class="bg-white p-12 rounded-3xl border shadow-xl card-hover">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- FOTO -->
            <div class="flex flex-col items-center text-center">
                <img src="{{ $intern->foto_url }}" <img src="{{ $intern->foto_url }}"
                    class="w-28 h-28 object-cover rounded-2xl mx-auto shadow"
                    alt="Foto {{ $intern->name }}">

                <h2 class="text-3xl font-bold">{{ $intern->name }}</h2>
                <p class="text-gray-600 text-xl mt-1">{{ $intern->email }}</p>
                <p class="text-gray-600 text-xl">{{ $intern->phone }}</p>

                <div class="flex gap-3 mt-6">
                    <span class="px-4 py-2 bg-blue-100 text-blue-800 rounded-xl text-lg font-semibold">
                        {{ config('internship.jurusan')[$intern->major] ?? $intern->major }}
                    </span>
                    <span class="px-4 py-2 bg-green-100 text-green-800 rounded-xl text-lg font-semibold">
                        {{ $intern->divisi }}
                    </span>
                </div>
            </div>

            <!-- DETAIL INFORMASI -->
            <div class="md:col-span-2 space-y-8">

                <!-- INFO PRIBADI -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-sm">
                    <h3 class="text-2xl font-bold mb-6">Informasi Pribadi</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xl">
                        <x-detail label="NISN" value="{{ $intern->nisn }}" />
                        <x-detail label="Jenis Kelamin" value="{{ $intern->jenis_kelamin }}" />
                        <x-detail label="Tempat/Tanggal Lahir" value="{{ $intern->tempat_lahir }}, {{ $intern->tanggal_lahir?->format('d F Y') }}" />
                        <x-detail label="Agama" value="{{ $intern->agama }}" />
                    </div>
                </div>

                <!-- INFO PENDIDIKAN -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-sm">
                    <h3 class="text-2xl font-bold mb-6">Informasi Pendidikan</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xl">
                        <x-detail label="Sekolah" value="{{ $intern->school }}" />
                        <x-detail label="Jurusan" value="{{ config('internship.jurusan')[$intern->major] ?? $intern->major }}" />
                        <x-detail label="Divisi" value="{{ $intern->divisi }}" />
                    </div>
                </div>

                <!-- ALAMAT -->
                <div class="bg-gray-50 p-8 rounded-2xl shadow-sm">
                    <h3 class="text-2xl font-bold mb-4">Alamat Lengkap</h3>
                    <p class="text-xl">{{ $intern->alamat }}</p>
                </div>

                <!-- PERIODE -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="bg-gray-50 p-8 rounded-2xl shadow-sm">
                        <h3 class="text-2xl font-bold mb-4">Periode Magang</h3>

                        <x-detail label="Mulai" value="{{ $intern->start_date->format('d F Y') }}" />
                        <x-detail label="Selesai" value="{{ $intern->end_date->format('d F Y') }}" />
                        <x-detail label="Durasi" value="{{ $intern->start_date->diffInMonths($intern->end_date) }} bulan" />
                    </div>

                    <div class="bg-gray-50 p-8 rounded-2xl shadow-sm">
                        <h3 class="text-2xl font-bold mb-4">Status Magang</h3>

                        @php
                            $today = now();
                            if ($today < $intern->start_date) {
                                $status = ['Akan Datang', 'bg-yellow-100 text-yellow-700'];
                            } elseif ($today <= $intern->end_date) {
                                $status = ['Sedang Magang', 'bg-green-100 text-green-800'];
                            } else {
                                $status = ['Selesai', 'bg-gray-200 text-gray-800'];
                            }
                        @endphp

                        <span class="px-4 py-2 rounded-xl text-xl font-semibold {{ $status[1] }}">
                            {{ $status[0] }}
                        </span>
                    </div>

                </div>

            </div>
        </div>

    </div>
</main>

</body>
</html>
