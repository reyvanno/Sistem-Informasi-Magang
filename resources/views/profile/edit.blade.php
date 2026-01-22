<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profil Magang | Sistem Informasi Magang</title>

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
            background-color: white;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,.15);
            outline: none;
        }

        .label-xl {
            font-size: 18px;
            font-weight: 600;
            color: #374151;
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
            <span class="text-blue-600">Edit</span> Profil Magang
        </h1>
    </div>
</header>

<!-- CONTENT -->
<main class="max-w-7xl mx-auto px-10 pt-36 pb-24 animate-fade-in">

    <!-- BACK BUTTON (POSISI SAMA DENGAN CREATE) -->
    <a href="{{ route('dashboard.siswa') }}"
       class="btn-hover px-7 py-3 rounded-xl text-lg bg-gray-700 text-white hover:bg-gray-800 inline-block mb-10">
        ← Kembali
    </a>

    <!-- CARD -->
    <div class="bg-white rounded-3xl border shadow-xl p-12 card-hover">
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-800 rounded-xl">
                <ul class="list-disc list-inside text-lg">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-10">

                <!-- KOLOM KIRI -->
                <div class="space-y-6">
                    <div>
                        <label class="label-xl">Nama Lengkap *</label>
                        <input name="name" class="input-xl" value="{{ old('name', $intern?->name) }}" required>
                    </div>

                    <div>
                        <label class="label-xl">Email *</label>
                        <input type="email" name="email" class="input-xl" value="{{ old('email', $intern?->email) }}" required>
                    </div>

                    <div>
                        <label class="label-xl">Telepon *</label>
                        <input name="phone" pattern="[0-9]+" class="input-xl" value="{{ old('phone', $intern?->phone) }}" required>
                    </div>

                    <div>
                        <label class="label-xl">Sekolah *</label>
                        <input name="school" class="input-xl" value="{{ old('school', $intern?->school) }}" required>
                    </div>

                    <div>
                        <label class="label-xl">NISN *</label>
                        <input name="nisn" pattern="[0-9]+" class="input-xl" value="{{ old('nisn', $intern?->nisn) }}" required>
                    </div>

                    <div>
                        <label class="label-xl">Jenis Kelamin *</label>
                        <select name="jenis_kelamin" class="input-xl" required>
                            <option value="">Pilih</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $intern?->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $intern?->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>

                <!-- KOLOM KANAN -->
                <div class="space-y-6">
                    <div>
                        <label class="label-xl">Jurusan *</label>
                        <select name="major" id="major" class="input-xl" required>
                            <option value="">Pilih Jurusan</option>
                            @foreach($jurusan as $key => $value)
                                <option value="{{ $key }}" {{ old('major', $intern?->major) === $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
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
                        <input name="tempat_lahir" class="input-xl" value="{{ old('tempat_lahir', $intern?->tempat_lahir) }}" required>
                    </div>

                    <div>
                        <label class="label-xl">Tanggal Lahir *</label>
                        <input type="date" name="tanggal_lahir" class="input-xl"
                               value="{{ old('tanggal_lahir', optional($intern?->tanggal_lahir)->format('Y-m-d')) }}" required>
                    </div>

                    <div>
                        <label class="label-xl">Agama *</label>
                        <select name="agama" class="input-xl" required>
                            <option value="">Pilih Agama</option>
                            @foreach($agama as $key => $value)
                                <option value="{{ $key }}" {{ old('agama', $intern?->agama) === $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-3">
                        <label class="label-xl">Foto</label>

                        <!-- PREVIEW FOTO LAMA / BARU -->
                        <div class="w-[180px] h-[240px] border rounded-xl overflow-hidden bg-gray-100 shadow mx-auto">
                            <img
                                id="fotoPreview"
                                src="{{ $intern?->foto_url }}"
                                alt="Foto Profil"
                                class="w-full h-full object-cover object-center">
                        </div>

                        <!-- INPUT FILE -->
                        <input
                            type="file"
                            name="foto"
                            accept="image/*"
                            class="input-xl"
                            onchange="previewFoto(event)">
                        <p class="text-gray-600 mt-1">*Format JPG, JPEG, dan PNG. Max 5MB</p>
                    </div>
                </div>
            </div>

            <!-- ALAMAT -->
            <div class="mt-12">
                <label class="label-xl">Alamat Lengkap *</label>
                <textarea name="alamat" rows="3" class="input-xl" required>{{ old('alamat', $intern?->alamat) }}</textarea>
            </div>

            <!-- PERIODE -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-12">
                <div>
                    <label class="label-xl">Tanggal Mulai *</label>
                    <input type="date" name="start_date" class="input-xl"
                           value="{{ old('start_date', optional($intern?->start_date)->format('Y-m-d')) }}" required>
                </div>
                <div>
                    <label class="label-xl">Tanggal Selesai *</label>
                    <input type="date" name="end_date" class="input-xl"
                           value="{{ old('end_date', optional($intern?->end_date)->format('Y-m-d')) }}" required>
                </div>
            </div>

            <button type="submit"
                    class="mt-16 btn-hover px-12 py-4 bg-blue-600 text-white text-2xl rounded-2xl hover:bg-blue-700">
                Simpan
            </button>

        </form>
    </div>
</main>

<!-- JS DIVISI -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const major = document.getElementById('major');
    const divisi = document.getElementById('divisi');
    const mapping = @json(config('internship.divisi_mapping'));
    const selectedDivisi = "{{ old('divisi', $intern?->divisi) }}";

    function loadDivisi(val) {
        divisi.innerHTML = '<option value="">Pilih Divisi</option>';
        if (!mapping[val]) return;

        Object.entries(mapping[val]).forEach(([k, v]) => {
            const opt = document.createElement('option');
            opt.value = k;
            opt.textContent = v;
            if (k === selectedDivisi) opt.selected = true;
            divisi.appendChild(opt);
        });
    }

    if (major.value) loadDivisi(major.value);
    major.addEventListener('change', () => loadDivisi(major.value));
});

function previewFoto(event) {
    const reader = new FileReader();
    reader.onload = function () {
        const img = document.getElementById('fotoPreview');
        img.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

</body>
</html>
