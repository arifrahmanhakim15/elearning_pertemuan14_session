<?php
session_start();

if (!isset($_SESSION['login'])) {
    http_response_code(403);
    ?>
    <!doctype html>
    <html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Akses ditolak</title>
    </head>
    <body>
        <h1>Anda belum login</h1>
        <p>Anda tidak berhak masuk ke halaman ini.</p>
        <p><a href="session1.php">Silakan login di sini</a></p>
    </body>
    </html>
    <?php
    exit;
}

$user = htmlspecialchars($_SESSION['login'], ENT_QUOTES, 'UTF-8');
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemeriksaan Session</title>
</head>
<body>
    <h1>Selamat Datang <?= $user ?></h1>
    <p>Halaman ini hanya bisa diakses jika Anda sudah login.</p>
    <p><a href="session3.php">Logout</a></p>
</body>
</html>
