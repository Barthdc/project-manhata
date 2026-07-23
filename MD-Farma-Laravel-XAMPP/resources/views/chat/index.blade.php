<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konsultasi Apotek</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #16a34a;
            --primary-dark: #15803d;
            --primary-soft: #dcfce7;
            --secondary: #0ea5e9;
            --dark: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --bg: #f8fafc;
            --white: #ffffff;
            --danger: #ef4444;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                radial-gradient(circle at top left, rgba(22, 163, 74, 0.18), transparent 32%),
                radial-gradient(circle at bottom right, rgba(14, 165, 233, 0.16), transparent 28%),
                linear-gradient(135deg, #f8fafc 0%, #eef7f1 100%);
            color: var(--dark);
            min-height: 100vh;
        }

        .page-shell {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 28px;
        }

        .chat-wrapper {
            width: min(1120px, 100%);
            height: min(700px, calc(100vh - 120px));
            display: grid;
            grid-template-columns: 320px 1fr;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 28px;
            box-shadow: 0 24px 80px rgba(15, 23, 42, 0.14);
            backdrop-filter: blur(16px);
        }

        .chat-sidebar {
            position: relative;
            overflow: hidden;
            padding: 28px;
            background:
                linear-gradient(160deg, rgba(22, 163, 74, 0.95), rgba(14, 165, 233, 0.86)),
                url("data:image/svg+xml,%3Csvg width='160' height='160' viewBox='0 0 160 160' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M80 0L160 80L80 160L0 80Z' fill='none' stroke='rgba(255,255,255,0.16)' stroke-width='1'/%3E%3C/svg%3E");
            color: white;
        }

        .brand-badge {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 22px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.18);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.28);
            font-size: 28px;
        }

        .chat-sidebar h1 {
            margin: 0;
            font-size: 28px;
            line-height: 1.15;
            letter-spacing: -0.04em;
        }

        .chat-sidebar p {
            margin: 14px 0 0;
            color: rgba(255, 255, 255, 0.86);
            line-height: 1.7;
            font-size: 14px;
        }

        .info-list {
            display: grid;
            gap: 14px;
            margin-top: 30px;
        }

        .info-item {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            padding: 14px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.18);
        }

        .info-icon {
            flex: 0 0 34px;
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.2);
        }

        .info-item strong {
            display: block;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .info-item span {
            display: block;
            font-size: 12px;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.8);
        }

        .sidebar-footer {
            position: absolute;
            left: 28px;
            right: 28px;
            bottom: 28px;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.24);
            font-size: 12px;
            color: rgba(255, 255, 255, 0.78);
        }

        .chat-main {
            display: grid;
            grid-template-rows: auto minmax(0, 1fr) auto;
            min-width: 0;
            min-height: 0;
            background: rgba(255, 255, 255, 0.82);
        }

        .chat-header {
            padding: 24px 28px;
            border-bottom: 1px solid var(--border);
            background: rgba(255, 255, 255, 0.78);
        }

        .header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .chat-title {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
        }

        .avatar {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            color: white;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            box-shadow: 0 12px 26px rgba(22, 163, 74, 0.26);
            font-weight: 800;
        }

        .chat-title h2 {
            margin: 0;
            font-size: 20px;
            letter-spacing: -0.03em;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .chat-title p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 13px;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 13px;
            border-radius: 999px;
            background: var(--primary-soft);
            color: var(--primary-dark);
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--primary);
            box-shadow: 0 0 0 4px rgba(22, 163, 74, 0.16);
        }

        .chat-box {
            position: relative;
            min-height: 0;
            overflow-y: auto;
            padding: 28px;
            background:
                linear-gradient(rgba(248, 250, 252, 0.74), rgba(248, 250, 252, 0.74)),
                url("data:image/svg+xml,%3Csvg width='24' height='24' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='3' cy='3' r='1' fill='%23dbeafe'/%3E%3C/svg%3E");
            scroll-behavior: smooth;
        }

        .chat-box::-webkit-scrollbar {
            width: 10px;
        }

        .chat-box::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 999px;
            border: 3px solid #f8fafc;
        }

        .date-chip {
            width: fit-content;
            margin: 0 auto 22px;
            padding: 7px 12px;
            border-radius: 999px;
            background: rgba(15, 23, 42, 0.06);
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
        }

        .message-item {
            display: flex;
            align-items: flex-end;
            gap: 10px;
            margin-bottom: 18px;
            animation: popIn .22s ease-out;
        }

        .message-item.is-me {
            justify-content: flex-end;
        }

        .message-avatar {
            flex: 0 0 34px;
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: #e2e8f0;
            color: #475569;
            font-size: 12px;
            font-weight: 800;
        }

        .message-item.is-me .message-avatar {
            order: 2;
            background: var(--primary-soft);
            color: var(--primary-dark);
        }

        .message-content {
            max-width: min(560px, 78%);
        }

        .message-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 6px;
            color: #475569;
            font-size: 12px;
            font-weight: 700;
        }

        .message-item.is-me .message-meta {
            justify-content: flex-end;
        }

        .message-time {
            color: #94a3b8;
            font-weight: 600;
        }

        .message-bubble {
            padding: 12px 15px;
            border-radius: 18px 18px 18px 6px;
            background: var(--white);
            color: #1e293b;
            border: 1px solid var(--border);
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
            line-height: 1.6;
            font-size: 14px;
            word-break: break-word;
        }

        .message-item.is-me .message-bubble {
            color: white;
            border-color: transparent;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 18px 18px 6px 18px;
            box-shadow: 0 12px 24px rgba(14, 165, 233, 0.20);
        }

        .chat-input-area {
            position: relative;
            z-index: 5;
            padding: 16px 28px 18px;
            border-top: 1px solid var(--border);
            background: rgba(255, 255, 255, 0.96);
        }

        .form-chat {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 9px;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: #f8fafc;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.05);
        }

        .form-chat input {
            flex: 1;
            width: 100%;
            min-width: 0;
            border: none;
            outline: none;
            background: transparent;
            color: var(--dark);
            font-size: 14px;
            padding: 11px 8px;
        }

        .form-chat input::placeholder {
            color: #94a3b8;
        }

        .form-chat button {
            flex: 0 0 auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 108px;
            border: none;
            cursor: pointer;
            border-radius: 15px;
            padding: 12px 18px;
            color: white;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            box-shadow: 0 12px 24px rgba(22, 163, 74, 0.22);
            transition: transform .18s ease, box-shadow .18s ease, opacity .18s ease;
        }

        .form-chat button:hover {
            transform: translateY(-1px);
            box-shadow: 0 16px 28px rgba(14, 165, 233, 0.25);
        }

        .form-chat button:disabled {
            opacity: .65;
            cursor: not-allowed;
            transform: none;
        }

        .input-note {
            margin: 8px 8px 0;
            color: var(--muted);
            font-size: 12px;
        }

        .empty-state {
            height: 100%;
            display: grid;
            place-items: center;
            text-align: center;
            color: var(--muted);
        }

        .empty-state div {
            max-width: 340px;
        }

        .empty-state .empty-icon {
            width: 66px;
            height: 66px;
            display: grid;
            place-items: center;
            margin: 0 auto 14px;
            border-radius: 24px;
            background: var(--primary-soft);
            color: var(--primary-dark);
            font-size: 30px;
        }

        .empty-state h3 {
            margin: 0;
            color: var(--dark);
            font-size: 18px;
        }

        .empty-state p {
            margin: 8px 0 0;
            font-size: 13px;
            line-height: 1.7;
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 920px) {
            .chat-wrapper {
                height: calc(100vh - 28px);
                grid-template-columns: 1fr;
                border-radius: 22px;
            }

            .chat-sidebar {
                display: none;
            }

            .page-shell {
                padding: 14px;
            }
        }

        @media (max-width: 640px) {
            .chat-header,
            .chat-box,
            .chat-input-area {
                padding-left: 16px;
                padding-right: 16px;
            }

            .chat-header {
                padding-top: 18px;
                padding-bottom: 18px;
            }

            .header-top {
                align-items: flex-start;
                flex-direction: column;
            }

            .chat-title h2 {
                white-space: normal;
                font-size: 18px;
            }

            .status-pill {
                padding: 8px 11px;
            }

            .message-content {
                max-width: 82%;
            }

            .message-avatar {
                display: none;
            }

            .form-chat {
                gap: 8px;
            }

            .form-chat button {
                min-width: auto;
                padding: 12px 14px;
            }

            .button-text {
                display: none;
            }
        }

        @media (max-height: 760px) and (min-width: 921px) {
            .page-shell {
                align-items: flex-start;
                padding-top: 18px;
                padding-bottom: 18px;
            }

            .chat-wrapper {
                height: calc(100vh - 96px);
            }

            .chat-sidebar {
                padding: 24px;
            }

            .info-list {
                margin-top: 22px;
                gap: 10px;
            }

            .info-item {
                padding: 12px;
            }

            .sidebar-footer {
                display: none;
            }

            .chat-header {
                padding: 18px 24px;
            }

            .chat-box {
                padding: 22px 24px;
            }

            .chat-input-area {
                padding: 14px 24px 16px;
            }
        }

    </style>
