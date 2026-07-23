# MD Farma Laravel untuk XAMPP

Project ini sudah dibersihkan dari Docker, Nginx, data MariaDB mentah, `vendor`, `node_modules`, log, dan cache agar ukuran ZIP minimal. Landing page MediApotek telah dipindahkan ke Blade Laravel.

## Persyaratan

- XAMPP dengan PHP 8.3.x (disarankan 8.3.32)
- Composer
- Node.js dan npm

## Instalasi

1. Ekstrak folder ke `C:\xampp\htdocs\MD-Farma-Laravel-XAMPP`.
2. Jalankan Apache dan MySQL dari XAMPP.
3. Buka phpMyAdmin, lalu impor `database/setup_xampp.sql`.
4. Buka terminal pada folder project dan jalankan `setup-xampp.bat`, atau jalankan manual:

```bat
copy .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
php artisan storage:link
php artisan optimize:clear
```

5. Akses `http://localhost/MD-Farma-Laravel-XAMPP/public`.
6. Untuk chat realtime, buka terminal kedua dan jalankan `php artisan reverb:start`.

## Akun demo

- Administrator: `admin@mdfarma.test` / `password`
- Apoteker: `apoteker@mdfarma.test` / `password`
- Pasien: `pasien@mdfarma.test` / `password`

Panel login tersedia di `/admin/login`; halaman pasien tersedia di `/konsultasi`. Ganti seluruh password demo setelah pengujian.

## Catatan kompatibilitas PHP 8.3

Project dikunci ke platform PHP 8.3 dan Symfony 7.4 agar tidak mengambil Symfony 8 yang memerlukan PHP 8.4. Composer lock akan dibuat otomatis saat instalasi pertama.
