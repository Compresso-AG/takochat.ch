<!DOCTYPE html>
<html lang="de" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JX20D89WB7"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-JX20D89WB7');
    </script>

    <title>TaKo – Der Chatbot, der deine Inhalte kennt | Compresso</title>
    <meta name="description" content="Hi, ich bin TaKo. Talk & Knowledge – ein massgeschneiderter KI-Chatbot, trainiert auf deinen Inhalten. Sofort, präzise und rund um die Uhr.">
    <link rel="canonical" href="https://takochat.ch/">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#075da9">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="TaKo – Compresso AG">
    <meta property="og:locale" content="de_CH">
    <meta property="og:url" content="https://takochat.ch/">
    <meta property="og:title" content="TaKo – Der Chatbot, der deine Inhalte kennt">
    <meta property="og:description" content="Hi, ich bin TaKo. Talk & Knowledge – ein massgeschneiderter KI-Chatbot, trainiert auf deinen Inhalten.">
    <meta property="og:image" content="https://takochat.ch/assets/og-image.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="TaKo – Talk & Knowledge, der KI-Chatbot der Compresso AG">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="TaKo – Der Chatbot, der deine Inhalte kennt">
    <meta name="twitter:description" content="Hi, ich bin TaKo. Talk & Knowledge – ein massgeschneiderter KI-Chatbot.">
    <meta name="twitter:image" content="https://takochat.ch/assets/og-image.png">

    <link rel="icon" type="image/svg+xml" href="assets/tako.svg">
    <link rel="alternate icon" type="image/png" href="assets/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,500;12..96,600;12..96,700;12..96,800&family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css?v=<?= filemtime(__DIR__ . '/css/styles.css') ?>">

    <!-- Structured data (Schema.org / JSON-LD) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "Organization",
          "@id": "https://takochat.ch/#compresso",
          "name": "Compresso AG",
          "url": "https://compresso.ch",
          "logo": "https://takochat.ch/assets/logo.png",
          "email": "info@compresso.ch",
          "telephone": "+41 43 488 86 00",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Seestrasse 49",
            "postalCode": "8702",
            "addressLocality": "Zollikon",
            "addressCountry": "CH"
          }
        },
        {
          "@type": "WebSite",
          "@id": "https://takochat.ch/#website",
          "url": "https://takochat.ch/",
          "name": "TaKo – Talk & Knowledge",
          "inLanguage": "de-CH",
          "publisher": { "@id": "https://takochat.ch/#compresso" }
        },
        {
          "@type": "Product",
          "name": "TaKo – Talk & Knowledge",
          "description": "Massgeschneiderter KI-Chatbot, trainiert auf deinen Inhalten. Beantwortet Fragen rund um die Uhr – auf Website, Intranet oder im Messenger.",
          "brand": { "@id": "https://takochat.ch/#compresso" },
          "url": "https://takochat.ch/",
          "offers": [
            {
              "@type": "Offer",
              "name": "Small",
              "price": "2900",
              "priceCurrency": "CHF",
              "description": "Einmalige Set-up-Kosten. Für einen klaren Use-Case, eine Quelle, ein Look.",
              "url": "https://takochat.ch/#pricing"
            },
            {
              "@type": "Offer",
              "name": "Medium",
              "price": "5900",
              "priceCurrency": "CHF",
              "description": "Einmalige Set-up-Kosten. Mehrere Quellen, dein Branding, Prio-Support.",
              "url": "https://takochat.ch/#pricing"
            },
            {
              "@type": "Offer",
              "name": "Large",
              "price": "11900",
              "priceCurrency": "CHF",
              "description": "Einmalige Set-up-Kosten. Tiefe Integration, mehrere Sprachen, SLA.",
              "url": "https://takochat.ch/#pricing"
            }
          ]
        }
      ]
    }
    </script>
