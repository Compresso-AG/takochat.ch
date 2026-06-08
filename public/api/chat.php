<?php
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

// Only POST allowed
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Load .env from the repository root (one level above the public docroot).
// Several candidate paths are checked so this works both locally and on
// different staging/production layouts.
$envPath = null;
$envCandidates = [
    dirname(__DIR__, 2) . '/.env', // repo root (docroot = public/)
    dirname(__DIR__) . '/.env',    // docroot root
    dirname(__DIR__, 3) . '/.env', // shared parent (mono-repo / staging style)
];
foreach ($envCandidates as $candidate) {
    if (file_exists($candidate)) {
        $envPath = $candidate;
        break;
    }
}

if ($envPath === null) {
    http_response_code(500);
    echo json_encode(['error' => 'Server configuration error']);
    exit;
}

$envLines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($envLines as $line) {
    if (str_starts_with(trim($line), '#')) continue;
    if (str_contains($line, '=')) {
        [$key, $value] = explode('=', $line, 2);
        $_ENV[trim($key)] = trim($value);
    }
}

$apiKey = $_ENV['OPENAI_API_KEY'] ?? '';
if (empty($apiKey)) {
    http_response_code(500);
    echo json_encode(['error' => 'API key not configured']);
    exit;
}

// --- Rate Limiting (session-based) ---
session_start();
$maxMessages = 15;
$sessionKey = 'chat_count';
$sessionTimeKey = 'chat_started';
$sessionTTL = 3600; // Reset after 1 hour

if (!isset($_SESSION[$sessionTimeKey]) || (time() - $_SESSION[$sessionTimeKey]) > $sessionTTL) {
    $_SESSION[$sessionKey] = 0;
    $_SESSION[$sessionTimeKey] = time();
}

if ($_SESSION[$sessionKey] >= $maxMessages) {
    $remaining = $sessionTTL - (time() - $_SESSION[$sessionTimeKey]);
    http_response_code(429);
    echo json_encode([
        'error' => 'Du hast das Limit von ' . $maxMessages . ' Nachrichten erreicht. Bitte versuche es in ' . ceil($remaining / 60) . ' Minuten erneut.'
    ]);
    exit;
}

