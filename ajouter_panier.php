<?php
session_start();
$id     = $_GET['id'];
$genre  = isset($_GET['genre'])    ? $_GET['genre']    : '';
$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : '';
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}
if (!isset($_SESSION['panier'][$id])) {
    $_SESSION['panier'][$id] = 1;
} else {
    $_SESSION['panier'][$id]++;
}
$_SESSION['message'] = "Produit ajouté au panier avec succès !";
if ($redirect === 'panier') {
    header("Location: panier.php");
} else {
    header("Location: index.php?genre=" . $genre);
}
exit();
?>
