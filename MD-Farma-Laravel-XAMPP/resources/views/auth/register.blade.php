@extends('layouts.app')

@section('title', 'Daftar Pasien | MD Farma')

@section('content')
    <div class="auth-shell">
        <section class="auth-copy">
            <p class="eyebrow">Pendaftaran pasien</p>

            <h1>
                Buat akun untuk
                <span>memulai live chat.</span>
            </h1>

            <p class="lead">
                Daftarkan akun pasien untuk melengkapi data kesehatan dan berkonsultasi langsung dengan dokter MD Farma.
            </p>
        </section>

        <section class="form-card">
            <h2>Buat Akun Pasien</h2>

            <p class="form-subtitle">Isi data berikut dengan benar.</p>

            @if ($errors->any())
                <div class="alert alert-error">
                    <strong>Periksa kembali data berikut:</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.store') }}" method="POST" class="form-stack">
                @csrf

                <label>
                    <span>Nama lengkap</span>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        autocomplete="name"
                        required
                        autofocus
                    />

                    @error('name')
                        <small class="field-error">
                            {{ $message }}
                        </small>
                    @enderror
                </label>

                <label>
                    <span>Alamat email</span>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        autocomplete="email"
                        required
                    />

                    @error('email')
                        <small class="field-error">
                            {{ $message }}
                        </small>
                    @enderror
                </label>

                <label>
                    <span>Nomor telepon</span>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="Contoh: 081234567890"
                        autocomplete="tel"
                    />

                    @error('phone')
                        <small class="field-error">
                            {{ $message }}
                        </small>
                    @enderror
                </label>

                <label>
                    <span>Kata sandi</span>

                    <input
                        type="password"
                        name="password"
                        placeholder="Minimal 8 karakter"
                        autocomplete="new-password"
                        minlength="8"
                        required
                    />

                    <small class="field-help">Gunakan minimal 8 karakter.</small>

                    @error('password')
                        <small class="field-error">
                            {{ $message }}
                        </small>
                    @enderror
                </label>

                <label>
                    <span>Ulangi kata sandi</span>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Ketik ulang kata sandi"
                        autocomplete="new-password"
                        minlength="8"
                        required
                    />
                </label>

                <button class="button button-primary button-block" type="submit">Buat Akun</button>
            </form>

            <p class="form-footer">
                Sudah memiliki akun?

                <a href="{{ route('login') }}">Masuk</a>
            </p>
        </section>
    </div>
@endsection
