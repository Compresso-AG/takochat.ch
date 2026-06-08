document.addEventListener('DOMContentLoaded', () => {

    // --- Chat Logic ---
    const MAX_INPUT_LENGTH = 600;
    const chatInput = document.getElementById('chat-input');
    const sendBtn = document.getElementById('chat-send');
    const chatHistory = document.getElementById('chat-history');
    const exampleBtns = document.querySelectorAll('.example-question');

    // Conversation history for context
    let conversationHistory = [];
    let isWaiting = false;

    const scrollToBottom = () => {
        if (chatHistory) chatHistory.scrollTop = chatHistory.scrollHeight;
    };

    const createBubble = (text, type = 'user') => {
        const msgDiv = document.createElement('div');
        msgDiv.className = `msg ${type}`;

        const bubbleDiv = document.createElement('div');
        bubbleDiv.className = 'bubble';
        bubbleDiv.textContent = text;

        msgDiv.appendChild(bubbleDiv);
        return msgDiv;
    };

    const createTypingIndicator = () => {
        const msgDiv = document.createElement('div');
        msgDiv.className = 'msg bot';
        msgDiv.id = 'typing-indicator';

        const bubbleDiv = document.createElement('div');
        bubbleDiv.className = 'bubble typing';
        bubbleDiv.innerHTML = '<span></span><span></span><span></span>';

        msgDiv.appendChild(bubbleDiv);
        return msgDiv;
    };

    const setInputEnabled = (enabled) => {
        if (chatInput) chatInput.disabled = !enabled;
        if (sendBtn) sendBtn.disabled = !enabled;
        exampleBtns.forEach(btn => btn.disabled = !enabled);
    };

    const handleSend = async (text) => {
        if (isWaiting) return;

        // Use provided text or input value
        const message = text || (chatInput ? chatInput.value.trim() : '');
        if (!message) return;

        // Enforce max length
        const truncated = message.substring(0, MAX_INPUT_LENGTH);

        // Show user message
        chatHistory.appendChild(createBubble(truncated, 'user'));
        if (chatInput) chatInput.value = '';
        scrollToBottom();

        // Show typing indicator
        isWaiting = true;
        setInputEnabled(false);
        chatHistory.appendChild(createTypingIndicator());
        scrollToBottom();

        try {
            const response = await fetch('api/chat.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    message: truncated,
                    history: conversationHistory
                })
            });

            // Remove typing indicator
            const indicator = document.getElementById('typing-indicator');
            if (indicator) indicator.remove();

            const data = await response.json();

            if (data.error) {
                chatHistory.appendChild(createBubble(data.error, 'bot'));
            } else {
                chatHistory.appendChild(createBubble(data.reply, 'bot'));

                // Store in conversation history
                conversationHistory.push(
                    { role: 'user', content: truncated },
                    { role: 'assistant', content: data.reply }
                );

                // Update remaining counter
                if (typeof data.remaining === 'number') {
                    updateRemainingCounter(data.remaining);
                }
            }
        } catch (err) {
            const indicator = document.getElementById('typing-indicator');
            if (indicator) indicator.remove();
            chatHistory.appendChild(createBubble('Verbindungsfehler. Bitte versuche es erneut.', 'bot'));
        }

        isWaiting = false;
        setInputEnabled(true);
        if (chatInput) chatInput.focus();
        scrollToBottom();
    };

    const updateRemainingCounter = (remaining) => {
        const counter = document.getElementById('msg-counter');
        if (counter) {
            counter.textContent = remaining + ' Nachrichten übrig';
            if (remaining <= 3) {
                counter.style.color = '#e74c3c';
            }
        }
    };

    // Input max length enforcement
    if (chatInput) {
        chatInput.maxLength = MAX_INPUT_LENGTH;
    }

    // Send button & Enter key
    if (sendBtn && chatInput) {
        sendBtn.addEventListener('click', () => handleSend());
        chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') handleSend();
        });
    }

    // Example question buttons
    exampleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const question = btn.dataset.question;
            if (question) handleSend(question);
        });
    });

    // --- Mobile Navigation ---
    const menuToggle = document.querySelector('.mobile-menu-toggle');
    const mainNav = document.getElementById('main-nav');

    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            mainNav.classList.toggle('is-open');
            menuToggle.classList.toggle('is-active');
            document.body.classList.toggle('no-scroll');
        });

        const navLinks = mainNav.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                mainNav.classList.remove('is-open');
                menuToggle.setAttribute('aria-expanded', 'false');
                menuToggle.classList.remove('is-active');
                document.body.classList.remove('no-scroll');
            });
        });
    }
});
