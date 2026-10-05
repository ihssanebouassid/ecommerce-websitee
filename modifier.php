<?php
session_start();
include("connexion.php");

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch();
if (!$row) {
    die("Produit introuvable");
}
if (isset($_POST['update'])) {
    $nom         = $_POST['nom'];
    $prix        = $_POST['prix'];
    $description = $_POST['description'];
    $image       = $_POST['image'];
    $genre       = $_POST['genre'];
    $stock       = $_POST['stock'];
    $stmt = $pdo->prepare("UPDATE produits SET nom = ?,prix = ?, description = ?, image = ?, stock_dispo = ?, genre = ? WHERE id = ?");

    $stmt->execute([$nom,$prix,$description,$image,$stock,$genre,$id]);
    header("location:dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit — Ihssane Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="modifier.css">
</head>
<body>
<div class="modifier-wrap">
    <div class="modifier-header">
        <span class="modifier-eyebrow">Administration</span>
        <h1 class="modifier-title"><em>Modifier un produit</em></h1>
    </div>
    <div class="modifier-card">
        <form method="POST" class="modifier-form">
            <div class="form-field">
                <label for="nom">Nom du produit</label>
                <input type="text" id="nom" name="nom"
                       value="<?php echo htmlspecialchars($row['nom']); ?>" required>
            </div>
            <div class="form-field">
                <label for="description">Description</label>
                <textarea id="description" name="description"><?php echo htmlspecialchars($row['description']); ?></textarea>
            </div>
            <hr class="form-divider">
            <div class="form-row">
                <div class="form-field">
                    <label for="prix">Prix (DH)</label>
                    <input type="number" id="prix" name="prix"
                           value="<?php echo $row['prix']; ?>" min="0" required>
                </div>

                <div class="form-field">
                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock"
                           value="<?php echo $row['stock_dispo']; ?>" min="0">
                </div>
            </div>
            <div class="form-field">
                <label for="genre">Catégorie</label>
                <div class="select-wrap">
                    <select id="genre" name="genre">
                        <option value="Femme" <?php if($row['genre'] == 'Femme') echo 'selected'; ?>>
                            Femme
                        </option>
                        <option value="Homme" <?php if($row['genre'] == 'Homme') echo 'selected'; ?>>
                            Homme
                        </option>
                        <option value="Enfant" <?php if($row['genre'] == 'Enfant') echo 'selected'; ?>>
                            Enfants
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-field">
                <label for="image">URL de l'image</label>
                <input type="text" id="image" name="image"
                       value="<?php echo htmlspecialchars($row['image']); ?>">
            </div>
            <hr class="form-divider">
            <div class="modifier-submit">
                <a class="btn-retour" href="dashboard.php">← Retour au dashboard</a>
                <button type="submit" class="btn-modifier-submit" name="update">
                    ✓ Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>