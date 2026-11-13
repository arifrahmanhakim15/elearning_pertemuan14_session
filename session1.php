<?php
session_start();

$error = '';
$loggedIn = isset($_SESSION['login']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Login'])) {
    $user = isset($_POST['user']) && is_string($_POST['user'])
        ? trim($_POST['user'])
        : '';
    $pass = isset($_POST['pass']) && is_string($_POST['pass'])
        ? $_POST['pass']
        : '';

    if ($user === 'arifrahman' && $pass === '123') {
        session_regenerate_id(true);
        $_SESSION['login'] = $user;
        $loggedIn = true;
    } else {
        $error = 'Username atau password salah.';
    }
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>
    <h1>Login Here...</h1>

    <?php if ($loggedIn): ?>
        <p>Anda sudah login sebagai <?= htmlspecialchars($_SESSION['login'], ENT_QUOTES, 'UTF-8') ?>.</p>
        <p><a href="session2.php">Lanjut ke halaman pemeriksaan session</a></p>
    <?php else: ?>
        <?php if ($error !== ''): ?>
            <p role="alert"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>
        <form action="session1.php" method="post">
            <label>
                Username:
                <input type="text" name="user" required>
            </label>
            <br>
            <label>
                Password:
                <input type="password" name="pass" required>
            </label>
            <br>
            <button type="submit" name="Login" value="Log In">Log In</button>
        </form>
        <p>Contoh akun: username <code>arifrahman</code>, password <code>123</code>.</p>
    <?php endif; ?>
</body>
</html>