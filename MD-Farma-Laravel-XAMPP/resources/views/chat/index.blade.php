@extends('layouts.app')

@section('title', 'Live Chat')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Live chat</p>
            <h1>Percakapan</h1>
        </div>

        @if (auth()->user()->isPatient())
            <a class="button button-primary" href="{{ route('chat.create') }}">Chat Baru</a>
        @endif
    </div>

    <section class="content-card">
        @forelse ($conversations as $conversation)
            <a class="list-row" href="{{ route('chat.show', $conversation) }}">
                <div>
                    <strong>{{ $conversation->subject }}</strong>
                    <small>
                        @if (auth()->user()->isDoctor())
                            Pasien: {{ $conversation->patient->name }}
                        @else
                            Dokter: {{ $conversation->doctor?->name ?? 'Menunggu dokter' }}
                        @endif
                    </small>
                </div>

                <span class="badge">{{ $conversation->status }}</span>
            </a>
        @empty
            <div class="empty-state">Belum ada percakapan.</div>
        @endforelse

        {{ $conversations->links() }}
    </section>
@endsection
