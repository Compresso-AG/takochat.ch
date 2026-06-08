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
    let chatStarted = false;

    // --- Analytics helper (Google Analytics / gtag) ---
    const track = (name, params = {}) => {
        if (typeof window.gtag === 'function') {
            window.gtag('event', name, params);
        }
    };

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

    const handleSend = async (text, source = 'input') => {
        if (isWaiting) return;

        // Use provided text or input value
        const message = text || (chatInput ? chatInput.value.trim() : '');
        if (!message) return;

        // Enforce max length
        const truncated = message.substring(0, MAX_INPUT_LENGTH);

        // Track first interaction of the session, then each sent message
        if (!chatStarted) {
            chatStarted = true;
            track('chat_start', { source });
        }
        track('chat_message_sent', { source, message_length: truncated.length });

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

                // Classify the error for analytics
                let errorType = 'other';
                if (response.status === 429 || /limit/i.test(data.error)) errorType = 'rate_limit';
                else if (response.status >= 500) errorType = 'server';
                track('chat_error', { error_type: errorType, status: response.status });
            } else {
                chatHistory.appendChild(createBubble(data.reply, 'bot'));
                track('chat_response_received', { reply_length: (data.reply || '').length });

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
            track('chat_error', { error_type: 'network' });
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
            if (question) handleSend(question, 'example');
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

    // --- Link & CTA Tracking (event delegation) ---
    // Erfasst Kontakt-Mails, Preis-Anfragen, CTAs, Navigation und externe Links.
    const sectionOf = (el) => {
        const section = el.closest('section[id]');
        return section ? section.id : 'header';
    };

    document.addEventListener('click', (e) => {
        const link = e.target.closest('a');
        if (!link) return;

        const href = link.getAttribute('href') || '';
        const label = (link.textContent || '').trim().replace(/\s+/g, ' ').slice(0, 60);
        const location = sectionOf(link);

        // 1) E-Mail-Links (Kontakt & Preis-Anfragen)
        if (href.startsWith('mailto:')) {
            const recipient = href.slice(7).split('?')[0];
            const subjectMatch = href.match(/[?&]subject=([^&]*)/);
            const subject = subjectMatch ? decodeURIComponent(subjectMatch[1]) : '';

            const plan = ['Small', 'Medium', 'Large'].find(p => subject.includes(p));
            if (plan) {
                // Preis-Paket angefragt -> Lead
                track('pricing_request', { plan, recipient, location });
                track('generate_lead', { plan, recipient });
            } else {
                track('contact_click', { method: 'email', recipient, location, label });
            }
            return;
        }

        // 2) Telefon-Links
        if (href.startsWith('tel:')) {
            track('contact_click', { method: 'phone', recipient: href.slice(4), location, label });
            return;
        }

        // 3) Interne Sprung-Links (#...) -> Navigation bzw. CTA
        if (href.startsWith('#') && href.length > 1) {
            const inNav = !!link.closest('#main-nav');
            track(inNav ? 'navigation_click' : 'cta_click', { target: href, label, location });
            return;
        }

        // 4) Externe Links (Impressum, Datenschutz, compresso.ch etc.)
        if (/^https?:\/\//i.test(href) && !href.includes(window.location.host)) {
            track('outbound_click', { url: href, label, location });
        }
    });
});
