<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Live Chat Apotek | MD Farma</title>

        <meta name="description" content="Konsultasi langsung dengan apoteker MD Farma melalui live chat." />

        <style>
            :root {
                --background: #f4f8f6;
                --surface: #ffffff;
                --primary: #17845b;
                --primary-dark: #0f6847;
                --text: #17352a;
                --muted: #678077;
                --border: #dce9e3;
                --shadow: 0 24px 60px rgba(23, 132, 91, 0.12);
            }

            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            html {
                scroll-behavior: smooth;
            }

            body {
                min-height: 100vh;
                font-family:
                    Inter,
                    ui-sans-serif,
                    system-ui,
                    -apple-system,
                    BlinkMacSystemFont,
                    'Segoe UI',
                    sans-serif;
                color: var(--text);
                background:
                    radial-gradient(circle at top left, rgba(23, 132, 91, 0.13), transparent 35%), var(--background);
            }

            a {
                color: inherit;
                text-decoration: none;
            }

            button,
            a {
                -webkit-tap-highlight-color: transparent;
            }

            .page {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            .container {
                width: min(1120px, calc(100% - 40px));
                margin-inline: auto;
            }

            .header {
                padding: 24px 0;
            }

            .navbar {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 24px;
            }

            .brand {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                font-size: 20px;
                font-weight: 800;
                letter-spacing: -0.03em;
            }

            .brand-mark {
                width: 42px;
                height: 42px;
                display: grid;
                place-items: center;
                border-radius: 14px;
                color: #ffffff;
                background: var(--primary);
                box-shadow: 0 10px 24px rgba(23, 132, 91, 0.24);
            }

            .brand-mark svg {
                width: 24px;
                height: 24px;
            }

            .nav-action {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-height: 44px;
                padding: 0 20px;
                border: 1px solid var(--border);
                border-radius: 999px;
                font-size: 14px;
                font-weight: 700;
                background: rgba(255, 255, 255, 0.76);
                transition:
                    transform 180ms ease,
                    border-color 180ms ease,
                    background 180ms ease;
            }

            .nav-action:hover {
                transform: translateY(-2px);
                border-color: rgba(23, 132, 91, 0.4);
                background: #ffffff;
            }

            .main {
                flex: 1;
                display: grid;
                align-items: center;
                padding: 48px 0 72px;
            }

            .hero {
                display: grid;
                grid-template-columns: minmax(0, 1fr) minmax(360px, 0.82fr);
                gap: 72px;
                align-items: center;
            }

            .eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 24px;
                color: var(--primary-dark);
                font-size: 13px;
                font-weight: 800;
                letter-spacing: 0.12em;
                text-transform: uppercase;
            }

            .eyebrow-dot {
                width: 9px;
                height: 9px;
                border-radius: 50%;
                background: #2dbe82;
                box-shadow: 0 0 0 7px rgba(45, 190, 130, 0.13);
            }

            h1 {
                max-width: 720px;
                margin-bottom: 24px;
                font-size: clamp(48px, 7vw, 82px);
                line-height: 0.98;
                letter-spacing: -0.065em;
            }

            h1 span {
                color: var(--primary);
            }

            .lead {
                max-width: 630px;
                margin-bottom: 34px;
                color: var(--muted);
                font-size: clamp(17px, 2vw, 20px);
                line-height: 1.7;
            }

            .hero-actions {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                gap: 14px;
            }

            .button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                min-height: 54px;
                padding: 0 26px;
                border-radius: 16px;
                font-size: 15px;
                font-weight: 800;
                transition:
                    transform 180ms ease,
                    box-shadow 180ms ease,
                    background 180ms ease;
            }

            .button-primary {
                color: #ffffff;
                background: var(--primary);
                box-shadow: 0 16px 34px rgba(23, 132, 91, 0.24);
            }

            .button-primary:hover {
                transform: translateY(-3px);
                background: var(--primary-dark);
                box-shadow: 0 20px 40px rgba(23, 132, 91, 0.29);
            }

            .button-secondary {
                border: 1px solid var(--border);
                background: rgba(255, 255, 255, 0.78);
            }

            .button-secondary:hover {
                transform: translateY(-3px);
                background: #ffffff;
            }

            .availability {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-top: 24px;
                color: var(--muted);
                font-size: 14px;
            }

            .availability-dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: #24b47e;
                box-shadow: 0 0 0 6px rgba(36, 180, 126, 0.12);
            }

            .chat-card {
                position: relative;
                overflow: hidden;
                padding: 26px;
                border: 1px solid rgba(255, 255, 255, 0.9);
                border-radius: 32px;
                background: rgba(255, 255, 255, 0.86);
                box-shadow: var(--shadow);
                backdrop-filter: blur(18px);
            }

            .chat-card::before {
                content: '';
                position: absolute;
                inset: 0 0 auto;
                height: 5px;
                background: linear-gradient(90deg, var(--primary), #42c894);
            }

            .chat-header {
                display: flex;
                align-items: center;
                gap: 14px;
                padding-bottom: 20px;
                border-bottom: 1px solid var(--border);
            }

            .avatar {
                width: 50px;
                height: 50px;
                display: grid;
                place-items: center;
                flex: 0 0 auto;
                border-radius: 16px;
                color: #ffffff;
                background: var(--primary);
                font-weight: 800;
            }

            .chat-header strong {
                display: block;
                margin-bottom: 4px;
                font-size: 16px;
            }

            .chat-status {
                display: flex;
                align-items: center;
                gap: 7px;
                color: var(--muted);
                font-size: 13px;
            }

            .chat-status span {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: #24b47e;
            }

            .messages {
                display: grid;
                gap: 14px;
                padding: 24px 0;
            }

            .message {
                max-width: 85%;
                padding: 14px 16px;
                border-radius: 18px;
                font-size: 14px;
                line-height: 1.55;
            }

            .message-apoteker {
                border-bottom-left-radius: 6px;
                background: #edf6f2;
            }

            .message-user {
                justify-self: end;
                border-bottom-right-radius: 6px;
                color: #ffffff;
                background: var(--primary);
            }

            .chat-input {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 10px 10px 10px 16px;
                border: 1px solid var(--border);
                border-radius: 18px;
                background: #ffffff;
            }

            .chat-input span {
                flex: 1;
                color: #8aa096;
                font-size: 14px;
            }

            .send-button {
                width: 42px;
                height: 42px;
                display: grid;
                place-items: center;
                border: 0;
                border-radius: 13px;
                color: #ffffff;
                background: var(--primary);
                cursor: pointer;
            }

            .send-button svg {
                width: 18px;
                height: 18px;
            }

            .footer {
                padding: 20px 0 32px;
                color: var(--muted);
                font-size: 13px;
                text-align: center;
            }

            @media (max-width: 900px) {
                .hero {
                    grid-template-columns: 1fr;
                    gap: 48px;
                }

                .chat-card {
                    max-width: 620px;
                }
            }

            @media (max-width: 600px) {
                .container {
                    width: min(100% - 28px, 1120px);
                }

                .header {
                    padding: 18px 0;
                }

                .brand {
                    font-size: 17px;
                }

                .brand-mark {
                    width: 38px;
                    height: 38px;
                }

                .nav-action {
                    min-height: 40px;
                    padding: 0 15px;
                    font-size: 13px;
                }

                .main {
                    padding-top: 34px;
                }

                h1 {
                    font-size: clamp(44px, 14vw, 64px);
                }

                .hero-actions {
                    align-items: stretch;
                    flex-direction: column;
                }

                .button {
                    width: 100%;
                }

                .chat-card {
                    padding: 20px;
                    border-radius: 24px;
                }

                .message {
                    max-width: 92%;
                }
            }
        </style>
    </head>

    <body>
        <div class="page">
            <header class="header">
                <div class="container">
                    <nav class="navbar">
                        <a href="{{ url('/') }}" class="brand">
                            <span class="brand-mark" aria-hidden="true">
                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2.2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M12 3v18"></path>
                                    <path d="M3 12h18"></path>
                                </svg>
                            </span>

                            <span>MD Farma</span>
                        </a>

                        @guest
                            <a class="nav-action" href="{{ route('filament.admin.auth.login') }}">Masuk</a>
                        @endguest

                        @auth
                            <a class="nav-action" href="{{ url('/admin') }}">Dashboard</a>
                        @endauth
                    </nav>
                </div>
            </header>

            <main class="main">
                <div class="container">
                    <section class="hero">
                        <div class="hero-content">
                            <div class="eyebrow">
                                <span class="eyebrow-dot"></span>
                                Konsultasi Apotek Online
                            </div>

                            <h1>
                                Tanya obat,
                                <span>langsung ke apoteker.</span>
                            </h1>

                            <p class="lead">
                                Sampaikan pertanyaan tentang penggunaan obat, dosis, efek samping, atau interaksi obat
                                melalui live chat yang sederhana dan aman.
                            </p>

                            <div class="hero-actions">
                                @guest
                                    <a class="button button-primary" href="{{ route('filament.admin.auth.login') }}">
                                        Mulai Live Chat

                                        <svg
                                            width="18"
                                            height="18"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            aria-hidden="true"
                                        >
                                            <path d="M5 12h14"></path>
                                            <path d="m13 6 6 6-6 6"></path>
                                        </svg>
                                    </a>
                                @endguest

                                @auth
                                    <a class="button button-primary" href="{{ url('/admin') }}">
                                        Buka Live Chat

                                        <svg
                                            width="18"
                                            height="18"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            aria-hidden="true"
                                        >
                                            <path d="M5 12h14"></path>
                                            <path d="m13 6 6 6-6 6"></path>
                                        </svg>
                                    </a>
                                @endauth

                                <a class="button button-secondary" href="#cara-kerja">Cara Kerja</a>
                            </div>

                            <div class="availability">
                                <span class="availability-dot"></span>
                                Apoteker siap menerima konsultasi
                            </div>
                        </div>

                        <div class="chat-card" id="cara-kerja">
                            <div class="chat-header">
                                <div class="avatar">AF</div>

                                <div>
                                    <strong>Apoteker MD Farma</strong>

                                    <div class="chat-status">
                                        <span></span>
                                        Online
                                    </div>
                                </div>
                            </div>

                            <div class="messages">
                                <div class="message message-apoteker">
                                    Halo, ada yang bisa kami bantu terkait obat Anda?
                                </div>

                                <div class="message message-user">Apakah obat ini aman diminum setelah makan?</div>

                                <div class="message message-apoteker">
                                    Silakan kirim nama obat dan aturan pakai pada kemasannya. Apoteker akan membantu
                                    memeriksanya.
                                </div>
                            </div>

                            <div class="chat-input" aria-hidden="true">
                                <span>Tulis pertanyaan Anda...</span>

                                <button class="send-button" type="button" tabindex="-1" aria-label="Kirim pesan">
                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <path d="m22 2-7 20-4-9-9-4Z"></path>
                                        <path d="M22 2 11 13"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </section>
                </div>
            </main>

            <footer class="footer">
                <div class="container">© {{ date('Y') }} MD Farma. Live chat bukan pengganti pemeriksaan darurat.</div>
            </footer>
        </div>
    </body>
</html>
