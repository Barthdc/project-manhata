@extends('layouts.app')

@section('title', 'Detail Pasien')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Detail pasien</p>
            <h1>{{ $patient->name }}</h1>
            <p>{{ $patient->email }}</p>
        </div>

        <a class="button button-primary" href="{{ route('admin.patients.edit', $patient) }}">Edit Data</a>
    </div>

    <div class="detail-grid">
        <section class="content-card">
            <h2>Identitas</h2>

            <dl class="detail-list">
                <div>
                    <dt>Telepon</dt>
                    <dd>{{ $patient->patientProfile?->phone ?: '-' }}</dd>
                </div>
                <div>
                    <dt>Tanggal lahir</dt>
                    <dd>{{ $patient->patientProfile?->birth_date?->format('d-m-Y') ?: '-' }}</dd>
                </div>
                <div>
                    <dt>Jenis kelamin</dt>
                    <dd>{{ $patient->patientProfile?->gender ?: '-' }}</dd>
                </div>
                <div>
                    <dt>Golongan darah</dt>
                    <dd>{{ $patient->patientProfile?->blood_type ?: '-' }}</dd>
                </div>
                <div>
                    <dt>Alamat</dt>
                    <dd>{{ $patient->patientProfile?->address ?: '-' }}</dd>
                </div>
            </dl>
        </section>

        <section class="content-card">
            <h2>Informasi kesehatan</h2>

            <dl class="detail-list">
                <div>
                    <dt>Alergi</dt>
                    <dd>{{ $patient->patientProfile?->allergies ?: '-' }}</dd>
                </div>
                <div>
                    <dt>Riwayat penyakit</dt>
                    <dd>{{ $patient->patientProfile?->medical_history ?: '-' }}</dd>
                </div>
                <div>
                    <dt>Obat saat ini</dt>
                    <dd>{{ $patient->patientProfile?->current_medications ?: '-' }}</dd>
                </div>
            </dl>
        </section>
    </div>

    <section class="content-card">
        <h2>Riwayat konsultasi</h2>

        @forelse ($patient->patientConversations as $conversation)
            <div class="list-row">
                <div>
                    <strong>{{ $conversation->subject }}</strong>
                    <small>{{ $conversation->doctor?->name ?? 'Belum ada dokter' }}</small>
                </div>
                <span class="badge">{{ $conversation->status }}</span>
            </div>
        @empty
            <div class="empty-state">Belum ada riwayat konsultasi.</div>
        @endforelse
    </section>
@endsection
