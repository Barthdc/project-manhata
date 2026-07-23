@extends('layouts.app')

@section('title', 'Dashboard Dokter')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Dashboard dokter</p>
            <h1>Ruang konsultasi</h1>
            <p>Pilih antrean pasien atau lanjutkan percakapan yang sedang ditangani.</p>
        </div>
    </div>

    <section class="content-card">
        <div class="section-heading">
            <h2>Antrean live chat</h2>
        </div>

        @forelse ($conversations as $conversation)
            <a class="list-row" href="{{ route('chat.show', $conversation) }}">
                <div>
                    <strong>{{ $conversation->patient->name }}</strong>
                    <small>{{ $conversation->subject }}</small>
                </div>

                <span class="badge">
                    {{ $conversation->doctor_id ? 'Ditangani' : 'Menunggu' }}
                </span>
            </a>
        @empty
            <div class="empty-state">Belum ada pasien dalam antrean.</div>
        @endforelse

        {{ $conversations->links() }}
    </section>
@endsection
