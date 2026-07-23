<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Dashboard Pelanggan | MD Farma</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-slate-100">
        <nav class="bg-white shadow-sm">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
                <div>
                    <h1 class="font-bold text-slate-900">MD Farma</h1>
                    <p class="text-sm text-slate-500">Panel Pelanggan</p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700"
                    >
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        <main class="mx-auto max-w-6xl px-6 py-10">
            <div class="rounded-2xl bg-white p-8 shadow-sm">
                <p class="text-sm text-slate-500">Selamat datang,</p>

                <h2 class="mt-1 text-2xl font-bold text-slate-900">
                    {{ auth()->user()->name }}
                </h2>

                <p class="mt-3 text-slate-600">Anda masuk sebagai pelanggan MD Farma.</p>

                <a
                    href="{{ route('chat.index') }}"
                    class="mt-6 inline-flex rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white hover:bg-blue-700"
                >
                    Mulai konsultasi
                </a>
            </div>
        </main>
    </body>
</html>
