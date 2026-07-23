<x-filament-panels::page>
    @vite(['resources/js/app.js'])

    <style>
        .admin-chat-page {
            --md-primary: #16a34a;
            --md-primary-dark: #15803d;
            --md-sky: #0ea5e9;
            --md-emerald-soft: #dcfce7;
            --md-danger: #ef4444;
            --md-dark: #0f172a;
            --md-muted: #64748b;
            --md-border: #e2e8f0;
            --md-card: #ffffff;
            --md-bg: #f8fafc;

            width: 100%;
            min-height: 78vh;
            padding: 22px;
            border-radius: 30px;
            background:
                radial-gradient(circle at 8% 8%, rgba(22, 163, 74, 0.16), transparent 28%),
                radial-gradient(circle at 92% 14%, rgba(14, 165, 233, 0.14), transparent 24%),
                linear-gradient(135deg, #f8fafc 0%, #f0fdf4 100%);
            border: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: 0 24px 70px rgba(15, 23, 42, 0.08);
        }

        .dark .admin-chat-page {
            --md-card: #111827;
            --md-bg: #0f172a;
            --md-border: rgba(255, 255, 255, 0.10);
            --md-dark: #f8fafc;
            --md-muted: #94a3b8;

            background:
                radial-gradient(circle at 8% 8%, rgba(22, 163, 74, 0.12), transparent 28%),
                radial-gradient(circle at 92% 14%, rgba(14, 165, 233, 0.10), transparent 24%),
                linear-gradient(135deg, #020617 0%, #0f172a 100%);
        }

        .admin-chat-layout {
            display: grid;
            grid-template-columns: 340px minmax(0, 1fr);
            gap: 22px;
            align-items: stretch;
        }

        .admin-card {
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 26px;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.07);
            overflow: hidden;
            backdrop-filter: blur(14px);
        }

        .dark .admin-card {
            background: rgba(15, 23, 42, 0.86);
            border-color: rgba(255, 255, 255, 0.10);
        }

        .consult-hero {
            position: relative;
            padding: 26px;
            min-height: 290px;
            color: white;
            background:
                linear-gradient(145deg, rgba(22, 163, 74, 0.98), rgba(14, 165, 233, 0.92)),
                url("data:image/svg+xml,%3Csvg width='140' height='140' viewBox='0 0 140 140' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='rgba(255,255,255,.17)' stroke-width='1'%3E%3Cpath d='M0 70h140M70 0v140'/%3E%3Ccircle cx='70' cy='70' r='42'/%3E%3C/g%3E%3C/svg%3E");
        }

        .consult-hero::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            right: -70px;
            bottom: -70px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.18);
        }

        .hero-icon {
            position: relative;
            z-index: 1;
            width: 62px;
            height: 62px;
            display: grid;
            place-items: center;
            margin-bottom: 20px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.18);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,.25);
            font-size: 30px;
        }

        .consult-hero h2 {
            position: relative;
            z-index: 1;
            margin: 0;
            font-size: 25px;
            line-height: 1.15;
            font-weight: 800;
            letter-spacing: -0.04em;
        }

        .consult-hero p {
            position: relative;
            z-index: 1;
            margin: 12px 0 0;
            color: rgba(255,255,255,.88);
            font-size: 14px;
            line-height: 1.75;
        }

        .hero-mini-grid {
            position: relative;
            z-index: 1;
            display: grid;
            gap: 12px;
            margin-top: 24px;
        }

        .hero-mini-card {
            padding: 14px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,.18);
        }

        .hero-mini-label {
            color: rgba(255,255,255,.72);
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .hero-mini-value {
            margin-top: 5px;
            font-size: 15px;
            font-weight: 800;
        }

        .detail-card { padding: 20px; }

        .detail-title-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
        }

        .detail-title {
            margin: 0;
            color: var(--md-dark);
            font-size: 16px;
            font-weight: 800;
            letter-spacing: -0.02em;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 11px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
        }

        .status-badge.open { color: #166534; background: #dcfce7; }
        .status-badge.closed { color: #991b1b; background: #fee2e2; }

        .status-badge span {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: currentColor;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.16);
        }

        .detail-list { display: grid; gap: 14px; }

        .detail-item {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            padding: 14px;
            border-radius: 18px;
            background: rgba(248, 250, 252, 0.94);
            border: 1px solid rgba(226, 232, 240, 0.82);
        }

        .dark .detail-item {
            background: rgba(30, 41, 59, 0.76);
            border-color: rgba(255, 255, 255, 0.09);
        }

        .detail-icon {
            width: 38px;
            height: 38px;
            flex: 0 0 38px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            background: var(--md-emerald-soft);
            color: var(--md-primary-dark);
        }

        .detail-label {
            color: var(--md-dark);
            font-size: 13px;
            font-weight: 800;
        }

        .detail-value {
            margin-top: 4px;
            color: var(--md-muted);
            font-size: 13px;
            line-height: 1.45;
        }

        .action-button {
            width: 100%;
            margin-top: 18px;
            padding: 13px 16px;
            border: 0;
            border-radius: 17px;
            color: white;
            font-weight: 800;
            cursor: pointer;
            transition: transform .16s ease, box-shadow .16s ease, opacity .16s ease;
        }

        .action-button:hover { transform: translateY(-1px); }
        .action-button.danger { background: linear-gradient(135deg, #ef4444, #dc2626); box-shadow: 0 14px 28px rgba(239, 68, 68, .18); }
        .action-button.success { background: linear-gradient(135deg, #22c55e, #0ea5e9); box-shadow: 0 14px 28px rgba(34, 197, 94, .18); }

        .chat-panel {
            display: grid;
            grid-template-rows: auto minmax(0, 1fr) auto;
            min-height: 760px;
        }

        .chat-topbar {
            padding: 22px 24px;
            border-bottom: 1px solid var(--md-border);
            background: rgba(255, 255, 255, 0.86);
        }

        .dark .chat-topbar { background: rgba(15, 23, 42, 0.86); }

        .topbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .patient-head {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
        }

        .patient-avatar {
            width: 56px;
            height: 56px;
            flex: 0 0 56px;
            display: grid;
            place-items: center;
            border-radius: 20px;
            color: white;
            font-weight: 900;
            font-size: 20px;
            background: linear-gradient(135deg, var(--md-primary), var(--md-sky));
            box-shadow: 0 14px 28px rgba(14, 165, 233, 0.22);
        }

        .patient-head h1 {
            margin: 0;
            color: var(--md-dark);
            font-size: 22px;
            font-weight: 900;
            letter-spacing: -0.04em;
        }

        .patient-head p {
            margin: 5px 0 0;
            color: var(--md-muted);
            font-size: 13px;
        }

        .live-pill {
            flex: 0 0 auto;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 10px 14px;
            border-radius: 999px;
            background: #f1f5f9;
            color: #475569;
            font-size: 12px;
            font-weight: 900;
        }

        .dark .live-pill { background: rgba(255, 255, 255, 0.08); color: #cbd5e1; }

        .live-pill span {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #22c55e;
            box-shadow: 0 0 0 5px rgba(34, 197, 94, 0.14);
        }

        .chat-scroll {
            min-height: 0;
            height: 100%;
            overflow-y: auto;
            padding: 24px;
            scroll-behavior: smooth;
            background:
                linear-gradient(rgba(248, 250, 252, .74), rgba(248, 250, 252, .74)),
                url("data:image/svg+xml,%3Csvg width='28' height='28' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='4' cy='4' r='1' fill='%23bfdbfe' opacity='.75'/%3E%3C/svg%3E");
        }

        .dark .chat-scroll {
            background:
                linear-gradient(rgba(15, 23, 42, .80), rgba(15, 23, 42, .80)),
                url("data:image/svg+xml,%3Csvg width='28' height='28' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='4' cy='4' r='1' fill='%23334155' opacity='.90'/%3E%3C/svg%3E");
        }

        .chat-scroll::-webkit-scrollbar { width: 10px; }
        .chat-scroll::-webkit-scrollbar-thumb { background: #cbd5e1; border: 3px solid #f8fafc; border-radius: 999px; }
        .dark .chat-scroll::-webkit-scrollbar-thumb { background: #475569; border-color: #0f172a; }

        .history-chip {
            width: fit-content;
            margin: 0 auto 24px;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(15, 23, 42, 0.06);
            color: var(--md-muted);
            font-size: 12px;
            font-weight: 900;
        }

        .dark .history-chip { background: rgba(255, 255, 255, 0.08); }

        .message-list { display: grid; gap: 20px; }

        .message-row {
            display: flex;
            align-items: flex-end;
            gap: 12px;
            animation: message-in .2s ease-out;
        }

        .message-row.mine { justify-content: flex-end; }

        @keyframes message-in {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .mini-avatar {
            width: 38px;
            height: 38px;
            flex: 0 0 38px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            background: #e2e8f0;
            color: #475569;
            font-size: 13px;
            font-weight: 900;
        }

        .message-row.mine .mini-avatar {
            order: 2;
            background: #dcfce7;
            color: #166534;
        }

        .message-body { max-width: min(620px, 72%); }

        .message-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 7px;
            color: #475569;
            font-size: 12px;
            font-weight: 900;
        }

        .message-row.mine .message-meta { justify-content: flex-end; color: #15803d; }
        .dark .message-meta { color: #cbd5e1; }

        .message-time { color: #94a3b8; font-weight: 700; }

        .bubble {
            padding: 13px 16px;
            border-radius: 20px 20px 20px 7px;
            font-size: 14px;
            line-height: 1.65;
            word-break: break-word;
        }

        .bubble.patient {
            background: white;
            color: #0f172a;
            border: 1px solid rgba(226, 232, 240, 0.94);
            box-shadow: 0 12px 26px rgba(15, 23, 42, 0.06);
        }

        .dark .bubble.patient {
            background: rgba(30, 41, 59, 0.95);
            color: #f8fafc;
            border-color: rgba(255, 255, 255, 0.09);
        }

        .bubble.mine {
            color: white;
            border-radius: 20px 20px 7px 20px;
            background: linear-gradient(135deg, var(--md-primary), var(--md-sky));
            box-shadow: 0 16px 30px rgba(14, 165, 233, 0.20);
        }

        .empty-chat {
            display: grid;
            place-items: center;
            min-height: 420px;
            text-align: center;
        }

        .empty-icon {
            width: 70px;
            height: 70px;
            display: grid;
            place-items: center;
            margin: 0 auto 14px;
            border-radius: 26px;
            background: #dcfce7;
            color: #166534;
            font-size: 32px;
        }

        .empty-chat h3 {
            margin: 0;
            color: var(--md-dark);
            font-size: 18px;
            font-weight: 900;
        }

        .empty-chat p {
            max-width: 360px;
            margin: 8px 0 0;
            color: var(--md-muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .reply-area {
            padding: 18px 24px 22px;
            border-top: 1px solid var(--md-border);
            background: rgba(255, 255, 255, 0.92);
        }

        .dark .reply-area { background: rgba(15, 23, 42, 0.92); }

        .reply-box {
            display: grid;
            gap: 12px;
            padding: 12px;
            border: 1px solid var(--md-border);
            border-radius: 22px;
            background: #f8fafc;
            box-shadow: 0 10px 26px rgba(15, 23, 42, 0.05);
        }

        .dark .reply-box { background: rgba(30, 41, 59, 0.76); }

        .reply-textarea {
            width: 100%;
            min-height: 58px;
            max-height: 160px;
            resize: vertical;
            border: none;
            outline: none;
            background: transparent;
            color: var(--md-dark);
            font-size: 14px;
            line-height: 1.6;
        }

        .reply-textarea::placeholder { color: #94a3b8; }

        .reply-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
        }

        .reply-note { color: var(--md-muted); font-size: 12px; }

        .send-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            border: none;
            border-radius: 16px;
            padding: 12px 18px;
            color: white;
            font-weight: 900;
            cursor: pointer;
            background: linear-gradient(135deg, var(--md-primary), var(--md-sky));
            box-shadow: 0 14px 28px rgba(14, 165, 233, 0.20);
            transition: transform .16s ease, box-shadow .16s ease;
        }

        .send-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 36px rgba(14, 165, 233, 0.24);
        }

        .closed-notice {
            padding: 18px 24px;
            border-top: 1px solid var(--md-border);
            background: #f1f5f9;
            color: var(--md-muted);
            font-size: 13px;
            line-height: 1.7;
        }

        .dark .closed-notice { background: rgba(30, 41, 59, 0.82); }

        .error-text {
            color: #dc2626;
            font-size: 13px;
            font-weight: 700;
        }

        @media (max-width: 1180px) {
            .admin-chat-layout { grid-template-columns: 1fr; }
            .chat-panel { min-height: 700px; }
        }

        @media (max-width: 720px) {
            .admin-chat-page {
                padding: 12px;
                border-radius: 22px;
            }

            .topbar-inner,
            .reply-footer {
                align-items: flex-start;
                flex-direction: column;
            }

            .message-body { max-width: 80%; }
            .send-button { width: 100%; }
        }
    </style>

    <div
        class="admin-chat-page"
        x-data
        x-init="
            const box = document.getElementById('adminChatBox');
            if (box) {
                box.scrollTop = box.scrollHeight;
                $nextTick(() => box.scrollTop = box.scrollHeight);
            }
        "
    >
        <div class="admin-chat-layout">
            <aside>
                <div class="admin-card consult-hero">
                    <div class="hero-icon">💊</div>

                    <h2>Ruang Konsultasi Apotek</h2>

                    <p>
                        Kelola percakapan pasien, berikan respon konsultasi, dan simpan seluruh riwayat layanan secara terstruktur.
                    </p>

                    <div class="hero-mini-grid">
                        <div class="hero-mini-card">
                            <div class="hero-mini-label">Pasien</div>
                            <div class="hero-mini-value">{{ $record->patient->name ?? 'Pasien' }}</div>
                        </div>

                        <div class="hero-mini-card">
                            <div class="hero-mini-label">Ditangani Oleh</div>
                            <div class="hero-mini-value">{{ $record->staff->name ?? auth()->user()->name ?? 'Admin' }}</div>
                        </div>
                    </div>
                </div>

                <div class="admin-card detail-card" style="margin-top: 18px;">
                    <div class="detail-title-row">
                        <h3 class="detail-title">Detail Konsultasi</h3>

                        @if ($record->status === 'open')
                            <span class="status-badge open"><span></span>Open</span>
                        @else
                            <span class="status-badge closed"><span></span>Closed</span>
                        @endif
                    </div>

                    <div class="detail-list">
                        <div class="detail-item">
                            <div class="detail-icon">📝</div>
                            <div>
                                <div class="detail-label">Subjek</div>
                                <div class="detail-value">{{ $record->subject ?? 'Konsultasi Obat' }}</div>
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-icon" style="background:#e0f2fe;color:#0369a1;">💬</div>
                            <div>
                                <div class="detail-label">Jumlah Pesan</div>
                                <div id="messageCount" class="detail-value">{{ $record->messages()->count() }} pesan tersimpan</div>
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-icon" style="background:#fef3c7;color:#92400e;">⏱️</div>
                            <div>
                                <div class="detail-label">Terakhir Update</div>
                                <div id="lastUpdate" class="detail-value">{{ $record->updated_at?->format('d M Y H:i') }}</div>
                            </div>
                        </div>
                    </div>

                    @if ($record->status === 'open')
                        <button type="button" class="action-button danger" wire:click="closeConversation">
                            Tutup Konsultasi
                        </button>
                    @else
                        <button type="button" class="action-button success" wire:click="reopenConversation">
                            Buka Kembali Konsultasi
                        </button>
                    @endif
                </div>
            </aside>

            <section class="admin-card chat-panel">
                <header class="chat-topbar">
                    <div class="topbar-inner">
                        <div class="patient-head">
                            <div class="patient-avatar">
                                {{ strtoupper(mb_substr($record->patient->name ?? 'P', 0, 1)) }}
                            </div>

                            <div>
                                <h1>Chat dengan {{ $record->patient->name ?? 'Pasien' }}</h1>
                                <p>Balas pesan konsultasi pasien secara langsung dari panel admin.</p>
                            </div>
                        </div>

                        <div class="live-pill">
                            <span></span>
                            Live Chat
                        </div>
                    </div>
                </header>

                <div
                    id="adminChatBox"
                    class="chat-scroll"
                >
                    <div class="history-chip">Riwayat Konsultasi</div>

                    @php
                        $chatMessages = $record->messages()->with('sender')->oldest()->get();
                    @endphp

                    <div id="messageList" class="message-list">
                        @foreach ($chatMessages as $msg)
                            @php
                                $isMine = (int) $msg->sender_id === (int) auth()->id();
                                $senderName = $msg->sender->name ?? 'User';
                                $initial = strtoupper(mb_substr($senderName, 0, 1));
                            @endphp

                            <div class="message-row {{ $isMine ? 'mine' : '' }}" data-message-id="{{ $msg->id }}">
                                <div class="mini-avatar">{{ $initial }}</div>

                                <div class="message-body">
                                    <div class="message-meta">
                                        <span>{{ $senderName }}</span>
                                        <span class="message-time">{{ $msg->created_at->format('H:i') }}</span>
                                    </div>

                                    <div class="bubble {{ $isMine ? 'mine' : 'patient' }}">
                                        {{ $msg->message }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if (! $chatMessages->count())
                        <div id="emptyChat" class="empty-chat">
                            <div>
                                <div class="empty-icon">💬</div>
                                <h3>Belum ada pesan</h3>
                                <p>Percakapan akan tampil di sini setelah pasien mengirim pesan konsultasi.</p>
                            </div>
                        </div>
                    @endif
                </div>

                @if ($record->status === 'open')
                    <div class="reply-area">
                        <form wire:submit.prevent="sendMessage">
                            <div class="reply-box">
                                <textarea
                                    wire:model.defer="message"
                                    class="reply-textarea"
                                    rows="2"
                                    placeholder="Tulis balasan untuk pasien..."
                                ></textarea>

                                @error('message')
                                    <div class="error-text">{{ $message }}</div>
                                @enderror

                                <div class="reply-footer">
                                    <div class="reply-note">
                                        Balasan akan tersimpan pada riwayat konsultasi pasien.
                                    </div>

                                    <button type="submit" class="send-button">
                                        Kirim Balasan
                                        <span>➜</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="closed-notice">
                        Konsultasi ini sudah ditutup. Buka kembali konsultasi jika ingin mengirim balasan.
                    </div>
                @endif
            </section>
        </div>
    </div>

    <script>
        window.mdFarmaAdminChat = window.mdFarmaAdminChat || {};

        window.mdFarmaAdminChat.boot = function () {
            const conversationId = @json($record->id);
            const currentUserId = @json(auth()->id());

            let messageTotal = Number(@json($record->messages()->count()));

            const chatBox = document.getElementById('adminChatBox');
            const messageList = document.getElementById('messageList');
            const messageCount = document.getElementById('messageCount');
            const lastUpdate = document.getElementById('lastUpdate');

            if (!chatBox || !messageList) {
                return;
            }

            if (window.mdFarmaAdminChat.currentChannel === conversationId) {
                return;
            }

            if (window.mdFarmaAdminChat.currentChannel && window.Echo) {
                window.Echo.leave(`private-conversation.${window.mdFarmaAdminChat.currentChannel}`);
                window.Echo.leave(`conversation.${window.mdFarmaAdminChat.currentChannel}`);
            }

            window.mdFarmaAdminChat.currentChannel = conversationId;

            function scrollBottom() {
                chatBox.scrollTop = chatBox.scrollHeight;
            }

            function escapeHtml(value) {
                return String(value ?? '')
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
                const emptyChat = document.getElementById('emptyChat');

                if (emptyChat) {
                    emptyChat.remove();
                }
            }

            function updateMeta() {
                messageTotal += 1;

                if (messageCount) {
                    messageCount.textContent = `${messageTotal} pesan tersimpan`;
                }

                if (lastUpdate) {
                    lastUpdate.textContent = 'Baru saja';
                }
            }

            function appendMessage(data) {
                if (!data || !data.id) {
                    return;
                }

                if (document.querySelector(`[data-message-id="${data.id}"]`)) {
                    return;
                }

                removeEmptyState();

                const isMine = Number(data.sender_id) === Number(currentUserId);
                const row = document.createElement('div');

                row.className = `message-row ${isMine ? 'mine' : ''}`;
                row.dataset.messageId = data.id;

                row.innerHTML = `
                    <div class="mini-avatar">${escapeHtml(getInitial(data.sender_name))}</div>

                    <div class="message-body">
                        <div class="message-meta">
                            <span>${escapeHtml(data.sender_name)}</span>
                            <span class="message-time">${escapeHtml(data.created_at)}</span>
                        </div>

                        <div class="bubble ${isMine ? 'mine' : 'patient'}">
                            ${escapeHtml(data.message)}
                        </div>
                    </div>
                `;

                messageList.appendChild(row);
                updateMeta();
                scrollBottom();
            }

            function subscribeRealtime() {
                if (!window.Echo) {
                    console.warn('Laravel Echo belum tersedia di halaman admin. Cek file resources/js/app.js dan npm run build/dev.');
                    setTimeout(subscribeRealtime, 500);
                    return;
                }

                console.log(`Subscribe realtime: conversation.${conversationId}`);

                window.Echo.private(`conversation.${conversationId}`)
                    .listen('.message.sent', function (event) {
                        console.log('Pesan realtime diterima admin:', event);
                        appendMessage(event.message);
                    })
                    .error(function (error) {
                        console.error('Gagal subscribe private channel admin:', error);
                    });
            }

            scrollBottom();
            subscribeRealtime();
        };

        document.addEventListener('DOMContentLoaded', function () {
            window.mdFarmaAdminChat.boot();
        });

        document.addEventListener('livewire:navigated', function () {
            window.mdFarmaAdminChat.currentChannel = null;
            window.mdFarmaAdminChat.boot();
        });

        setTimeout(function () {
            window.mdFarmaAdminChat.boot();
        }, 800);
    </script>
</x-filament-panels::page>
