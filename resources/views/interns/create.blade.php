<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Peserta | Sistem Informasi Magang</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <style>
        /* ANIMASI */
        @keyframes fadeIn { from {opacity:0; transform:translateY(30px);} to {opacity:1;} }
        @keyframes slideIn { from {opacity:0; transform:translateX(-25px);} to {opacity:1;} }
        .animate-fade-in { animation: fadeIn .7s ease-out forwards; }
        .animate-slide-in { animation: slideIn .6s ease-out forwards; }

        /* BUTTON HOVER */
        .btn-hover { transition: all .3s ease; }
        .btn-hover:hover { transform: translateY(-3px); box-shadow:0 15px 25px -10px rgba(0,0,0,.20); }

        /* CARD HOVER */
        .card-hover { transition: all .3s ease; }
        .card-hover:hover { transform: translateY(-6px); box-shadow:0 22px 40px -12px rgba(0,0,0,.15); }

        /* BACKGROUND */
        .bg-gradient-custom { background: linear-gradient(135deg, #f4f7fa, #e1e8ef); }

        /* --- INPUT MODERN --- */
        .input-xl {
            width: 100%;
            padding: 15px 18px;
            font-size: 18px;
            border-radius: 16px;
            border: 1px solid #d1d5db; /* gray-300 */
            background-color: #f9fafb; /* gray-50 */
            transition: all .2s ease;
        }
        .input-xl:focus {
            background-color: white;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,.15);
            outline: none;
        }

        /* LABEL XL */
        .label-xl {
            font-size: 18px;
            font-weight: 600;
            color: #374151; /* gray-700 */
            margin-bottom: 6px;
            display: block;
        }
    </style>
</head>

<body class="font-sans bg-gradient-custom min-h-screen text-[19px]">

<!-- HEADER -->
<header class="fixed top-0 w-full bg-white/80 backdrop-blur border-b shadow-sm z-50">
    <div class="max-w-7xl mx-auto px-10 h-20 flex items-center justify-between">

        <h1 class="text-3xl font-bold animate-slide-in">
            <span class="text-blue-600">Tambah</span> Peserta Magang
        </h1>

    </div>
</header>

<!-- CONTENT -->
<main class="max-w-7xl mx-auto px-10 pt-36 pb-24 animate-fade-in">

    <!-- BACK BUTTON -->
    <a href="{{ route('interns.index') }}"
       class="btn-hover px-7 py-3 rounded-xl text-lg bg-gray-700 text-white hover:bg-gray-800 inline-block mb-10">
        ← Kembali
    </a>

    <!-- CARD -->
    <div class="bg-white rounded-3xl border shadow-xl p-12 card-hover">

        <form action="{{ route('interns.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- GRID 2 KOLOM -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-10">

                <!-- KOLOM 1 -->
                <div class="space-y-6">

                    <div>
                        <label class="label-xl">Nama Lengkap *</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="input-xl" required>
                    </div>

                    <div>
                        <label class="label-xl">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="input-xl" required>
                    </div>

                    <div>
                        <label class="label-xl">Telepon *</label>
                        <input type="text" name="phone" pattern="[0-9]+" value="{{ old('phone') }}"
                               class="input-xl" required>
                    </div>

                    <div>
                        <label class="label-xl">Sekolah *</label>
                        <input name="school" value="{{ old('school') }}" class="input-xl" required>
                    </div>

                    <div>
                        <label class="label-xl">NISN *</label>
                        <input name="nisn" pattern="[0-9]+" value="{{ old('nisn') }}" class="input-xl" required>
                    </div>

                    <div>
                        <label class="label-xl">Jenis Kelamin *</label>
                        <select name="jenis_kelamin" class="input-xl" required>
                            <option value="">Pilih</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                </div>

                <!-- KOLOM 2 -->
                <div class="space-y-6">

                    <div>
                        <label class="label-xl">Jurusan *</label>
                        <select name="major" id="major" class="input-xl" required>
                            <option value="">Pilih Jurusan</option>
                            @foreach($jurusan as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="label-xl">Divisi *</label>
                        <select name="divisi" id="divisi" class="input-xl" required>
                            <option value="">Pilih Divisi</option>
                        </select>
                    </div>

                    <div>
                        <label class="label-xl">Tempat Lahir *</label>
                        <input name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="input-xl" required>
                    </div>

                    <div>
                        <label class="label-xl">Tanggal Lahir *</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                               class="input-xl" required>
                    </div>

                    <div>
                        <label class="label-xl">Agama *</label>
                        <select name="agama" class="input-xl" required>
                            <option value="">Pilih Agama</option>
                            @foreach($agama as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="label-xl">Foto</label>
                        <input type="file" name="foto" accept="image/*" class="input-xl">
                        <p class="text-gray-500 text-sm mt-1">Max 2MB</p>
                    </div>
                </div>
            </div>

            <!-- ALAMAT -->
            <div class="mt-12">
                <label class="label-xl">Alamat Lengkap *</label>
                <textarea name="alamat" rows="3" class="input-xl" required>{{ old('alamat') }}</textarea>
            </div>

            <!-- PERIODE -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-12">
                <div>
                    <label class="label-xl">Tanggal Mulai *</label>
                    <input type="date" name="start_date" class="input-xl" required>
                </div>
                <div>
                    <label class="label-xl">Tanggal Selesai *</label>
                    <input type="date" name="end_date" class="input-xl" required>
                </div>
            </div>

            <!-- BUTTONS -->
            <div class="flex justify-between mt-16">
                <a href="{{ route('interns.index') }}"
                   class="btn-hover px-12 py-4 bg-gray-600 text-white text-2xl rounded-2xl hover:bg-gray-700">
                    Batal
                </a>

                <button type="submit"
                        class="btn-hover px-12 py-4 bg-blue-600 text-white text-2xl rounded-2xl hover:bg-blue-700">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</main>

<!-- JS DIVISI -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const major = document.getElementById('major');
        const divisi = document.getElementById('divisi');
        const mapping = @json(config('internship.divisi_mapping'));

        major.addEventListener('change', () => {
            divisi.innerHTML = '<option value="">Pilih Divisi</option>';

            if (mapping[major.value]) {
                Object.entries(mapping[major.value]).forEach(([key, val]) => {
                    divisi.innerHTML += `<option value="${key}">${val}</option>`;
                });
            }
        });
    });
</script>

</body>
</html>
