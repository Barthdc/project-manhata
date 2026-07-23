<?php

declare(strict_types=1);

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/login', fn () => redirect()->route('filament.admin.auth.login'))->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/konsultasi', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/konsultasi/{conversation}/send', [ChatController::class, 'send'])->name('chat.send');
});
