<?php
include("connexion.php");
include("header.php");
$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch();
if (!$row) {
    die("Produit introuvable");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Détails Produit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="detail-card">
        <img class="detail-img"
             src="images/<?php echo  ($row['image']); ?>"
             alt="<?php echo  ($row['nom']); ?>">
        <div class="detail-content">
            <h2><?php echo  ($row['nom']); ?></h2>
            <div class="detail-price">
                <?php echo $row['prix']; ?> DH
            </div>
            <div class="detail-description">
                <?php echo  ($row['description']); ?>
            </div>
            <a class="detail-btn"
               href="ajouter_panier.php?id=<?php echo $row['id']; ?>">
               Ajouter au panier
            </a>
        </div>
    </div>
</div>
<?php 
include 'footer.php'; ?>
</body>
</html>