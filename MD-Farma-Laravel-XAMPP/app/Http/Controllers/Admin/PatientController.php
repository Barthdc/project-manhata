<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

final class PatientController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search'));

        $patients = User::query()
            ->with('patientProfile')
            ->where('role', User::ROLE_PATIENT)
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($builder) use ($search) {
                    $builder->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhereHas('patientProfile', function ($profile) use ($search) {
                            $profile->where('phone', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.patients.index', compact('patients', 'search'));
    }

    public function show(User $patient): View
    {
        abort_unless($patient->isPatient(), 404);

        $patient->load(['patientProfile', 'patientConversations.doctor']);

        return view('admin.patients.show', compact('patient'));
    }

    public function edit(User $patient): View
    {
        abort_unless($patient->isPatient(), 404);

        $patient->load('patientProfile');

        return view('admin.patients.edit', compact('patient'));
    }

    public function update(Request $request, User $patient): RedirectResponse
    {
        abort_unless($patient->isPatient(), 404);

        $userData = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => [
                'required',
                'email',
                'max:150',
                Rule::unique('users', 'email')->ignore($patient->id),
            ],
        ]);

        $profileData = $request->validate([
            'birth_date' => ['nullable', 'date', 'before:today'],
            'gender' => ['nullable', Rule::in(['laki-laki', 'perempuan'])],
            'phone' => ['nullable', 'string', 'max:25'],
            'address' => ['nullable', 'string', 'max:1000'],
            'blood_type' => ['nullable', Rule::in(['A', 'B', 'AB', 'O', '-'])],
            'allergies' => ['nullable', 'string', 'max:2000'],
            'medical_history' => ['nullable', 'string', 'max:3000'],
            'current_medications' => ['nullable', 'string', 'max:3000'],
        ]);

        $patient->update($userData);
        $patient->patientProfile()->updateOrCreate([], $profileData);

        return redirect()
            ->route('admin.patients.show', $patient)
            ->with('success', 'Data pasien berhasil diperbarui.');
    }
}
