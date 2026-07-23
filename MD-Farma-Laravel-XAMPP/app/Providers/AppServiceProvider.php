<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Mendaftarkan service aplikasi.
     */
    public function register(): void
    {
        //
    }

    /**
     * Menjalankan service aplikasi.
     */
    public function boot(): void
    {
        Gate::before(
            function (User $user, string $ability): ?bool {
                if ($user->hasRole('super_admin')) {
                    return true;
                }

                return null;
            }
        );
    }
}
