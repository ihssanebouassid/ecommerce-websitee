<?php
session_start();
$error = '';
if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if ($user == "admin" && $pass == "1234") {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Identifiants incorrects. Veuillez réessayer.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Logn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-wrap">
    <div class="login-brand">
        <div class="login-brand-icon"><i class="ri-shield-user-line"></i></div>
        <h1>Ihssane Shop</h1>
        <p>Espace administrateur</p>
    </div>
    <div class="login-card">
        <?php if ($error): ?>
            <div class="login-error">
                <i class="ri-error-warning-line"></i>
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <form method="POST" class="login-form">
            <div class="login-field">
                <label>Nom d'utilisateur</label>
                <div class="login-input-wrap">
                    <i class="ri-user-line"></i>
                    <input type="text" name="user" placeholder="Login"
                           value="<?= isset($_POST['user']) ? htmlspecialchars($_POST['user']) : '' ?>"
                           autocomplete="username" required>
                </div>
            </div>
            <div class="login-field">
                <label>Mot de passe</label>
                <div class="login-input-wrap">
                    <i class="ri-lock-line"></i>
                    <input type="password" name="pass" placeholder="••••••••" autocomplete="current-password" required>
                </div>
            </div>
            <button class="login-btn" name="login">
                <i class="ri-login-box-line"></i>
                Connexion
            </button>
        </form>
    </div>
    <div class="login-back">
        <a href="index.php">
            <i class="ri-arrow-left-line"></i>
            Retour au site
        </a>
    </div>
</div>
</body>
</html>