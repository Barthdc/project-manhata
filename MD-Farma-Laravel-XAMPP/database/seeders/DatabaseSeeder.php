<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['super_admin', 'admin', 'apoteker', 'pasien'] as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        $accounts = [
            ['name' => 'Administrator', 'email' => 'admin@mdfarma.test', 'role' => 'super_admin'],
            ['name' => 'Apoteker MD Farma', 'email' => 'apoteker@mdfarma.test', 'role' => 'apoteker'],
            ['name' => 'Pasien Demo', 'email' => 'pasien@mdfarma.test', 'role' => 'pasien'],
        ];

        foreach ($accounts as $account) {
            $user = User::updateOrCreate(
                ['email' => $account['email']],
                ['name' => $account['name'], 'password' => Hash::make('password'), 'email_verified_at' => now()]
            );
            $user->syncRoles([$account['role']]);
        }
    }
}
