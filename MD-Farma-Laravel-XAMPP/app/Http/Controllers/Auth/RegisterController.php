<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PatientProfile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

final class RegisterController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(
            [
                'name' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:150',
                    'unique:users,email',
                ],

                'phone' => [
                    'nullable',
                    'string',
                    'max:25',
                ],

                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                ],
            ],
            [
                'name.required' => 'Nama lengkap wajib diisi.',
                'name.string' => 'Nama lengkap harus berupa teks.',
                'name.max' => 'Nama lengkap maksimal 100 karakter.',

                'email.required' => 'Alamat email wajib diisi.',
                'email.string' => 'Alamat email harus berupa teks.',
                'email.email' => 'Format alamat email tidak valid.',
                'email.max' => 'Alamat email maksimal 150 karakter.',
                'email.unique' => 'Alamat email tersebut sudah terdaftar.',

                'phone.string' => 'Nomor telepon harus berupa teks.',
                'phone.max' => 'Nomor telepon maksimal 25 karakter.',

                'password.required' => 'Kata sandi wajib diisi.',
                'password.string' => 'Kata sandi harus berupa teks.',
                'password.min' => 'Kata sandi minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi kata sandi tidak sama.',
            ],
            [
                'name' => 'nama lengkap',
                'email' => 'alamat email',
                'phone' => 'nomor telepon',
                'password' => 'kata sandi',
            ],
        );

        $user = DB::transaction(function () use ($data): User {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'role' => User::ROLE_PATIENT,
            ]);

            PatientProfile::create([
                'user_id' => $user->id,
                'phone' => $data['phone'] ?? null,
            ]);

            return $user;
        });

        event(new Registered($user));

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()
            ->route('patient.profile.edit')
            ->with(
                'success',
                'Akun berhasil dibuat. Silakan lengkapi data pasien Anda.'
            );
    }
}
