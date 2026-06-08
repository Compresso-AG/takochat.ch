<!DOCTYPE html>
<html lang="de" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tako - Massgeschneiderte KI Chatbots</title>
    <meta name="description" content="Tako, der KI Chatbot von Compresso, verarbeitet Datenbanken, Dokumente und Websites zu intelligenten Antworten für Kunden und Mitarbeiter.">

    <!-- Open Graph / Social -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Tako - Massgeschneiderte KI Chatbots">
    <meta property="og:description" content="Tako, der KI Chatbot von Compresso, verarbeitet Datenbanken, Dokumente und Websites zu intelligenten Antworten für Kunden und Mitarbeiter.">
    <meta property="og:image" content="assets/logo.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Tako - Massgeschneiderte KI Chatbots">
    <meta name="twitter:description" content="Tako, der KI Chatbot von Compresso, verarbeitet Datenbanken, Dokumente und Websites zu intelligenten Antworten für Kunden und Mitarbeiter.">

    <link rel="icon" type="image/png" href="assets/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css?v=<?= filemtime(__DIR__ . '/css/styles.css') ?>">
</head>
<body>

    <!-- Navigation -->
    <header id="header">
        <div class="container">
            <a href="#" class="logo-link">
                <img src="assets/logo.png" alt="Compresso AG" class="logo-img">
            </a>
            <button class="mobile-menu-toggle" aria-label="Menu öffnen">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <nav id="main-nav">
                <ul>
                    <li><a href="#challenges">Warum?</a></li>
                    <li><a href="#solution">Lösung</a></li>
                    <li><a href="#demo">Demo</a></li>
                    <li><a href="#pricing">Preise</a></li>
                    <li><a href="#contact" class="btn btn-small">Kontakt</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <!-- 1) Hero -->
        <section id="hero" class="section-hero">
            <div class="container">
                <h1>Meet Tako</h1>
                <p class="subline">Massgeschneiderte KI Chatbots für dein Unternehmen</p>
                <div class="actions">
                    <a href="#demo" class="btn btn-primary">Demo testen</a>
                    <a href="#contact" class="btn btn-secondary">Kontakt aufnehmen</a>
                </div>
            </div>
        </section>

        <!-- 2) Herausforderungen -->
        <section id="challenges" class="section-light">
            <div class="container">
                <h2>Herausforderungen heute</h2>
                <div class="grid-3">
                    <div class="card">
                        <h3>Sinkende Aufmerksamkeit</h3>
                        <p>Kunden erwarten sofortige Antworten. Die Geduld für langes Suchen sinkt drastisch.</p>
                    </div>
                    <div class="card">
                        <h3>Verändertes Suchverhalten</h3>
                        <p>Klassische Navigation reicht nicht mehr. Nutzer wollen direkt zum Ziel gefragt werden.</p>
                    </div>
                    <div class="card">
                        <h3>Heterogene Tools</h3>
                        <p>Informationen sind verstreut: Intranet, Handbücher, Server – oft schwer auffindbar.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3) Lösung -->
        <section id="solution" class="section-dark">
            <div class="container">
                <h2>Unsere Antwort: KI Chatbot</h2>
                <p class="lead">Schluss mit komplexen Intranets und endlosen PDF-Downloads.</p>
                <div class="content-block">
                    <p>Tako hilft Kund:innen, Lieferant:innen und Mitarbeitenden, genau die Information zu finden, die du brauchst. Sofort, präzise und rund um die Uhr.</p>
                </div>
            </div>
        </section>

        <!-- 4) Use Cases -->
        <section id="usecases" class="section-light">
            <div class="container">
                <h2>Einsatzgebiete</h2>
                <div class="grid-4">
                    <div class="card-icon">
                        <h3>Helpdesk</h3>
                        <p>First-Level Support automatisieren.</p>
                    </div>
                    <div class="card-icon">
                        <h3>Downloads</h3>
                        <p>Dokumente intelligent bereitstellen.</p>
                    </div>
                    <div class="card-icon">
                        <h3>Know-How</h3>
                        <p>Wissen im Unternehmen sichern.</p>
                    </div>
                    <div class="card-icon">
                        <h3>Suche</h3>
                        <p>Intelligente Suche über alle Daten.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5) So funktioniert es -->
        <section id="howitworks" class="section-dark">
            <div class="container">
                <h2>So funktioniert es</h2>
                <div class="workflow-steps">
                    <div class="step">
                        <span class="step-number">1</span>
                        <h3>Input</h3>
                        <p>CMS/CRM, Messenger, Cloud, REST API, XML-RPC</p>
                    </div>
                    <div class="step-arrow">&rarr;</div>
                    <div class="step">
                        <span class="step-number">2</span>
                        <h3>KI Magic</h3>
                        <p>Verarbeitung & Training (Lokal & Sicher)</p>
                    </div>
                    <div class="step-arrow">&rarr;</div>
                    <div class="step">
                        <span class="step-number">3</span>
                        <h3>Output</h3>
                        <p>Website, Chatbot, Intranet, Messenger</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6) Vorteile -->
        <section id="benefits" class="section-light">
            <div class="container">
                <h2>Deine Vorteile</h2>
                <ul class="benefits-list">
                    <li><strong>Datenschutz & Sicherheit:</strong> Lokal entwickelt, keine Datenweitergabe, IT-Integration.</li>
                    <li><strong>Customizing:</strong> Volle Anpassung an dein Corporate Design (CI/CD).</li>
                    <li><strong>Aktualität:</strong> Einfache Maintenance, Tako lernt ständig dazu.</li>
                    <li><strong>Zugriffsschutz:</strong> Optional passwortgeschützt für interne Bereiche.</li>
                </ul>
            </div>
        </section>

        <!-- 7) Chat Testen -->
        <section id="demo" class="section-demo">
            <div class="container">
                <h2>Tako testen</h2>
                <p class="intro">Stell deine Frage – Tako kennt sich mit Compresso aus.</p>

                <div class="chat-interface" role="log" aria-live="polite">
                    <div id="chat-history" class="chat-history">
                        <div class="msg bot">
                            <div class="bubble">Hallo! Ich bin Tako. Frag mich alles rund um Compresso und unsere Chatbot-Lösung. Wie kann ich dir helfen?</div>
                        </div>
                    </div>
                    <div class="chat-input-area">
                        <input type="text" id="chat-input" placeholder="Frage eingeben (max. 600 Zeichen)..." aria-label="Chat Eingabe" maxlength="600">
                        <button id="chat-send" type="button">Senden</button>
                    </div>
                </div>

                <div class="example-questions">
                    <button class="example-question" data-question="Was macht Compresso?">Was macht Compresso?</button>
                    <button class="example-question" data-question="Welche Chatbot-Pakete gibt es?">Welche Chatbot-Pakete gibt es?</button>
                    <button class="example-question" data-question="Wie funktioniert der Bot technisch?">Wie funktioniert Tako?</button>
                    <button class="example-question" data-question="Wer steckt hinter Compresso?">Wer steckt hinter Compresso?</button>
                </div>
                <div class="chat-meta">
                    <small id="msg-counter">15 Nachrichten übrig</small>
                </div>
            </div>
        </section>

        <!-- 8) Pakete / Preise -->
        <section id="pricing" class="section-light">
            <div class="container">
                <h2>Pakete & Preise</h2>
                <div class="pricing-grid">
                    <!-- S -->
                    <div class="price-card">
                        <h3>Small</h3>
                        <div class="price">CHF 2'900</div>
                        <div class="sub-price">pro Jahr</div>
                        <hr>
                        <div class="maintenance">Wartung: CHF 175 / Jahr</div>
                        <div class="tokens">Tokens: ~ CHF 15</div>
                        <ul class="features">
                            <li>Basis Integration</li>
                            <li>Standard Design</li>
                            <li>Email Support</li>
                        </ul>
                        <a href="mailto:info@compresso.ch?subject=Anfrage%20Tako%20–%20Small" class="btn btn-secondary">Jetzt anfragen</a>
                    </div>
                    <!-- M -->
                    <div class="price-card popular">
                        <div class="badge">Beliebt</div>
                        <h3>Medium</h3>
                        <div class="price">CHF 5'900</div>
                        <div class="sub-price">pro Jahr</div>
                        <hr>
                        <div class="maintenance">Wartung: CHF 510 / Jahr</div>
                        <div class="tokens">Tokens: ~ CHF 80</div>
                        <ul class="features">
                            <li>Erweiterte Quellen</li>
                            <li>Custom Styling</li>
                            <li>Prio Support</li>
                        </ul>
                        <a href="mailto:info@compresso.ch?subject=Anfrage%20Tako%20–%20Medium" class="btn btn-primary">Jetzt anfragen</a>
                    </div>
                    <!-- L -->
                    <div class="price-card">
                        <h3>Large</h3>
                        <div class="price">CHF 11'900</div>
                        <div class="sub-price">pro Jahr</div>
                        <hr>
                        <div class="maintenance">Wartung: CHF 1'000 / Jahr</div>
                        <div class="tokens">Tokens: ~ CHF 400</div>
                        <ul class="features">
                            <li>Full Enterprise</li>
                            <li>Deep Integration</li>
                            <li>24/7 SLA Option</li>
                        </ul>
                        <a href="mailto:info@compresso.ch?subject=Anfrage%20Tako%20–%20Large" class="btn btn-secondary">Jetzt anfragen</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 9) CTA / Kontakt -->
        <section id="contact" class="section-dark contact-final">
            <div class="container">
                <h2>Bereit loszulegen?</h2>
                <p class="claim">Wir helfen dir dabei, mit KI Chatbot deine Ziele zu erreichen und deine Marke zu stärken!</p>

                <div class="contact-persons">
                    <div class="person">
                        <img src="assets/samuel.jpg" alt="Samuel" class="person-photo">
                        <h3>Samuel kontaktieren</h3>
                        <p>Technik & Entwicklung</p>
                        <a href="mailto:samuel.ruegger@compresso.ch" class="btn btn-primary">Mail an Samuel</a>
                    </div>
                    <div class="person">
                        <img src="assets/andi.jpg" alt="Andi" class="person-photo">
                        <h3>Andi fragen</h3>
                        <p>Projektleitung & Strategie</p>
                        <a href="mailto:andi.eggli@compresso.ch" class="btn btn-primary">Mail an Andi</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2026 Compresso AG. <a href="https://compresso.ch/impressum/" target="_blank">Impressum</a> | <a href="https://compresso.ch/datenschutzerklaerung/" target="_blank">Datenschutz</a></p>
            <p>Seestrasse 49, 8702 Zollikon | +41 43 488 86 00</p>
        </div>
    </footer>

    <script src="js/app.js?v=<?= filemtime(__DIR__ . '/js/app.js') ?>"></script>
</body>
</html>
