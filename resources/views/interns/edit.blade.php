<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Peserta | Sistem Informasi Magang</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <style>
        @keyframes fadeIn { from {opacity:0; transform:translateY(30px);} to {opacity:1;} }
        @keyframes slideIn { from {opacity:0; transform:translateX(-25px);} to {opacity:1;} }
        .animate-fade-in { animation: fadeIn .7s ease-out forwards; }
        .animate-slide-in { animation: slideIn .6s ease-out forwards; }

        .btn-hover { transition: all .3s ease; }
        .btn-hover:hover { transform: translateY(-3px); box-shadow:0 15px 25px -10px rgba(0,0,0,.20); }

        .card-hover { transition: all .3s ease; }
        .card-hover:hover { transform: translateY(-6px); box-shadow:0 22px 40px -12px rgba(0,0,0,.15); }

        .bg-gradient-custom { background: linear-gradient(135deg, #f4f7fa, #e1e8ef); }

        .input-xl {
            width: 100%;
            padding: 15px 18px;
            font-size: 18px;
            border-radius: 16px;
            border: 1px solid #d1d5db;
            background-color: #f9fafb;
            transition: all .2s ease;
        }
        .input-xl:focus {
            background-color:white;
            border-color:#3b82f6;
            box-shadow:0 0 0 3px rgba(59,130,246,.15);
            outline:none;
        }

        .label-xl {
            font-size: 18px;
            font-weight: 600;
            color:#374151;
            margin-bottom:6px;
            display:block;
        }
    </style>
</head>

<body class="font-sans bg-gradient-custom min-h-screen text-[19px]">

<header class="fixed top-0 w-full bg-white/80 backdrop-blur border-b shadow-sm z-50">
    <div class="max-w-7xl mx-auto px-10 h-20 flex items-center justify-between">
        <h1 class="text-3xl font-bold animate-slide-in">
            <span class="text-blue-600">Edit</span> Peserta Magang
        </h1>

        <form method="POST" action="{{ route('logout') }}" class="animate-slide-in">
            @csrf
            <button class="btn-hover px-6 py-3 bg-red-600 text-white rounded-xl text-lg hover:bg-red-700">
                Logout
            </button>
        </form>
    </div>
</header>

<main class="max-w-7xl mx-auto px-10 pt-36 pb-24 animate-fade-in">

    <a href="{{ route('interns.index') }}"
       class="btn-hover px-7 py-3 rounded-xl text-lg bg-gray-700 text-white hover:bg-gray-800 inline-block mb-10">
        ← Kembali
    </a>

    <div class="bg-white rounded-3xl border shadow-xl p-12 card-hover">

        <form action="{{ route('interns.update', $intern->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-10">

                <div class="space-y-6">

                    <div>
                        <label class="label-xl">Nama Lengkap *</label>
                        <input type="text" name="name" value="{{ old('name', $intern->name) }}" class="input-xl" required>
                    </div>

                    <div>
                        <label class="label-xl">Email *</label>
                        <input type="email" name="email" value="{{ old('email', $intern->email) }}" class="input-xl" required>
                    </div>

                    <div>
                        <label class="label-xl">Telepon *</label>
                        <input type="text" name="phone" pattern="[0-9]+" value="{{ old('phone', $intern->phone) }}" class="input-xl" required>
                    </div>

                    <div>
                        <label class="label-xl">Sekolah *</label>
                        <input name="school" value="{{ old('school', $intern->school) }}" class="input-xl" required>
                    </div>

                    <div>
                        <label class="label-xl">NISN *</label>
                        <input name="nisn" pattern="[0-9]+" value="{{ old('nisn', $intern->nisn) }}" class="input-xl" required>
                    </div>

                    <div>
                        <label class="label-xl">Jenis Kelamin *</label>
                        <select name="jenis_kelamin" class="input-xl" required>
                            <option value="">Pilih</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $intern->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $intern->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-6">

                    <div>
                        <label class="label-xl">Jurusan *</label>
                        <select name="major" id="major" class="input-xl" required>
                            <option value="">Pilih Jurusan</option>
                            @foreach($jurusan as $key => $value)
                                <option value="{{ $key }}" {{ old('major', $intern->major) == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="label-xl">Divisi *</label>
                        <select name="divisi" id="divisi" class="input-xl" required>
                            <option value="">Pilih Divisi</option>
                            @foreach($divisi as $key => $value)
                                <option value="{{ $key }}" {{ old('divisi', $intern->divisi) == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="label-xl">Tempat Lahir *</label>
                        <input name="tempat_lahir" value="{{ old('tempat_lahir', $intern->tempat_lahir) }}" class="input-xl" required>
                    </div>

                    <div>
                        <label class="label-xl">Tanggal Lahir *</label>
                        <input type="date" name="tanggal_lahir"
                               value="{{ old('tanggal_lahir', $intern->tanggal_lahir->format('Y-m-d')) }}"
                               class="input-xl" required>
                    </div>

                    <div>
                        <label class="label-xl">Agama *</label>
                        <select name="agama" class="input-xl" required>
                            <option value="">Pilih Agama</option>
                            @foreach($agama as $key => $value)
                                <option value="{{ $key }}" {{ old('agama', $intern->agama) == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
    <label class="label-xl">Foto</label>

    @if($intern->foto_url)
        <img src="{{ $intern->foto_url }}" class="w-32 h-32 rounded mb-3 object-cover">

        <label class="flex items-center space-x-2 mb-3">
            <input type="checkbox" name="delete_foto" value="1"
                   class="w-5 h-5 rounded border-gray-300 text-red-600 focus:ring-red-500">
            <span class="text-gray-700 text-base">Hapus foto</span>
        </label>
    @endif

    <input type="file" name="foto" accept="image/*" class="input-xl">
    <p class="text-gray-500 text-sm mt-1">Max 2MB</p>
</div>


            <div class="mt-12">
                <label class="label-xl">Alamat Lengkap *</label>
                <textarea name="alamat" rows="3" class="input-xl" required>{{ old('alamat', $intern->alamat) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-12">
                <div>
                    <label class="label-xl">Tanggal Mulai *</label>
                    <input type="date" name="start_date"
                           value="{{ old('start_date', $intern->start_date->format('Y-m-d')) }}"
                           class="input-xl" required>
                </div>

                <div>
                    <label class="label-xl">Tanggal Selesai *</label>
                    <input type="date" name="end_date"
                           value="{{ old('end_date', $intern->end_date->format('Y-m-d')) }}"
                           class="input-xl" required>
                </div>
            </div>

            <div class="flex justify-between mt-16">
                <a href="{{ route('interns.index') }}"
                   class="btn-hover px-12 py-4 bg-gray-600 text-white text-2xl rounded-2xl hover:bg-gray-700">
                    Batal
                </a>

                <button type="submit"
                        class="btn-hover px-12 py-4 bg-blue-600 text-white text-2xl rounded-2xl hover:bg-blue-700">
                    Update
                </button>
            </div>

        </form>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const major = document.getElementById('major');
        const divisi = document.getElementById('divisi');
        const mapping = @json(config('internship.divisi_mapping'));
        const currentDivisi = "{{ old('divisi', $intern->divisi) }}";

        function loadDivisi() {
            divisi.innerHTML = '<option value="">Pilih Divisi</option>';
            if (mapping[major.value]) {
                Object.entries(mapping[major.value]).forEach(([key, val]) => {
                    divisi.innerHTML += `<option value="${key}" ${currentDivisi == key ? 'selected' : ''}>${val}</option>`;
                });
            }
        }

        major.addEventListener('change', loadDivisi);
        loadDivisi();
    });
</script>

</body>
</html>