</head>
<body>

    <header id="header">
        <div class="header-bar container">
            <a href="#" class="wordmark" aria-label="TaKo Startseite">
                <span class="wordmark-name">TaKo</span>
                <span class="wordmark-sub">talk &amp; knowledge</span>
            </a>
            <button class="mobile-menu-toggle" aria-label="Menu öffnen" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav id="main-nav" aria-label="Hauptnavigation">
                <ul>
                    <li><a href="#meet">Triff TaKo</a></li>
                    <li><a href="#solution">Was ich kann</a></li>
                    <li><a href="#howitworks">So funktioniert's</a></li>
                    <li><a href="#demo">Demo</a></li>
                    <li><a href="#pricing">Preise</a></li>
                    <li><a href="#contact" class="btn btn-ghost btn-small">Kontakt</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>

        <!-- =================== HERO =================== -->
        <section id="hero" class="section-hero">
            <div class="container hero-grid">
                <div class="hero-copy">
                    <h1>Sag hallo zu <span class="hero-name">TaKo<span class="hero-period">.</span></span></h1>
                    <p class="hero-tagline"><strong>Talk &amp; Knowledge.</strong> Ein Chatbot, der deine Inhalte tatsächlich kennt wie ein langjähriger Mitarbeitender. Trainiert auf deinen Daten, antwortet es rund um die Uhr.</p>
                    <div class="hero-actions">
                        <a href="#demo" class="btn btn-primary">
                            <span>TaKo testen</span>
                            <span class="btn-arrow" aria-hidden="true">→</span>
                        </a>
                        <a href="#pricing" class="btn btn-ghost">Pakete ansehen</a>
                    </div>
                    <dl class="hero-meta">
                        <div><dt>Sprachen</dt><dd>30+</dd></div>
                        <div><dt>Quellen</dt><dd>Web · PDF · API</dd></div>
                        <div><dt>Hosting</dt><dd>Schweiz</dd></div>
                    </dl>
                </div>

                <aside class="hero-mascot" aria-label="TaKo Maskottchen">
                    <div class="mascot-frame">
                        <span class="mascot-tag mascot-tag-tr"><span class="dot dot-online" aria-hidden="true"></span> online</span>
                        <div class="mascot-art">
                            <?php include __DIR__ . '/partials/tako.svg.php'; ?>
                        </div>
                    </div>
                    <a href="#demo" class="mascot-bubble">
                        „Hi! Frag mich was — probier mich gleich hier in der Demo aus."
                    </a>
                </aside>
            </div>

            <div class="hero-marquee" aria-hidden="true">
                <div class="marquee-track">
                    <span>· Talk &amp; Knowledge</span>
                    <span>· Massgeschneidert</span>
                    <span>· DSGVO-konform</span>
                    <span>· Lokal entwickelt</span>
                    <span>· 24/7 erreichbar</span>
                    <span>· Mehrsprachig</span>
                    <span>· Talk &amp; Knowledge</span>
                    <span>· Massgeschneidert</span>
                    <span>· DSGVO-konform</span>
                    <span>· Lokal entwickelt</span>
                    <span>· 24/7 erreichbar</span>
                    <span>· Mehrsprachig</span>
                </div>
            </div>
        </section>

        <!-- =================== MEET / WHY =================== -->
        <section id="meet" class="section-meet">
            <div class="container">
                <div class="meet-grid">
                    <header class="meet-head">
                        <span class="kicker">Warum TaKo</span>
                        <h2>Nicht suchen sondern fragen.<br>Eine Antwort.</h2>
                        <p>Deine Besucher und Mitarbeitende wollen heute nicht mehr suchen – sie wollen fragen. Ich kenne und gebe die Antwort.</p>
                    </header>

                    <ol class="problem-list">
                        <li class="problem">
                            <span class="problem-num">01</span>
                            <h3>Geduld? Bestenfalls drei Sekunden.</h3>
                            <p>Kund:innen erwarten sofortige Antworten. Wer länger als drei Sekunden sucht, ist meistens schon weg. Ich antworte in einer.</p>
                        </li>
                        <li class="problem">
                            <span class="problem-num">02</span>
                            <h3>Niemand klickt sich mehr durch Menüs.</h3>
                            <p>Klassische Navigation funktioniert nicht mehr. Dein Publikum will direkt fragen, und ich beantworte das in ganzen Sätzen, nicht mit Link-Listen.</p>
                        </li>
                        <li class="problem">
                            <span class="problem-num">03</span>
                            <h3>Wissen liegt verstreut – ich bündle es.</h3>
                            <p>Intranet hier, Handbuch da, das aktuelle PDF irgendwo im Server. Ich sauge die Quellen, die du mir gibst, und mache daraus eine einzige Anlaufstelle.</p>
                        </li>
                    </ol>
                </div>
            </div>
        </section>

        <!-- =================== USE CASES =================== -->
        <section id="solution" class="section-usecases">
            <div class="container">
                <header class="section-head section-head-light">
                    <span class="kicker kicker-light">Wo ich helfe</span>
                    <h2>Viele Einsätze, eine Engine.</h2>
                    <p>Egal ob Endkund:in, Lieferant:in oder Team-intern – ich passe mich an. Hier vier typische Einsatzgebiete:</p>
                </header>

                <div class="usecase-grid">
                    <article class="usecase usecase-large">
                        <span class="usecase-tag">Helpdesk</span>
                        <h3>First-Level Support<br>auf Autopilot.</h3>
                        <p>Ich beantworte 70–90 % der Standardfragen rund um die Uhr und reiche nur das durch, was wirklich Menschen braucht. Dein Team gewinnt Stunden zurück.</p>
                        <ul class="usecase-list">
                            <li>FAQ-Themen</li>
                            <li>Bestell-Status</li>
                            <li>Onboarding-Fragen</li>
                        </ul>
                    </article>

                    <article class="usecase">
                        <span class="usecase-tag">Downloads</span>
                        <h3>Dokumente intelligent aus­liefern.</h3>
                        <p>Statt einer endlosen Liste sage ich konkret, welches PDF gerade passt – und liefere es direkt im Chat.</p>
                    </article>

                    <article class="usecase">
                        <span class="usecase-tag">Know-How</span>
                        <h3>Internes Wissen sichern.</h3>
                        <p>Mit Login: Mitarbeitende fragen mich, was im Handbuch, im Intranet oder im Confluence steht. Ohne Suchen.</p>
                    </article>

                    <article class="usecase">
                        <span class="usecase-tag">Suche</span>
                        <h3>Intelligente Suche über alles.</h3>
                        <p>Ich indexiere CMS, CRM, REST-APIs und PDFs, und antworte semantisch, nicht nur per Keyword-Match.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- =================== HOW IT WORKS =================== -->
        <section id="howitworks" class="section-how">
            <div class="container">
                <header class="section-head">
                    <span class="kicker">So funktioniert's</span>
                    <h2>Drei Schritte<br>vom Quell­dokument zur Antwort.</h2>
                </header>

                <div class="how-flow">
                    <article class="how-step">
                        <span class="how-step-num">01</span>
                        <h3>Du gibst mir Futter.</h3>
                        <p>Website, Dokumente, CRM, Cloud-Ordner – alles, was deine Inhalte hält. Ich frage nicht nach Berechtigungen für andere.</p>
                    </article>

                    <div class="how-connector" aria-hidden="true">
                        <span class="connector-arrow">→</span>
                    </div>

                    <article class="how-step how-step-feature">
                        <span class="how-step-num">02</span>
                        <h3>Ich verstehe es.</h3>
                        <p>Lokales Training, eigene Datenbank, keine Datenweitergabe an Dritte. Ich strukturiere, verknüpfe und finde Zusammenhänge.</p>
                    </article>

                    <div class="how-connector" aria-hidden="true">
                        <span class="connector-arrow">→</span>
                    </div>

                    <article class="how-step">
                        <span class="how-step-num">03</span>
                        <h3>Ich gebe Antworten.</h3>
                        <p>Auf deiner Website, im Intranet, im Messenger – wo du mich brauchst. Auf Wunsch mit Quellenangabe und Original-Link.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- =================== DEMO =================== -->
        <section id="demo" class="section-demo">
            <div class="container">
                <header class="demo-head">
                    <span class="kicker">Jetzt du</span>
                    <h2>Frag mich was.</h2>
                    <p>Ich kenne Compresso, unsere Pakete, unser Team und wie unser Chatbot tickt. Probier's einfach.</p>
                </header>

                <div class="chat-window">
                    <div class="chat-window-bar" aria-hidden="true">
                        <span class="chat-traffic-lights">
                            <span></span><span></span><span></span>
                        </span>
                        <span class="chat-window-title">
                            <span class="dot dot-online"></span>
                            tako · talk &amp; knowledge
                        </span>
                        <span class="chat-window-meta">v3 · de</span>
                    </div>

                    <div class="chat-interface" role="log" aria-live="polite">
                        <div id="chat-history" class="chat-history">
                            <div class="msg bot">
                                <div class="bubble">Hallo! Ich bin TaKo. Frag mich alles rund um Compresso und unsere Chatbot-Lösung. Wie kann ich dir helfen?</div>
                            </div>
                        </div>

                        <div class="chat-suggestions" aria-label="Vorgeschlagene Fragen">
                            <span class="chat-suggestions-label">Versuch's mit:</span>
                            <button class="example-question" data-question="Was macht Compresso?">Was macht Compresso?</button>
                            <button class="example-question" data-question="Welche Chatbot-Pakete gibt es?">Welche Pakete gibt es?</button>
                            <button class="example-question" data-question="Wie funktioniert der Bot technisch?">Wie funktionierst du technisch?</button>
                            <button class="example-question" data-question="Wer steckt hinter Compresso?">Wer steckt hinter Compresso?</button>
                        </div>

                        <div class="chat-input-area">
                            <label for="chat-input" class="visually-hidden">Frage an TaKo</label>
                            <input type="text" id="chat-input" placeholder="Frag mich was…" aria-label="Chat Eingabe" maxlength="600">
                            <button id="chat-send" type="button" aria-label="Senden">
                                <span>Senden</span>
                                <span class="btn-arrow" aria-hidden="true">→</span>
                            </button>
                        </div>
                    </div>

                    <div class="chat-window-footer">
                        <small id="msg-counter">15 Nachrichten übrig</small>
                        <small class="chat-window-trust">DSGVO-konform · keine Tracker</small>
                    </div>
                </div>
            </div>
        </section>

        <!-- =================== BENEFITS / SPECS =================== -->
        <section id="benefits" class="section-specs">
            <div class="container">
                <header class="section-head">
                    <span class="kicker">Was drin ist</span>
                    <h2>Specs, in Kurzform.</h2>
                </header>

                <dl class="specs-list">
                    <div class="spec">
                        <dt><span class="spec-num">01</span>Datenschutz &amp; Sicherheit</dt>
                        <dd>Lokal entwickelt, keine Datenweitergabe, sauber in deine IT integriert. Hosting in der Schweiz möglich.</dd>
                    </div>
                    <div class="spec">
                        <dt><span class="spec-num">02</span>Customizing</dt>
                        <dd>Volle Anpassung an dein Corporate Design – Farbe, Schrift, Avatar, Tonalität. Ich kann auch mit deiner Stimme sprechen.</dd>
                    </div>
                    <div class="spec">
                        <dt><span class="spec-num">03</span>Aktualität</dt>
                        <dd>Einfache Maintenance, automatisches Re-Training bei Quell-Updates. Ich lerne dazu, ohne dass jemand Code anpassen muss.</dd>
                    </div>
                    <div class="spec">
                        <dt><span class="spec-num">04</span>Zugriffsschutz</dt>
                        <dd>Optional passwortgeschützt für interne Bereiche. Rollen-basiert, SSO-fähig.</dd>
                    </div>
                </dl>
            </div>
        </section>

        <!-- =================== PRICING =================== -->
        <section id="pricing" class="section-pricing">
            <div class="container">
                <header class="section-head section-head-light">
                    <span class="kicker kicker-light">Pakete</span>
                    <h2>Verschiedene Pakete.<br>Eins passt zu dir.</h2>
                    <p>Alle Preise pro Jahr. Wartung und Token-Kosten transparent ausgewiesen.</p>
                </header>

                <div class="pricing-grid">
                    <article class="price-card">
                        <header>
                            <span class="price-size">S</span>
                            <h3>Small</h3>
                            <p>Für einen klaren Use-Case, eine Quelle, ein Look.</p>
                        </header>
                        <div class="price-amount">
                            <span class="price-currency">CHF</span>
                            <span class="price-number">2'900</span>
                            <span class="price-period">/ einmalige Set-Up Kosten</span>
                        </div>
                        <dl class="price-running">
                            <div><dt>Wartung</dt><dd>CHF 175 / Jahr</dd></div>
                            <div><dt>Tokens</dt><dd>≈ CHF 15 / Monat</dd></div>
                        </dl>
                        <ul class="price-features">
                            <li>Basis-Integration</li>
                            <li>Standard-Design</li>
                            <li>Email-Support</li>
                        </ul>
                        <a href="mailto:info@compresso.ch?subject=Anfrage%20Compresso%20Bot%20%E2%80%93%20Small" class="btn btn-outline btn-block">Small anfragen</a>
                    </article>

                    <article class="price-card price-card-featured">
                        <span class="price-badge">Beliebt</span>
                        <header>
                            <span class="price-size">M</span>
                            <h3>Medium</h3>
                            <p>Mehrere Quellen, dein Branding, Prio-Support – der Sweet&nbsp;Spot.</p>
                        </header>
                        <div class="price-amount">
                            <span class="price-currency">CHF</span>
                            <span class="price-number">5'900</span>
                            <span class="price-period">/ einmalige Set-Up Kosten</span>
                        </div>
                        <dl class="price-running">
                            <div><dt>Wartung</dt><dd>CHF 510 / Jahr</dd></div>
                            <div><dt>Tokens</dt><dd>≈ CHF 80 / Monat</dd></div>
                        </dl>
                        <ul class="price-features">
                            <li>Erweiterte Quellen (CMS, PDF, API)</li>
                            <li>Custom Styling &amp; Avatar</li>
                            <li>Prio-Support</li>
                            <li>Analytics-Dashboard</li>
                        </ul>
                        <a href="mailto:info@compresso.ch?subject=Anfrage%20Compresso%20Bot%20%E2%80%93%20Medium" class="btn btn-primary btn-block">Medium anfragen</a>
                    </article>

                    <article class="price-card">
                        <header>
                            <span class="price-size">L</span>
                            <h3>Large</h3>
                            <p>Tiefe Integration, mehrere Sprachen, SLA – Enterprise-tauglich.</p>
                        </header>
                        <div class="price-amount">
                            <span class="price-currency">CHF</span>
                            <span class="price-number">11'900</span>
                            <span class="price-period">/ einmalige Set-Up Kosten</span>
                        </div>
                        <dl class="price-running">
                            <div><dt>Wartung</dt><dd>CHF 1'000 / Jahr</dd></div>
                            <div><dt>Tokens</dt><dd>≈ CHF 400 / Monat</dd></div>
                        </dl>
                        <ul class="price-features">
                            <li>Volle Enterprise-Integration</li>
                            <li>Deep CRM &amp; ERP Connect</li>
                            <li>24/7 SLA optional</li>
                            <li>Mehrsprachig</li>
                        </ul>
                        <a href="mailto:info@compresso.ch?subject=Anfrage%20Compresso%20Bot%20%E2%80%93%20Large" class="btn btn-outline btn-block">Large anfragen</a>
                    </article>
                </div>

                <p class="pricing-note">Setup und Token-Verbrauch sind Richtwerte und hängen vom Volumen ab. Wir rechnen das im Gespräch konkret.</p>
            </div>
        </section>

        <!-- =================== CONTACT =================== -->
        <section id="contact" class="section-contact">
            <div class="container contact-grid">
                <header class="contact-head">
                    <span class="kicker">Sag hallo</span>
                    <h2>Lass uns reden.</h2>
                    <p>Wir helfen dir, mit einem Chatbot deine Ziele zu erreichen, und entscheiden gemeinsam, was zu dir passt.</p>
                    <ul class="contact-meta">
                        <li><strong>Sitz</strong> Seestrasse 49, 8702&nbsp;Zollikon</li>
                        <li><strong>Telefon</strong> +41 43 488 86 00</li>
                        <li><strong>Antwort</strong> innerhalb eines Werktags</li>
                    </ul>
                </header>

                <div class="contact-persons">
                    <article class="person">
                        <img src="assets/samuel.jpg" alt="Samuel Rüegger" class="person-photo">
                        <div class="person-body">
                            <h3>Samuel Rüegger</h3>
                            <p>Technik &amp; Entwicklung</p>
                            <a href="mailto:samuel.ruegger@compresso.ch" class="btn btn-outline">Mail an Samuel</a>
                        </div>
                    </article>
                    <article class="person">
                        <img src="assets/andi.jpg" alt="Andi Eggli" class="person-photo">
                        <div class="person-body">
                            <h3>Andi Eggli</h3>
                            <p>Projektleitung &amp; Strategie</p>
                            <a href="mailto:andi.eggli@compresso.ch" class="btn btn-outline">Mail an Andi</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container footer-grid">
            <div class="footer-brand">
                <span class="footer-wordmark">TaKo</span>
                <p>Compresso AG · Seestrasse 49, 8702&nbsp;Zollikon · +41 43 488 86 00</p>
            </div>
            <nav class="footer-nav" aria-label="Footer-Navigation">
                <a href="https://compresso.ch/impressum/" target="_blank" rel="noopener">Impressum</a>
                <a href="https://compresso.ch/datenschutzerklaerung/" target="_blank" rel="noopener">Datenschutz</a>
            </nav>
            <small class="footer-mono">© 2026 · Made in Switzerland</small>
        </div>
    </footer>

    <script src="js/app.js?v=<?= filemtime(__DIR__ . '/js/app.js') ?>"></script>
</body>
</html>
