@extends('layouts.app')

@section('title', 'Dashboard Pasien')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Dashboard pasien</p>
            <h1>Halo, {{ auth()->user()->name }}</h1>
            <p>Lengkapi data kesehatan lalu mulai konsultasi dengan dokter.</p>
        </div>

        <a class="button button-primary" href="{{ route('chat.create') }}">Mulai Chat Baru</a>
    </div>

    <div class="card-grid">
        <a class="dashboard-card" href="{{ route('patient.profile.edit') }}">
            <span class="card-icon">01</span>
            <h2>Data Pasien</h2>
            <p>Lengkapi biodata, alergi, riwayat penyakit, dan obat yang digunakan.</p>
        </a>

        <a class="dashboard-card" href="{{ route('chat.index') }}">
            <span class="card-icon">02</span>
            <h2>Live Chat</h2>
            <p>Lihat percakapan dan lanjutkan konsultasi bersama dokter.</p>
        </a>
    </div>

    <section class="content-card">
        <div class="section-heading">
            <h2>Percakapan terakhir</h2>
        </div>

        @forelse ($conversations as $conversation)
            <a class="list-row" href="{{ route('chat.show', $conversation) }}">
                <div>
                    <strong>{{ $conversation->subject }}</strong>
                    <small>Dokter: {{ $conversation->doctor?->name ?? 'Belum ditentukan' }}</small>
                </div>
                <span class="badge">{{ $conversation->status }}</span>
            </a>
        @empty
            <div class="empty-state">Belum ada percakapan. Mulai chat baru untuk berkonsultasi.</div>
        @endforelse

        {{ $conversations->links() }}
    </section>
@endsection
