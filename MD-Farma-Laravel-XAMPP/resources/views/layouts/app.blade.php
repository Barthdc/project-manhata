<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title', 'MD Farma')</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        @stack('head')
    </head>
    <body>
        <header class="site-header">
            <div class="navbar container">
                <a href="{{ route('home') }}" class="brand">
                    <span class="brand-mark">+</span>
                    <span>MD Farma</span>
                </a>

                <nav class="nav-links">
                    @auth
                        <a href="{{ route('dashboard') }}">Dashboard</a>

                        @if (auth()->user()->isPatient() ||auth()->user()->isDoctor())
                            <a href="{{ route('chat.index') }}">Live Chat</a>
                        @endif

                        @if (auth()->user()->isPatient())
                            <a href="{{ route('patient.profile.edit') }}">Data Pasien</a>
                        @endif

                        @if (auth()->user()->isAdmin())
                            <a href="{{ route('admin.patients.index') }}">Kelola Pasien</a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="link-button" type="submit">Keluar</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}">Masuk</a>
                        <a class="button button-primary button-small" href="{{ route('register') }}">Daftar</a>
                    @endauth
                </nav>
            </div>
        </header>

        <main class="page-content">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-error">
                        <strong>Periksa kembali data berikut:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>

        <script src="{{ asset('js/app.js') }}" defer></script>
        @stack('scripts')
    </body>
</html>
