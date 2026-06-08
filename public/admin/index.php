<?php
session_start();

// --- Load admin password from .env (repo root, outside the public docroot) ---
$password = '';
$envCandidates = [
    dirname(__DIR__, 2) . '/.env', // repo root (docroot = public/)
    dirname(__DIR__) . '/.env',    // docroot root
    dirname(__DIR__, 3) . '/.env', // shared parent (mono-repo / staging style)
];
foreach ($envCandidates as $candidate) {
    if (file_exists($candidate)) {
        foreach (file($candidate, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
            if (str_starts_with(trim($line), '#')) continue;
            if (str_contains($line, '=')) {
                [$key, $value] = explode('=', $line, 2);
                $_ENV[trim($key)] = trim($value);
            }
        }
        break;
    }
}
$password = $_ENV['ADMIN_PASSWORD'] ?? '';

if (isset($_POST['logout'])) {
    unset($_SESSION['admin_auth']);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_POST['password'])) {
    // Constant-time compare; an unset/empty ADMIN_PASSWORD never grants access.
    if ($password !== '' && hash_equals($password, (string) $_POST['password'])) {
        $_SESSION['admin_auth'] = true;
    } else {
        $loginError = true;
    }
}

if (empty($_SESSION['admin_auth'])) {
    ?>
    <!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { font-family: 'DM Sans', system-ui, sans-serif; background: #000; color: #fff; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
            .login { text-align: center; max-width: 350px; padding: 2rem; }
            h1 { font-size: 1.5rem; margin-bottom: 1.5rem; }
            input[type="password"] { width: 100%; padding: 12px; border: 1px solid #333; border-radius: 8px; background: #111; color: #fff; font-size: 1rem; margin-bottom: 1rem; }
            input[type="password"]:focus { outline: none; border-color: #7bc3d7; }
            button { width: 100%; padding: 12px; background: #fff; color: #000; border: none; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer; }
            button:hover { background: #e0e0e0; }
            .error { color: #e74c3c; margin-bottom: 1rem; font-size: 0.9rem; }
        </style>
    </head>
    <body>
        <div class="login">
            <h1>TaKo Admin</h1>
            <?php if (!empty($loginError)): ?>
                <p class="error">Falsches Passwort</p>
            <?php endif; ?>
            <form method="POST">
                <input type="password" name="password" placeholder="Passwort" autofocus>
                <button type="submit">Login</button>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// --- Load chat logs (stored outside the public docroot) ---
$chatDir = dirname(__DIR__, 2) . '/data/chats';
$chats = [];
$totalMessages = 0;
$totalSessions = 0;
$todaySessions = 0;
$today = date('Y-m-d');

if (is_dir($chatDir)) {
    $files = glob($chatDir . '/*.json');
    foreach ($files as $file) {
        $data = json_decode(file_get_contents($file), true);
        if ($data) {
            $chats[] = $data;
            $totalSessions++;
            $msgCount = count($data['messages'] ?? []);
            $totalMessages += $msgCount;
            if (isset($data['started_at']) && str_starts_with($data['started_at'], $today)) {
                $todaySessions++;
            }
        }
    }
    // Sort by most recent first
    usort($chats, fn($a, $b) => strcmp($b['updated_at'] ?? '', $a['updated_at'] ?? ''));
}

$avgMessages = $totalSessions > 0 ? round($totalMessages / $totalSessions, 1) : 0;

// Selected chat detail
$selectedIdx = isset($_GET['chat']) ? (int)$_GET['chat'] : -1;
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaKo Admin</title>
    <link rel="icon" type="image/png" href="../assets/favicon.png">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'DM Sans', system-ui, sans-serif; background: #0a0a0a; color: #e0e0e0; min-height: 100vh; }

        /* Header */
        .admin-header { background: #111; border-bottom: 1px solid #222; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        .admin-header h1 { font-size: 1.2rem; }
        .admin-header form button { background: none; border: 1px solid #444; color: #999; padding: 6px 14px; border-radius: 6px; cursor: pointer; font-size: 0.85rem; }
        .admin-header form button:hover { border-color: #888; color: #fff; }

        /* Stats */
        .stats { display: flex; gap: 1.5rem; padding: 1.5rem 2rem; flex-wrap: wrap; }
        .stat-card { background: #151515; border: 1px solid #222; border-radius: 10px; padding: 1.2rem 1.5rem; min-width: 160px; flex: 1; }
        .stat-card .value { font-size: 2rem; font-weight: 700; color: #fff; }
        .stat-card .label { font-size: 0.8rem; color: #888; margin-top: 4px; }

        /* Layout */
        .content { display: flex; gap: 0; min-height: calc(100vh - 140px); }
        .chat-list { width: 380px; min-width: 380px; border-right: 1px solid #222; overflow-y: auto; max-height: calc(100vh - 140px); }
        .chat-detail { flex: 1; padding: 1.5rem 2rem; overflow-y: auto; max-height: calc(100vh - 140px); }

        /* Chat list */
        .chat-item { padding: 1rem 1.5rem; border-bottom: 1px solid #1a1a1a; cursor: pointer; transition: background 0.15s; }
        .chat-item:hover { background: #1a1a1a; }
        .chat-item.active { background: #1a2a2a; border-left: 3px solid #7bc3d7; }
        .chat-item a { color: inherit; text-decoration: none; display: block; }
        .chat-item .time { font-size: 0.75rem; color: #666; }
        .chat-item .preview { font-size: 0.85rem; color: #999; margin-top: 4px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 320px; }
        .chat-item .meta { font-size: 0.75rem; color: #555; margin-top: 4px; }

        /* Detail */
        .detail-header { margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid #222; }
        .detail-header h2 { font-size: 1.1rem; margin-bottom: 0.3rem; }
        .detail-header .meta { font-size: 0.8rem; color: #666; }

        .message { margin-bottom: 1rem; }
        .message .role { font-size: 0.75rem; font-weight: 600; margin-bottom: 3px; text-transform: uppercase; }
        .message .role.user { color: #7bc3d7; }
        .message .role.assistant { color: #a0ebca; }
        .message .text { background: #151515; padding: 10px 14px; border-radius: 8px; font-size: 0.9rem; line-height: 1.5; border: 1px solid #222; }
        .message .msg-time { font-size: 0.7rem; color: #555; margin-top: 3px; }

        .empty { text-align: center; color: #555; padding: 4rem 2rem; }

        @media (max-width: 768px) {
            .content { flex-direction: column; }
            .chat-list { width: 100%; min-width: 0; max-height: 40vh; }
            .chat-detail { max-height: none; }
        }
    </style>
</head>
<body>
    <div class="admin-header">
        <h1>TaKo Admin</h1>
        <form method="POST"><button type="submit" name="logout" value="1">Logout</button></form>
    </div>

    <div class="stats">
        <div class="stat-card">
            <div class="value"><?= $totalSessions ?></div>
            <div class="label">Chats gesamt</div>
        </div>
        <div class="stat-card">
            <div class="value"><?= $todaySessions ?></div>
            <div class="label">Chats heute</div>
        </div>
        <div class="stat-card">
            <div class="value"><?= $totalMessages ?></div>
            <div class="label">Nachrichten gesamt</div>
        </div>
        <div class="stat-card">
            <div class="value"><?= $avgMessages ?></div>
            <div class="label">Nachrichten / Chat</div>
        </div>
    </div>

    <div class="content">
        <div class="chat-list">
            <?php if (empty($chats)): ?>
                <div class="empty">Noch keine Chats vorhanden</div>
            <?php else: ?>
                <?php foreach ($chats as $idx => $chat): ?>
                    <?php
                        $firstUserMsg = '';
                        foreach ($chat['messages'] ?? [] as $m) {
                            if ($m['role'] === 'user') { $firstUserMsg = $m['content']; break; }
                        }
                        $msgCount = count($chat['messages'] ?? []);
                        $startTime = isset($chat['started_at']) ? date('d.m.Y H:i', strtotime($chat['started_at'])) : '–';
                    ?>
                    <div class="chat-item <?= $idx === $selectedIdx ? 'active' : '' ?>">
                        <a href="?chat=<?= $idx ?>">
                            <div class="time"><?= htmlspecialchars($startTime) ?></div>
                            <div class="preview"><?= htmlspecialchars(mb_substr($firstUserMsg, 0, 80)) ?: '(leer)' ?></div>
                            <div class="meta"><?= $msgCount ?> Nachrichten &middot; <?= htmlspecialchars($chat['ip'] ?? '') ?></div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="chat-detail">
            <?php if ($selectedIdx >= 0 && isset($chats[$selectedIdx])): ?>
                <?php $chat = $chats[$selectedIdx]; ?>
                <div class="detail-header">
                    <h2>Chat vom <?= date('d.m.Y H:i:s', strtotime($chat['started_at'] ?? 'now')) ?></h2>
                    <div class="meta">
                        Session: <?= htmlspecialchars(mb_substr($chat['session_id'] ?? '', 0, 12)) ?>...
                        &middot; IP: <?= htmlspecialchars($chat['ip'] ?? '') ?>
                        &middot; <?= count($chat['messages'] ?? []) ?> Nachrichten
                    </div>
                </div>

                <?php foreach ($chat['messages'] ?? [] as $msg): ?>
                    <div class="message">
                        <div class="role <?= $msg['role'] ?>"><?= $msg['role'] === 'user' ? 'Besucher' : 'TaKo' ?></div>
                        <div class="text"><?= nl2br(htmlspecialchars($msg['content'])) ?></div>
                        <div class="msg-time"><?= isset($msg['time']) ? date('H:i:s', strtotime($msg['time'])) : '' ?></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty">Chat auswählen um Details zu sehen</div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