</head>
<body>

<div class="page-shell">
    <main class="chat-wrapper">
        <aside class="chat-sidebar">
            <div class="brand-badge">💊</div>

            <h1>Layanan Konsultasi Apotek MD Farma</h1>
            <p>
                Konsultasikan penggunaan obat, aturan pakai, dan informasi dasar obat secara online dengan layanan apotek.
            </p>

            <div class="info-list">
                <div class="info-item">
                    <div class="info-icon">🟢</div>
                    <div>
                        <strong>Status Layanan</strong>
                        <span>Chat aktif dan siap menerima pertanyaan konsultasi.</span>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">📝</div>
                    <div>
                        <strong>Riwayat Tersimpan</strong>
                        <span>Setiap percakapan tersimpan sebagai dokumentasi konsultasi.</span>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">👨‍⚕️</div>
                    <div>
                        <strong>Ditangani Petugas</strong>
                        <span>Pesan akan dijawab oleh admin atau apoteker yang bertugas.</span>
                    </div>
                </div>
            </div>

            <div class="sidebar-footer">
                Gunakan layanan ini untuk konsultasi umum. Untuk kondisi darurat, segera hubungi fasilitas kesehatan terdekat.
            </div>
        </aside>

        <section class="chat-main">
            <header class="chat-header">
                <div class="header-top">
                    <div class="chat-title">
                        <div class="avatar">MD</div>
                        <div>
                            <h2>Konsultasi Obat Apotek MD Farma</h2>
                            <p>Silakan tulis pertanyaan konsultasi obat Anda kepada apoteker.</p>
                        </div>
                    </div>

                    <div class="status-pill">
                        <span class="status-dot"></span>
                        Online
                    </div>
                </div>
            </header>

            <div id="chatBox" class="chat-box">
                @if ($messages->count())
                    <div class="date-chip">Percakapan Konsultasi</div>

                    @foreach ($messages as $msg)
                        @php
                            $isMine = (int) $msg->sender_id === (int) auth()->id();
                            $senderName = $msg->sender->name ?? 'User';
                            $initial = strtoupper(mb_substr($senderName, 0, 1));
                        @endphp

                        <div class="message-item {{ $isMine ? 'is-me' : '' }}">
                            <div class="message-avatar">{{ $initial }}</div>

                            <div class="message-content">
                                <div class="message-meta">
                                    <span>{{ $senderName }}</span>
                                    <span class="message-time">{{ $msg->created_at->format('H:i') }}</span>
                                </div>

                                <div class="message-bubble">{{ $msg->message }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <div>
                            <div class="empty-icon">💬</div>
                            <h3>Belum ada percakapan</h3>
                            <p>Mulai konsultasi dengan menuliskan pertanyaan pertama Anda pada kolom pesan di bawah.</p>
                        </div>
                    </div>
                @endif
            </div>

            <div class="chat-input-area">
                <form id="chatForm" class="form-chat">
                    <input
                        type="text"
                        id="messageInput"
                        placeholder="Tulis pesan konsultasi..."
                        autocomplete="off"
                    >
                    <button type="submit" id="sendButton">
                        <span class="button-text">Kirim</span>
                        <span>➜</span>
                    </button>
                </form>
                <div class="input-note">
                    Pesan konsultasi akan tersimpan pada riwayat sistem.
                </div>
            </div>
        </section>
    </main>
</div>

<script>
    const conversationId = @json($conversation->id);
    const currentUserId = @json(auth()->id());
    const chatBox = document.getElementById('chatBox');
    const chatForm = document.getElementById('chatForm');
    const messageInput = document.getElementById('messageInput');
    const sendButton = document.getElementById('sendButton');
    const sendUrl = @json(route('chat.send', $conversation));

    function scrollBottom() {
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    function escapeHtml(value) {
        return String(value)
            .replaceAll('&', '&amp;')
            .replaceAll('<', '&lt;')
            .replaceAll('>', '&gt;')
            .replaceAll('"', '&quot;')
            .replaceAll("'", '&#039;');
    }

    function getInitial(name) {
        return String(name || 'U').trim().charAt(0).toUpperCase();
    }

    function removeEmptyState() {
        const emptyState = chatBox.querySelector('.empty-state');

        if (emptyState) {
            chatBox.innerHTML = '<div class="date-chip">Percakapan Konsultasi</div>';
        }
    }

    function appendMessage(data) {
        removeEmptyState();

        const isMine = Number(data.sender_id) === Number(currentUserId);
        const div = document.createElement('div');

        div.className = `message-item ${isMine ? 'is-me' : ''}`;

        div.innerHTML = `
            <div class="message-avatar">${escapeHtml(getInitial(data.sender_name))}</div>
            <div class="message-content">
                <div class="message-meta">
                    <span>${escapeHtml(data.sender_name)}</span>
                    <span class="message-time">${escapeHtml(data.created_at)}</span>
                </div>
                <div class="message-bubble">${escapeHtml(data.message)}</div>
            </div>
        `;

        chatBox.appendChild(div);
        scrollBottom();
    }

    scrollBottom();

    chatForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const message = messageInput.value.trim();

        if (!message) {
            return;
        }

        messageInput.value = '';
        sendButton.disabled = true;

        try {
            const response = await fetch(sendUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ message })
            });

            const result = await response.json();

            if (result.success) {
                appendMessage(result.message);
            }
        } catch (error) {
            alert('Pesan gagal dikirim. Silakan coba lagi.');
            messageInput.value = message;
        } finally {
            sendButton.disabled = false;
            messageInput.focus();
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        if (window.Echo) {
            window.Echo.private(`conversation.${conversationId}`)
                .listen('.message.sent', function (e) {
                    appendMessage(e.message);
                });
        }
    });
</script>

</body>
</html>
