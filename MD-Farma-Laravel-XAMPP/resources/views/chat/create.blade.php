@extends('layouts.app')

@section('title', 'Mulai Chat')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Konsultasi baru</p>
            <h1>Mulai live chat</h1>
            <p>Tuliskan topik dan pertanyaan awal Anda.</p>
        </div>
    </div>

    <form action="{{ route('chat.store') }}" method="POST" class="content-card form-stack">
        @csrf

        <label>
            <span>Topik konsultasi</span>
            <input
                type="text"
                name="subject"
                value="{{ old('subject') }}"
                placeholder="Contoh: Keluhan demam dan pusing"
                required
            />
        </label>

        <label>
            <span>Pesan pertama</span>
            <textarea
                name="message"
                rows="7"
                placeholder="Ceritakan keluhan, durasi, dan obat yang sedang digunakan."
                required
            >
{{ old('message') }}</textarea
            >
        </label>

        <button class="button button-primary" type="submit">Kirim dan Mulai Chat</button>
    </form>
@endsection
