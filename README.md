# Sistem Informasi Magang 🎓

Sistem Informasi Magang adalah aplikasi berbasis web yang digunakan untuk mengelola data peserta magang secara terstruktur, aman, dan mudah digunakan.  
Aplikasi ini dirancang dengan pemisahan peran yang jelas antara **Admin** dan **Siswa**, sehingga alur kerja lebih tertata dan terkontrol.

---

## ✨ Fitur Utama

### 🔐 Autentikasi & Role
- Sistem login tanpa fitur register
- Akun dibuat melalui **Seeder**
- **Admin**
  - Login menggunakan **NIP**
  - Akses penuh terhadap data peserta
- **Siswa**
  - Login menggunakan **NISN**
  - Hanya dapat mengelola data magang milik sendiri

---

### 👨‍🎓 Fitur Siswa
- Mengisi data magang pertama kali melalui **Edit Profil**
- Edit ulang data magang jika ada kesalahan
- Data otomatis tampil kembali saat edit (tidak membuat data baru)
- Upload foto profil (proporsi pas foto / 3x4)
- Validasi ukuran dan format foto dengan pesan error yang jelas
- Melihat daftar peserta magang
- Melihat detail data magang

---

### 🧑‍💼 Fitur Admin
- Menambahkan peserta magang
- Mengedit data peserta magang
- Menghapus data peserta magang
- Melihat detail lengkap peserta
- Notifikasi sukses untuk aksi tambah, edit, dan hapus data

---

### 🖼️ Upload Foto
- Format: **JPG / JPEG / PNG**
- Maksimal ukuran: **5 MB**
- Tampilan foto disesuaikan seperti pas foto (3x4)
- Validasi ukuran & format file
- Pesan error menggunakan bahasa yang mudah dipahami pengguna

---

### 🧾 Data yang Dikelola
- Nama lengkap
- Email
- Nomor telepon
- Sekolah
- NISN
- Jurusan (sinkron dengan divisi)
- Divisi
- Jenis kelamin
- Tempat & tanggal lahir
- Agama
- Alamat lengkap
- Periode magang (tanggal mulai & selesai)
- Foto peserta

---

## 🛠️ Teknologi & Versi

### Backend
- **PHP** v8.2.12
- **Laravel** v12.47.0
- **Laravel Blade** (Template Engine)
- **Eloquent ORM**

### Frontend
- **Tailwind CSS** v4.1.18
- **Alpine.js** v3.15.4
- **Vite**

### Database
- **MySQL** v15.1

### Tools & Environment
- **Composer**
- **Node.js** v22.18.0
- **NPM**
- **Laragon** (Local Development)

---

## 📂 Struktur Role & Akses
- Satu siswa hanya memiliki **satu data magang**
- Data siswa terhubung dengan akun melalui `user_id`
- Siswa **tidak bisa** mengakses data siswa lain
- Admin **bisa** mengelola seluruh data

---

## 🚀 Cara Menjalankan Project

```
git clone https://github.com/username/sistem-informasi-magang.git
cd sistem-informasi-magang
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
npm run dev
php artisan serve
```
