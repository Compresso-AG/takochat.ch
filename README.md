# Tako – takochat.ch

Landing Page für **Tako**, den massgeschneiderten KI-Chatbot der [Compresso AG](https://compresso.ch).

Eine OnePage-Landingpage mit interaktiver Chat-Demo (OpenAI), Rate-Limiting und einem
einfachen Admin-Panel zur Einsicht der geführten Chats.

## Projektstruktur

```
/
├── public/                  # Webroot (DDEV docroot)
│   ├── index.php            # Landing Page (HTML-Struktur)
│   ├── api/
│   │   └── chat.php         # Chat-Endpoint (OpenAI), Rate-Limiting, Logging
│   ├── admin/
│   │   └── index.php        # Passwortgeschütztes Chat-Dashboard
│   ├── css/styles.css       # Styles (CSS Custom Properties)
│   ├── js/app.js            # Chat-Logik & Mobile Navigation
│   └── assets/              # Logo, Favicon, Bilder, Icons
├── data/chats/              # Chat-Logs (Runtime, .gitignore – ausserhalb Webroot)
├── .env                     # OPENAI_API_KEY (.gitignore – ausserhalb Webroot)
├── .env.example             # Vorlage für .env
└── .ddev/                   # Lokale DDEV-Konfiguration
```

> **Sicherheit:** `.env` und `data/` liegen bewusst **ausserhalb** von `public/`,
> sind also nie direkt über den Webserver erreichbar.

## Lokale Entwicklung (DDEV)

**Voraussetzung:** [DDEV](https://ddev.readthedocs.io/en/stable/) und Docker.

```bash
cp .env.example .env        # und OPENAI_API_KEY eintragen
ddev start
ddev launch                 # öffnet https://takochat.ddev.site
```

## Konfiguration

| Variable         | Beschreibung                                  |
|------------------|-----------------------------------------------|
| `OPENAI_API_KEY` | API Key für die Chat-Demo (`public/api/chat.php`) |

Die `.env` wird automatisch aus dem Repo-Root geladen (siehe `public/api/chat.php`).

## Admin-Panel

Erreichbar unter `/admin/`. Das Passwort ist aktuell in `public/admin/index.php`
hinterlegt und sollte vor dem Produktiv-Einsatz angepasst werden.

## Tech Stack

- PHP 8.3 (kein Framework, statische Seite)
- Vanilla CSS & JS (keine Build-Tools)
- OpenAI Chat Completions API (`gpt-4.1-mini`)
- DDEV mit nginx-fpm (lokal)

## Design-System

- **Typografie:** DM Sans (Google Fonts)
- **Farben:** Schwarz/Weiss mit Brand Gradient
- **Brand Gradient:** `linear-gradient(90deg, rgb(123, 195, 215) 0%, rgb(160, 235, 202) 53%, rgb(203, 246, 172) 100%)`

## Ansprechpartner

- **Samuel Rüegger** – Technik & Entwicklung (`samuel.ruegger@compresso.ch`)
- **Andi Eggli** – Projektleitung & Strategie (`andi.eggli@compresso.ch`)
