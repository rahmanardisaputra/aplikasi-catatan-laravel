# Aplikasi Catatan Pribadi - Belajar Laravel 30 Hari

Aplikasi manajemen catatan pribadi dibuat sebagai latihan Laravel selama 30 hari.

## Fitur
- Login & register pengguna
- Tambah, edit, hapus catatan
- Arsipkan catatan
- Pencarian & pengurutan
- Ekspor ke CSV
- Impor dari CSV

## Cara Menjalankan
1. Clone repositori ini
2. Jalankan: `composer install`
3. Salin `.env.example` jadi `.env`, lalu sesuaikan konfigurasi database
4. Jalankan: `php artisan key:generate`
5. Jalankan migrasi: `php artisan migrate`
6. Jalankan server: `php artisan serve`

## Dibuat dengan
- Laravel 12
- PHP 8.3
- MySQL
- Bootstrap 5
