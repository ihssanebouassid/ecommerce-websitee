<?php
session_start();
$id     = isset($_GET['id'])     ? $_GET['id']     : null;
$action = isset($_GET['action']) ? $_GET['action'] : 'remove';
if ($id && isset($_SESSION['panier'][$id])) {
    if ($action === 'decrease') {
        $_SESSION['panier'][$id]--;
        // Remove if quantity reaches 0
        if ($_SESSION['panier'][$id] <= 0) {
            unset($_SESSION['panier'][$id]);
        }
    } else {
        unset($_SESSION['panier'][$id]);
    }
}
header("Location: panier.php");
exit();
?>
