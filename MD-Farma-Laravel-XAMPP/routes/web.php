<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Patient\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function (): void {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::middleware('role:pasien')->group(function (): void {
        Route::get('/profil-pasien', [ProfileController::class, 'edit'])
            ->name('patient.profile.edit');
        Route::put('/profil-pasien', [ProfileController::class, 'update'])
            ->name('patient.profile.update');

        Route::get('/chat/baru', [ChatController::class, 'create'])
            ->name('chat.create');
        Route::post('/chat', [ChatController::class, 'storeConversation'])
            ->name('chat.store');
    });

    Route::middleware('role:pasien,dokter')->group(function (): void {
        Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
        Route::get('/chat/{conversation}', [ChatController::class, 'show'])
            ->name('chat.show');
        Route::post('/chat/{conversation}/pesan', [ChatController::class, 'storeMessage'])
            ->name('chat.message.store');
        Route::get('/chat/{conversation}/pesan', [ChatController::class, 'messages'])
            ->name('chat.messages');
    });

    Route::middleware('role:dokter')->group(function (): void {
        Route::patch('/chat/{conversation}/tutup', [ChatController::class, 'close'])
            ->name('chat.close');
    });

    Route::prefix('pengelola')
        ->name('admin.')
        ->middleware('role:admin')
        ->group(function (): void {
            Route::get('/pasien', [PatientController::class, 'index'])
                ->name('patients.index');
            Route::get('/pasien/{patient}', [PatientController::class, 'show'])
                ->name('patients.show');
            Route::get('/pasien/{patient}/edit', [PatientController::class, 'edit'])
                ->name('patients.edit');
            Route::put('/pasien/{patient}', [PatientController::class, 'update'])
                ->name('patients.update');
        });
});