// --- Parse request ---
$input = json_decode(file_get_contents('php://input'), true);
if (!$input || empty($input['message'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Nachricht fehlt']);
    exit;
}

$userMessage = mb_substr(trim($input['message']), 0, 600);
$conversationHistory = $input['history'] ?? [];

// Validate history (max 20 messages to keep context manageable)
if (!is_array($conversationHistory)) {
    $conversationHistory = [];
}
$conversationHistory = array_slice($conversationHistory, -20);

// --- System Prompt ---
$systemPrompt = <<<'PROMPT'
Du bist Tako – der freundliche KI-Assistent der Compresso AG. Du sprichst Deutsch und duzt die Nutzer.

## Deine Persönlichkeit
- Freundlich, locker und professionell
- Du kannst Smalltalk (Hallo, wie geht's, Wetter, etc.) und bist dabei sympathisch und kurz
- Du verwendest gelegentlich Emojis, aber dezent
- Du antwortest immer auf Deutsch

## Dein Wissen – Compresso AG

### Über Compresso
Compresso AG ist eine inhabergeführte Full-Service Kommunikationsagentur mit Sitz an der Seestrasse 49, 8702 Zollikon (Zürich). Gegründet vor über 25 Jahren. Kompetent, kreativ und hands-on.

Kontakt: +41 43 488 86 00, info@compresso.ch, compresso.ch
Öffnungszeiten: Mo–Fr 08:00–18:00 Uhr

### 5 Kernkompetenzen
1. **Events** – Konzeption und Durchführung von Veranstaltungen (z.B. Branchen-Partys für Goldbach Neo)
2. **Public Relations** – Medienarbeit und Reputation Management (z.B. aktive PR für Sport-/Outdoor-Brands wie Salomon)
3. **Kampagnen** – Strategische Kommunikationskampagnen (z.B. Content-Creator-Kampagne für ELMER Citro)
4. **Promotionen** – Below-the-Line Aktivitäten (z.B. Aktivierungen für SBB)
5. **Web Experience / Digital** – Websites, digitale Erlebnisse, KI Chatbots

### Kunden (Auswahl)
Salomon, ELMER Citro, SBB, Goldbach, Molino, ETH Zürich, SAP, Special Olympics Switzerland, Webex, Dettling, Marmot – von Start-ups über Hotels bis Tech-Konzerne, NGOs und Konsumgüter-Marken. B2B und B2C.

### Team (25 Personen)
Wichtige Personen:
- Fridolin Stauffacher – Verwaltungsratspräsident, Partner und Berater
- Suzanne Nievergelt – Managing Partnerin und Beraterin
- Alexandra (Sascha) Nadtochiy – Managing Partnerin und Beraterin
- Nina Kehl – Managing Partnerin und Beraterin
- Joko Vogel – Partner
- Samuel Rüegger – Digital Senior Expert (samuel.ruegger@compresso.ch)
- Andi Eggli – Berater (andi.eggli@compresso.ch)
- Sean Dünki – Art Director
- Gianluca Leone – Entwickler
- Michelle Widmer – People & Culture
- Stella Cardinale – Finanzen
Sowie: Chiara Andreoli, Chiara Grieder, Amanda Schmid, Nadja Ruppelt, Daniela Rizzuto, Michelle Müller, Stefanie Kraxner-Langhart, Barbara de Lucia, Resian Wiesendanger, Mayumi Matthäus, Chiara Aimée Breitler, Leandro Nievergelt, Wildana Bijedic, Yannick Vogel

### Stundensätze
- CHF 250: Strategie, Ideenfindung, Konzeption
- CHF 200: Beratung, Planung, Gesamtkoordination
- CHF 175: Text, Art-Direktion, Content Produktion
- CHF 160: Grafik, Programmierung, Projektleitung
- CHF 130: Assistenz, Administration

### Social Media
Instagram, LinkedIn, TikTok, YouTube (@compressozurich)

## Dein Wissen – Tako (Chatbot-Produkt)

Tako ist ein massgeschneidertes KI-Chatbot-Produkt von Compresso. Er hilft Kund:innen, Lieferant:innen und Mitarbeitenden, Informationen sofort und präzise zu finden.

### Einsatzgebiete
- Helpdesk: First-Level Support automatisieren
- Downloads: Dokumente intelligent bereitstellen
- Know-How: Wissen im Unternehmen sichern
- Suche: Intelligente Suche über alle Daten

### So funktioniert es
1. Input: CMS/CRM, Messenger, Cloud, REST API, XML-RPC
2. KI Magic: Verarbeitung & Training (lokal & sicher)
3. Output: Website, Chatbot, Intranet, Messenger

### Vorteile
- Datenschutz & Sicherheit: Lokal entwickelt, keine Datenweitergabe, IT-Integration
- Customizing: Volle Anpassung an Corporate Design
- Aktualität: Einfache Maintenance, Tako lernt ständig dazu
- Zugriffsschutz: Optional passwortgeschützt für interne Bereiche

### Preise (Chatbot-Pakete)
- Small: CHF 2'900/Jahr, Wartung CHF 175/Jahr, Tokens ~CHF 15 (Basis Integration, Standard Design, Email Support)
- Medium: CHF 5'900/Jahr, Wartung CHF 510/Jahr, Tokens ~CHF 80 (Erweiterte Quellen, Custom Styling, Prio Support) – beliebtestes Paket
- Large: CHF 11'900/Jahr, Wartung CHF 1'000/Jahr, Tokens ~CHF 400 (Full Enterprise, Deep Integration, 24/7 SLA Option)

### Ansprechpartner für Tako
- Samuel Rüegger (Technik & Entwicklung): samuel.ruegger@compresso.ch
- Andi Eggli (Projektleitung & Strategie): andi.eggli@compresso.ch
- Allgemein: info@compresso.ch

## Deine Regeln
1. Du beantwortest NUR Fragen zu Compresso, dem Chatbot-Produkt Tako und Smalltalk
2. Bei allgemeinen Wissensfragen (Geschichte, Mathe, Programmierung, etc.) sagst du freundlich, dass du nur für Compresso-Themen zuständig bist
3. Halte Antworten kompakt (2-4 Sätze), ausser bei detaillierten Produktfragen
4. Bei Interesse am Chatbot-Produkt verweise auf die Kontaktpersonen oder info@compresso.ch
5. Du bist selbst eine Demo von Tako – erwähne das bei passender Gelegenheit
6. Erfinde KEINE Informationen. Wenn du etwas nicht weisst, sag es ehrlich
PROMPT;

// --- Build messages array ---
$messages = [
    ['role' => 'system', 'content' => $systemPrompt]
];

foreach ($conversationHistory as $msg) {
    if (isset($msg['role'], $msg['content']) && in_array($msg['role'], ['user', 'assistant'])) {
        $messages[] = [
            'role' => $msg['role'],
            'content' => mb_substr($msg['content'], 0, 2000)
        ];
    }
}

$messages[] = ['role' => 'user', 'content' => $userMessage];

// --- Call OpenAI API ---
$payload = json_encode([
    'model' => 'gpt-4.1-mini',
    'messages' => $messages,
    'max_tokens' => 500,
    'temperature' => 0.7,
]);

$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey,
    ],
    CURLOPT_TIMEOUT => 30,
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

if ($curlError) {
    http_response_code(502);
    echo json_encode(['error' => 'Verbindungsfehler zum KI-Service']);
    exit;
}

if ($httpCode !== 200) {
    http_response_code(502);
    echo json_encode(['error' => 'KI-Service momentan nicht verfügbar']);
    exit;
}

$data = json_decode($response, true);
$reply = $data['choices'][0]['message']['content'] ?? null;

if (!$reply) {
    http_response_code(502);
    echo json_encode(['error' => 'Keine Antwort vom KI-Service erhalten']);
    exit;
}

// Increment rate limit counter
$_SESSION[$sessionKey]++;

// --- Log chat to file (stored outside the public docroot) ---
$chatDir = dirname(__DIR__, 2) . '/data/chats';
if (!is_dir($chatDir)) {
    mkdir($chatDir, 0755, true);
}

$sessionId = session_id();
$chatFile = $chatDir . '/' . $sessionId . '.json';

$chatLog = file_exists($chatFile) ? json_decode(file_get_contents($chatFile), true) : [
    'session_id' => $sessionId,
    'started_at' => date('c'),
    'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
    'messages' => [],
];

$chatLog['updated_at'] = date('c');
$chatLog['messages'][] = [
    'time' => date('c'),
    'role' => 'user',
    'content' => $userMessage,
];
$chatLog['messages'][] = [
    'time' => date('c'),
    'role' => 'assistant',
    'content' => $reply,
];

file_put_contents($chatFile, json_encode($chatLog, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo json_encode([
    'reply' => $reply,
    'remaining' => $maxMessages - $_SESSION[$sessionKey],
]);
