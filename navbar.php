<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$totalItems = isset($_SESSION['panier']) ? array_sum($_SESSION['panier']) : 0;
?>
     <nav class="navbar">
    <div class="navbar-container">
        <div class="logo-text-block">
            <span class="logo-name">Élégance</span>
            <span class="logo-sub">MAISON DE MODE</span>
        </div>
        <div class="navbar-links">
            <!-- ajouter une condition si session admin est true href="../index.php" else href = index.php -->
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
                <a href="../index.php" class="navbar-link">
                    <i class="ri-home-line"></i>Accueil</a>
            <?php else: ?>
                <a href="index.php" class="navbar-link">   
                    <i class="ri-home-line"></i>Accueil</a>
            <?php endif; ?>   
            <?php if (!isset($_SESSION['admin']) ||  $_SESSION['admin'] !== true): ?>
                <a href="contact.php" class="navbar-link">
                    <i class="ri-mail-line"></i>Contact</a>
            <?php endif; ?>
            <?php if (!isset($_SESSION['admin']) ||  $_SESSION['admin'] !== true): ?>
            <a href="panier.php" class="navbar-link">
                <i class="ri-shopping-cart-line"></i>
                Panier
                <?php if ($totalItems > 0): ?>
                    <span class="badge-panier"><?= $totalItems ?></span>
                <?php endif; ?>
            </a>
            <?php endif; ?>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === true): 
                $_SESSION['admin'] = false;?>
                <a href="index.php" class="navbar-link">
                    <i class="ri-logout-box-line"></i>Déconnexion</a>    
            <?php else: ?>
                <a href="login.php" class="navbar-link">
                    <i class="ri-login-box-line"></i>Admin Login </a>
            <?php endif; ?> 
            </div>
        </div>
    </div>
</nav>

