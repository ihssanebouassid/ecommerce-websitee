<?php
session_start();
include("connexion.php");
$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("DELETE FROM produits WHERE id = ?");
$stmt->execute([$id]);
header("location:dashboard.php");
exit;
?>