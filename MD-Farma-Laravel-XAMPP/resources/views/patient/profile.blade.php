@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Profil kesehatan</p>
            <h1>Data pasien</h1>
            <p>Data ini membantu dokter memahami kondisi Anda sebelum konsultasi.</p>
        </div>
    </div>

    <form action="{{ route('patient.profile.update') }}" method="POST" class="content-card form-stack">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <label>
                <span>Tanggal lahir</span>
                <input
                    type="date"
                    name="birth_date"
                    value="{{ old('birth_date', $profile->birth_date?->format('Y-m-d')) }}"
                />
            </label>

            <label>
                <span>Jenis kelamin</span>
                <select name="gender">
                    <option value="">Pilih</option>
                    <option value="laki-laki" @selected(old('gender', $profile->gender) === 'laki-laki')>
                        Laki-laki
                    </option>
                    <option value="perempuan" @selected(old('gender', $profile->gender) === 'perempuan')>
                        Perempuan
                    </option>
                </select>
            </label>

            <label>
                <span>Nomor telepon</span>
                <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}" />
            </label>

            <label>
                <span>Golongan darah</span>
                <select name="blood_type">
                    <option value="">Belum diketahui</option>
                    @foreach (['A', 'B', 'AB', 'O', '-'] as $bloodType)
                        <option
                            value="{{ $bloodType }}"
                            @selected(old('blood_type', $profile->blood_type) === $bloodType)
                        >
                            {{ $bloodType }}
                        </option>
                    @endforeach
                </select>
            </label>
        </div>

        <label>
            <span>Alamat</span>
            <textarea name="address" rows="3">{{ old('address', $profile->address) }}</textarea>
        </label>

        <label>
            <span>Alergi</span>
            <textarea name="allergies" rows="3">{{ old('allergies', $profile->allergies) }}</textarea>
        </label>

        <label>
            <span>Riwayat penyakit</span>
            <textarea name="medical_history" rows="4">
{{ old('medical_history', $profile->medical_history) }}</textarea
            >
        </label>

        <label>
            <span>Obat yang sedang digunakan</span>
            <textarea name="current_medications" rows="4">
{{ old('current_medications', $profile->current_medications) }}</textarea
            >
        </label>

        <button class="button button-primary" type="submit">Simpan Data Pasien</button>
    </form>
@endsection
