# Mebel.id

Mebel.id adalah aplikasi web berbasis Laravel yang dibuat untuk mempromosikan dan mengelola informasi seputar bisnis mebel. Aplikasi ini menampilkan halaman publik tentang perusahaan, artikel, berita, produk, serta formulir kontak, dan juga menyediakan panel admin untuk mengelola konten.

## Judul Aplikasi
Mebel.id

## Deskripsi Singkat Aplikasi
Aplikasi ini dibuat sebagai website informasi dan katalog sederhana untuk usaha mebel. Pengunjung dapat melihat profil perusahaan, membaca artikel dan berita, melihat produk yang tersedia, serta mengirimkan pesan melalui halaman kontak. Sementara itu, admin dapat mengelola data artikel, berita, produk, kontak, dan visi misi melalui dashboard.

## Frontend
Frontend adalah bagian tampilan yang dilihat oleh pengguna. Pada aplikasi ini, frontend dibuat dengan Blade template engine dan layout yang berada di folder resources/views.

Fitur frontend yang tersedia meliputi:
- Halaman utama
- Halaman artikel
- Halaman berita
- Halaman produk
- Halaman kontak
- Halaman login admin

## Backend
Backend adalah bagian yang mengatur logika aplikasi, routing, autentikasi, dan pengolahan data. Pada aplikasi ini, backend dibangun dengan Laravel dan mencakup:
- Routing di routes/web.php
- Controller di app/Http/Controllers
- Model dan query data di app/Models
- Database migrations di database/migrations
- Sistem login admin dan dashboard

Fitur backend yang tersedia meliputi:
- CRUD artikel
- CRUD berita
- CRUD produk
- CRUD kontak
- CRUD visi dan misi
- Login/logout admin
- Dashboard admin

## Persyaratan Lokal
Pastikan perangkat Anda sudah memiliki:
- PHP 8.1 atau lebih tinggi
- Composer
- Node.js dan npm
- MySQL

## Panduan Menjalankan Aplikasi di Lokal

### 1. Masuk ke folder project
```bash
cd c:\xampp\htdocs\mebel
```

### 2. Install dependency PHP
```bash
composer install
```

### 3. Siapkan file environment
Salin file contoh environment:
```bash
copy .env.example .env
```

Lalu ubah konfigurasi database di file .env sesuai database lokal Anda, misalnya:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mebel
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate aplikasi key
```bash
php artisan key:generate
```

### 5. Jalankan migrasi dan seeder
```bash
php artisan migrate --seed
```

### 6. Buat link storage agar gambar tampil
```bash
php artisan storage:link
```

### 7. Install dependency frontend
```bash
npm install
```

### 8. Jalankan backend
```bash
php artisan serve
```

Aplikasi akan tersedia di:
```text
http://127.0.0.1:8000
```

### 9. Jalankan frontend assets (Vite)
Buka terminal baru lalu jalankan:
```bash
npm run dev
```

### 10. Akses halaman admin
Buka halaman login di:
```text
http://127.0.0.1:8000/login
```

Jika menggunakan data seeder, akun admin default biasanya:
- Email: mulki1704@gmail.com
- Password: 12345678

## Catatan Tambahan
- Jika gambar tidak muncul, pastikan perintah storage:link sudah dijalankan.
- Untuk build versi produksi frontend, jalankan:
```bash
npm run build
```