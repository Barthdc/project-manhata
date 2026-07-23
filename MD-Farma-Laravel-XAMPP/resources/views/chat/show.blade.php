@extends('layouts.app')

@section('title', $conversation->subject)

@section('content')
    <div class="chat-layout">
        <aside class="patient-panel">
            <p class="eyebrow">Informasi konsultasi</p>
            <h2>{{ $conversation->subject }}</h2>

            <dl class="detail-list">
                <div>
                    <dt>Pasien</dt>
                    <dd>{{ $conversation->patient->name }}</dd>
                </div>

                <div>
                    <dt>Dokter</dt>
                    <dd>{{ $conversation->doctor?->name ?? 'Menunggu dokter' }}</dd>
                </div>

                <div>
                    <dt>Status</dt>
                    <dd>{{ $conversation->status }}</dd>
                </div>

                @if (auth()->user()->isDoctor())
                    <div>
                        <dt>Alergi</dt>
                        <dd>{{ $conversation->patient->patientProfile?->allergies ?: '-' }}</dd>
                    </div>

                    <div>
                        <dt>Riwayat penyakit</dt>
                        <dd>{{ $conversation->patient->patientProfile?->medical_history ?: '-' }}</dd>
                    </div>

                    <div>
                        <dt>Obat saat ini</dt>
                        <dd>{{ $conversation->patient->patientProfile?->current_medications ?: '-' }}</dd>
                    </div>
                @endif
            </dl>

            @if (auth()->user()->isDoctor() && $conversation->status !== 'closed')
                <form action="{{ route('chat.close', $conversation) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="button button-secondary button-block" type="submit">Tutup Percakapan</button>
                </form>
            @endif
        </aside>

        <section
            class="chat-room"
            data-chat-room
            data-messages-url="{{ route('chat.messages', $conversation) }}"
            data-current-user="{{ auth()->id() }}"
        >
            <div class="chat-room-header">
                <div>
                    <strong>Live Chat MD Farma</strong>
                    <small>Percakapan tersimpan dalam sistem</small>
                </div>
            </div>

            <div class="chat-messages" data-message-list>
                @foreach ($conversation->messages as $message)
                    <article
                        class="chat-bubble {{ $message->sender_id === auth()->id() ? 'chat-bubble-own' : '' }}"
                        data-message-id="{{ $message->id }}"
                    >
                        <strong>{{ $message->sender->name }}</strong>
                        <p>{{ $message->body }}</p>
                        <time>{{ $message->created_at->format('H:i') }}</time>
                    </article>
                @endforeach

                <span id="latest-message"></span>
            </div>

            @if ($conversation->status !== 'closed')
                <form action="{{ route('chat.message.store', $conversation) }}" method="POST" class="chat-form">
                    @csrf

                    <textarea name="body" rows="2" placeholder="Tulis pesan..." required></textarea>

                    <button class="button button-primary" type="submit">Kirim</button>
                </form>
            @else
                <div class="closed-notice">Percakapan ini sudah ditutup.</div>
            @endif
        </section>
    </div>
@endsection
