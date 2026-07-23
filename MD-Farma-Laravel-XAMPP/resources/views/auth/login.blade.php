@extends('layouts.app')

@section('title', 'Masuk | MD Farma')

@section('content')
    <div class="auth-shell">
        <section class="auth-copy">
            <p class="eyebrow">Akses akun MD Farma</p>
            <h1>Masuk dan lanjutkan konsultasi Anda.</h1>
            <p class="lead">Gunakan email dan kata sandi yang sudah terdaftar.</p>
        </section>

        <section class="form-card">
            <h2>Masuk</h2>
            <p class="form-subtitle">Silakan masukkan data akun Anda.</p>

            <form action="{{ route('login.store') }}" method="POST" class="form-stack">
                @csrf

                <label>
                    <span>Email</span>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                        autofocus
                    />
                </label>

                <label>
                    <span>Kata sandi</span>
                    <input type="password" name="password" autocomplete="current-password" required />
                </label>

                <label class="checkbox-row">
                    <input type="checkbox" name="remember" value="1" />
                    <span>Ingat saya</span>
                </label>

                <button class="button button-primary button-block" type="submit">Masuk</button>
            </form>

            <p class="form-footer">
                Belum memiliki akun?
                <a href="{{ route('register') }}">Daftar sebagai pasien</a>
            </p>
        </section>
    </div>
@endsection
