# MD Farma

Project web MD Farma dibangun menggunakan Laravel dengan fitur autentikasi, pengelolaan data pasien, dan live chat antara pasien dan dokter.

## Persyaratan

Pastikan perangkat sudah memiliki:

* PHP 8.3 atau lebih baru
* Composer
* Node.js dan npm
* MySQL atau MariaDB
* XAMPP
* Git

## Instalasi Project

### 1. Clone Repository

Buka PowerShell atau Terminal, kemudian jalankan:

```bash
git clone https://github.com/Barthdc/project-manhata.git
```

Masuk ke folder project Laravel:

```bash
cd project-manhata/MD-Farma-Laravel-XAMPP
```

Jika nama folder berbeda, masuk ke folder yang memiliki file `artisan`.

### 2. Install Dependency PHP

Jalankan:

```bash
composer install
```

### 3. Install Dependency Frontend

Jalankan:

```bash
npm install
```

### 4. Buat File Environment

Salin file `.env.example` menjadi `.env`.

Pada PowerShell:

```powershell
Copy-Item .env.example .env
```

Pada Command Prompt:

```cmd
copy .env.example .env
```

### 5. Generate Application Key

Jalankan:

```bash
php artisan key:generate
```

### 6. Buat Database

Buka XAMPP, lalu aktifkan:

```text
Apache
MySQL
```

Buka phpMyAdmin:

```text
http://localhost/phpmyadmin
```

Buat database baru dengan nama:

```text
md_farma
```

### 7. Atur Koneksi Database

Buka file `.env`, kemudian sesuaikan bagian berikut:

```env
APP_NAME="MD Farma"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=md_farma
DB_USERNAME=root
DB_PASSWORD=
```

Jika MySQL memiliki password, isi bagian:

```env
DB_PASSWORD=password_mysql
```

### 8. Jalankan Migration dan Seeder

Untuk instalasi baru dengan database kosong, jalankan:

```bash
php artisan migrate --seed
```

Jika tabel lama masih ada dan seluruh data boleh dihapus, jalankan:

```bash
php artisan migrate:fresh --seed
```

> Perintah `migrate:fresh` akan menghapus seluruh tabel dan data lama.

### 9. Buat Storage Link

Jalankan:

```bash
php artisan storage:link
```

### 10. Bersihkan Cache Laravel

Jalankan:

```bash
php artisan optimize:clear
```

### 11. Build File Frontend

Untuk membuat file frontend versi produksi:

```bash
npm run build
```

Untuk pengembangan:

```bash
npm run dev
```

Biarkan terminal `npm run dev` tetap terbuka selama proses pengembangan.

### 12. Jalankan Server Laravel

Buka terminal baru, lalu jalankan:

```bash
php artisan serve
```

Aplikasi dapat dibuka melalui:

```text
http://127.0.0.1:8000
```

## Menjalankan Project Setiap Hari

Aktifkan Apache dan MySQL melalui XAMPP.

Buka terminal pertama:

```bash
php artisan serve
```

Buka terminal kedua:

```bash
npm run dev
```

Kemudian buka:

```text
http://127.0.0.1:8000
```

## Akun Awal

Setelah menjalankan seeder, akun berikut dapat digunakan.

### Admin

```text
Email    : admin@mdfarma.test
Password : Admin123!
```

### Dokter

```text
Email    : dokter@mdfarma.test
Password : Dokter123!
```

Pasien dapat membuat akun melalui halaman:

```text
http://127.0.0.1:8000/register
```

## Mengatasi Error Umum

### Application key belum tersedia

Jalankan:

```bash
php artisan key:generate
```

### Database tidak ditemukan

Pastikan database `md_farma` sudah dibuat dan konfigurasi `.env` sudah benar.

### Perubahan tampilan tidak muncul

Jalankan:

```bash
php artisan optimize:clear
npm run build
```

Kemudian lakukan hard refresh pada browser:

```text
Ctrl + F5
```

### Route atau view masih memakai cache lama

Jalankan:

```bash
php artisan route:clear
php artisan view:clear
php artisan config:clear
php artisan cache:clear
```

### Dependency PHP bermasalah

Jalankan:

```bash
composer install
composer dump-autoload
```

### Dependency frontend bermasalah

Jalankan:

```bash
npm install
npm run build
```
