#!/usr/bin/env bash
#
# Tako – Deploy-Skript
# Lädt den Inhalt von public/ per rsync auf den Produktionsserver.
#
# Die .env (Secrets) und data/ (Chat-Logs) liegen auf dem Server ausserhalb
# von public/ und werden NICHT angefasst.
#
# Aufruf:
#   ./deploy.sh            # deployt
#   ./deploy.sh --dry-run  # zeigt nur, was übertragen würde

set -euo pipefail

SSH_HOST="bifisawo@takochat.ch"
REMOTE_DIR="~/www/takochat.ch/public/"
LOCAL_DIR="public/"

# Vom Skript-Verzeichnis aus arbeiten, damit der Aufruf von überall klappt.
cd "$(dirname "$0")"

if [[ ! -d "$LOCAL_DIR" ]]; then
    echo "Fehler: $LOCAL_DIR nicht gefunden (im Repo-Root ausführen)." >&2
    exit 1
fi

RSYNC_OPTS=(-avz --delete --exclude='data/')
if [[ "${1:-}" == "--dry-run" ]]; then
    RSYNC_OPTS+=(--dry-run)
    echo "== DRY RUN – es wird nichts übertragen =="
fi

echo "Deploy: $LOCAL_DIR -> $SSH_HOST:$REMOTE_DIR"
rsync "${RSYNC_OPTS[@]}" "$LOCAL_DIR" "$SSH_HOST:$REMOTE_DIR"

echo "Fertig. -> https://takochat.ch/"
