@extends('layouts.app')

@section('title', 'Live Chat Apotek | MD Farma')

@section('content')
    <section class="hero">
        <div class="hero-content">
            <p class="eyebrow">Konsultasi kesehatan online</p>

            <h1>
                Bicara langsung dengan
                <span>dokter MD Farma.</span>
            </h1>

            <p class="lead">
                Pasien dapat mengisi data kesehatan dan melakukan live chat. Dokter menangani konsultasi, sedangkan
                admin mengelola data pasien.
            </p>

            <div class="hero-actions">
                @guest
                    <a class="button button-primary" href="{{ route('register') }}">Daftar sebagai Pasien</a>
                    <a class="button button-secondary" href="{{ route('login') }}">Masuk</a>
                @else
                    <a class="button button-primary" href="{{ route('dashboard') }}">Buka Dashboard</a>
                @endguest
            </div>
        </div>

        <div class="chat-card">
            <div class="chat-card-header">
                <div class="avatar">DR</div>
                <div>
                    <strong>Dokter MD Farma</strong>
                    <small>
                        <span class="online-dot"></span>
                        Online
                    </small>
                </div>
            </div>

            <div class="message-list">
                <div class="message message-left">Halo, silakan ceritakan keluhan atau pertanyaan Anda.</div>
                <div class="message message-right">Saya ingin berkonsultasi mengenai obat yang sedang saya minum.</div>
                <div class="message message-left">Baik. Mohon lengkapi data pasien sebelum memulai konsultasi.</div>
            </div>
        </div>
    </section>
@endsection
