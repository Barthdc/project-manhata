@extends('layouts.app')

@section('title', 'Edit Pasien')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Edit pasien</p>
            <h1>{{ $patient->name }}</h1>
        </div>
    </div>

    <form action="{{ route('admin.patients.update', $patient) }}" method="POST" class="content-card form-stack">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <label>
                <span>Nama</span>
                <input type="text" name="name" value="{{ old('name', $patient->name) }}" required />
            </label>

            <label>
                <span>Email</span>
                <input type="email" name="email" value="{{ old('email', $patient->email) }}" required />
            </label>

            <label>
                <span>Tanggal lahir</span>
                <input
                    type="date"
                    name="birth_date"
                    value="{{ old('birth_date', $patient->patientProfile?->birth_date?->format('Y-m-d')) }}"
                />
            </label>

            <label>
                <span>Jenis kelamin</span>
                <select name="gender">
                    <option value="">Pilih</option>
                    <option
                        value="laki-laki"
                        @selected(old('gender', $patient->patientProfile?->gender) === 'laki-laki')
                    >
                        Laki-laki
                    </option>
                    <option
                        value="perempuan"
                        @selected(old('gender', $patient->patientProfile?->gender) === 'perempuan')
                    >
                        Perempuan
                    </option>
                </select>
            </label>

            <label>
                <span>Telepon</span>
                <input type="text" name="phone" value="{{ old('phone', $patient->patientProfile?->phone) }}" />
            </label>

            <label>
                <span>Golongan darah</span>
                <select name="blood_type">
                    <option value="">Belum diketahui</option>
                    @foreach (['A', 'B', 'AB', 'O', '-'] as $bloodType)
                        <option
                            value="{{ $bloodType }}"
                            @selected(old('blood_type', $patient->patientProfile?->blood_type) === $bloodType)
                        >
                            {{ $bloodType }}
                        </option>
                    @endforeach
                </select>
            </label>
        </div>

        <label>
            <span>Alamat</span>
            <textarea name="address" rows="3">{{ old('address', $patient->patientProfile?->address) }}</textarea>
        </label>

        <label>
            <span>Alergi</span>
            <textarea name="allergies" rows="3">{{ old('allergies', $patient->patientProfile?->allergies) }}</textarea>
        </label>

        <label>
            <span>Riwayat penyakit</span>
            <textarea name="medical_history" rows="4">
{{ old('medical_history', $patient->patientProfile?->medical_history) }}</textarea
            >
        </label>

        <label>
            <span>Obat saat ini</span>
            <textarea name="current_medications" rows="4">
{{ old('current_medications', $patient->patientProfile?->current_medications) }}</textarea
            >
        </label>

        <button class="button button-primary" type="submit">Simpan Perubahan</button>
    </form>
@endsection
