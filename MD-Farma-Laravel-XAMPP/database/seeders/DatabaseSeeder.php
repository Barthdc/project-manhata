<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@mdfarma.test'],
            [
                'name' => 'Admin MD Farma',
                'password' => 'Admin123!',
                'role' => User::ROLE_ADMIN,
            ]
        );

        User::updateOrCreate(
            ['email' => 'dokter@mdfarma.test'],
            [
                'name' => 'Dokter MD Farma',
                'password' => 'Dokter123!',
                'role' => User::ROLE_DOCTOR,
            ]
        );
    }
}
