# Tako – takochat.ch

## Projekt
- Standalone-Repository für die Landing Page von **Tako**, dem KI-Chatbot der Compresso AG.
- Ursprünglich aus dem Mono-Repo `compresso-products-landingpages` (`products/chatbot/`) extrahiert und auf die Marke "Tako" umbenannt.
- OnePage-Landingpage mit interaktiver Chat-Demo (OpenAI), Rate-Limiting und Admin-Panel.

## Struktur
- `public/` ist der Webroot (DDEV `docroot: public`).
- `.env` (mit `OPENAI_API_KEY`) und `data/` (Chat-Logs) liegen **ausserhalb** von `public/` und sind via `.gitignore` ausgeschlossen.
- `public/api/chat.php` lädt die `.env` aus dem Repo-Root (`dirname(__DIR__, 2)`), mit Fallback-Pfaden für andere Deployment-Layouts.

## Tonalität & Ansprache
- Alle Texte durchgehend per **"Du"** (nicht "Sie", nicht "euch/ihr").
- Beispiele: "dein Unternehmen", "deine Vorteile", "stell deine Frage".
- Lockerer, persönlicher Ton.
- Der Chatbot heisst **Tako**; das Unternehmen dahinter bleibt **Compresso AG**.

## Design-Konventionen
- Look & Feel im compresso.ch-Stil.
- Font: DM Sans (Google Fonts).
- Farbschema: Schwarz/Weiss mit Brand Gradient.
- Brand Gradient: `linear-gradient(90deg, rgb(123, 195, 215) 0%, rgb(160, 235, 202) 53%, rgb(203, 246, 172) 100%)`.
- CSS Custom Properties für konsistente Werte.
- Responsive: Mobile-First, Breakpoint bei 768px.

## Tech Stack
- PHP 8.3 (kein Framework, statische Seite).
- DDEV mit nginx-fpm (lokal, Domain `takochat.ddev.site`).
- Vanilla CSS & JS (keine Build-Tools).
- OpenAI Chat Completions API (`gpt-4.1-mini`).
- Sprache: Deutsch (de).

## Kontaktpersonen
- **Samuel Rüegger** – Technik & Entwicklung (`samuel.ruegger@compresso.ch`)
- **Andi Eggli** – Projektleitung & Strategie (`andi.eggli@compresso.ch`)

## Wichtige Dateien
- `public/index.php` – HTML-Struktur der Landing Page
- `public/api/chat.php` – Chat-Endpoint inkl. System-Prompt & Logging
- `public/admin/index.php` – passwortgeschütztes Chat-Dashboard
- `.env.example` – Vorlage für `.env`
- `.ddev/config.yaml` – lokale DDEV-Konfiguration
