# Panduan Aplikasi Mebel.id

## Judul Aplikasi
Mebel.id

## Deskripsi Singkat Aplikasi
Aplikasi ini adalah website sederhana untuk bisnis mebel yang menampilkan informasi perusahaan, artikel, berita, produk, serta halaman kontak. Aplikasi ini juga dilengkapi dengan panel admin untuk mengelola konten secara mandiri.

## Frontend
Frontend adalah bagian tampilan yang dilihat pengguna. Pada aplikasi ini, frontend dibuat dengan Laravel Blade dan layout tampilan yang berada pada folder resources/views.

Fitur frontend yang tersedia:
- Halaman utama
- Halaman artikel
- Halaman berita
- Halaman produk
- Halaman kontak
- Halaman login admin

## Backend
Backend adalah bagian yang mengatur logika, data, autentikasi, dan routing aplikasi. Pada aplikasi ini, backend dibangun dengan Laravel.

Komponen backend yang digunakan:
- Routing di routes/web.php
- Controller di app/Http/Controllers
- Model di app/Models
- Database migrations di database/migrations
- Sistem login admin dan dashboard

Fitur backend yang tersedia:
- CRUD artikel
- CRUD berita
- CRUD produk
- CRUD kontak
- CRUD visi dan misi
- Login dan logout admin
- Dashboard admin

## Cara Menjalankan Aplikasi di Lokal

### 1. Masuk ke folder project
cd c:\xampp\htdocs\mebel

### 2. Install dependency PHP
composer install

### 3. Siapkan file environment
Salin file .env.example menjadi .env

copy .env.example .env

Lalu sesuaikan konfigurasi database di file .env, misalnya:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mebel
DB_USERNAME=root
DB_PASSWORD=

### 4. Generate aplikasi key
php artisan key:generate

### 5. Jalankan migrasi dan seeder
php artisan migrate --seed

### 6. Buat link storage agar gambar tampil
php artisan storage:link

### 7. Install dependency frontend
npm install

### 8. Jalankan backend
php artisan serve

Setelah itu, buka browser ke:
http://127.0.0.1:8000

### 9. Jalankan frontend assets (Vite)
Buka terminal baru lalu jalankan:

npm run dev

### 10. Akses halaman admin
Buka halaman login admin di:
http://127.0.0.1:8000/login

Akun admin default yang umum digunakan dari seeder:
- Email: mulki1704@gmail.com
- Password: 12345678

## Catatan Tambahan
- Jika gambar tidak muncul, pastikan perintah storage:link sudah dijalankan.
- Untuk build versi produksi frontend, jalankan:

npm run build
