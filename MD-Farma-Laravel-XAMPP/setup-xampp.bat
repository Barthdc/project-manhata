@echo off
setlocal
copy /Y .env.example .env >nul
composer install --no-interaction
if errorlevel 1 (
  echo.
  echo Composer gagal. Pastikan PHP 8.3 aktif dan extension openssl, mbstring, pdo_mysql, fileinfo, intl, zip aktif.
  pause
  exit /b 1
)
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
php artisan storage:link
php artisan optimize:clear
echo.
echo Setup selesai. Jalankan: php artisan serve
echo Realtime chat: php artisan reverb:start
pause
