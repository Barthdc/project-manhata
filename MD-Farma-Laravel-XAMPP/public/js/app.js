'use strict';

document.addEventListener('DOMContentLoaded', () => {
    const room = document.querySelector('[data-chat-room]');

    if (!room) {
        return;
    }

    const list = room.querySelector('[data-message-list]');
    const messagesUrl = room.dataset.messagesUrl;
    const currentUserId = Number(room.dataset.currentUser);

    let lastMessageId = Number(
        list.querySelector('[data-message-id]:last-of-type')?.dataset.messageId ?? 0
    );

    const scrollToBottom = () => {
        list.scrollTop = list.scrollHeight;
    };

    const appendMessage = (message) => {
        if (list.querySelector(`[data-message-id="${message.id}"]`)) {
            return;
        }

        const article = document.createElement('article');
        article.className = 'chat-bubble';

        if (Number(message.sender_id) === currentUserId) {
            article.classList.add('chat-bubble-own');
        }

        article.dataset.messageId = String(message.id);

        const sender = document.createElement('strong');
        sender.textContent = message.sender_name;

        const body = document.createElement('p');
        body.textContent = message.body;

        const time = document.createElement('time');
        time.textContent = message.time;

        article.append(sender, body, time);
        list.append(article);

        lastMessageId = Math.max(lastMessageId, Number(message.id));
    };

    const loadMessages = async () => {
        try {
            const response = await fetch(
                `${messagesUrl}?after_id=${lastMessageId}`,
                {
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                }
            );

            if (!response.ok) {
                return;
            }

            const payload = await response.json();

            if (payload.messages.length > 0) {
                payload.messages.forEach(appendMessage);
                scrollToBottom();
            }
        } catch (error) {
            console.error('Gagal mengambil pesan terbaru.', error);
        }
    };

    scrollToBottom();
    window.setInterval(loadMessages, 3000);
});
