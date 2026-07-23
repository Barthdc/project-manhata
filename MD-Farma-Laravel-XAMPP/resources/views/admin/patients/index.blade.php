@extends('layouts.app')

@section('title', 'Kelola Pasien')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Area pengelola</p>
            <h1>Data pasien</h1>
            <p>Admin dapat mencari, melihat, dan memperbarui data pasien.</p>
        </div>
    </div>

    <form class="search-form" method="GET">
        <input type="search" name="search" value="{{ $search }}" placeholder="Cari nama, email, atau telepon" />
        <button class="button button-primary" type="submit">Cari</button>
    </form>

    <section class="content-card">
        @forelse ($patients as $patient)
            <a class="list-row" href="{{ route('admin.patients.show', $patient) }}">
                <div>
                    <strong>{{ $patient->name }}</strong>
                    <small>
                        {{ $patient->email }}
                        ·
                        {{ $patient->patientProfile?->phone ?? 'Telepon belum diisi' }}
                    </small>
                </div>

                <span class="badge">Pasien</span>
            </a>
        @empty
            <div class="empty-state">Data pasien tidak ditemukan.</div>
        @endforelse

        {{ $patients->links() }}
    </section>
@endsection
