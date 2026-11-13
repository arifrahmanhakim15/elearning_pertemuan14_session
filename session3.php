<?php
session_start();

$wasLoggedIn = isset($_SESSION['login']);
$_SESSION = [];

if (ini_get('session.use_cookies')) {
    $cookie = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $cookie['path'],
        $cookie['domain'],
        $cookie['secure'],
        $cookie['httponly']
    );
}

session_destroy();
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logout</title>
</head>
<body>
    <?php if ($wasLoggedIn): ?>
        <h1>Anda sudah berhasil logout</h1>
        <p>Session login telah dihapus.</p>
    <?php else: ?>
        <h1>Anda belum login</h1>
        <p>Tidak ada session login yang perlu dihapus.</p>
    <?php endif; ?>
    <p><a href="session1.php">Login kembali</a></p>
    <p><a href="session2.php">Coba buka halaman pemeriksaan session</a></p>
</body>
</html>
