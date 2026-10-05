<?php
session_start();
include("connexion.php");
if(isset($_POST['add'])){
    $nom         = $_POST['nom'];
    $prix        = $_POST['prix'];
    $image       = $_POST['image'];
    $description = $_POST['description'];
    $stock       = $_POST['stock'];
    $genre       = $_POST['genre'];
    $stmt = $pdo->prepare("INSERT INTO produits (nom, prix, image, description, stock_dispo, genre) VALUES(?,? ,? ,? ,? ,? )");
    $stmt->execute([$nom, $prix, $image, $description, $stock, $genre]);
    header("location:dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Produit —Élégance </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="ajouter.css">
</head>
<body>
<div class="ajouter-wrap">
    <div class="ajouter-header">
        <span class="ajouter-eyebrow">Administration</span>
        <h1 class="ajouter-title"><em>Ajouter un produit</em></h1>
    </div>
    <div class="ajouter-card">
        <form method="POST" class="ajouter-form">
            <div class="form-field">
                <label for="nom">Nom du produit</label>
                <input type="text" id="nom" name="nom" placeholder="Ex: Robe en Jean Élégante" required>
            </div>
            <div class="form-field">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Décrivez le produit..."></textarea>
            </div>
            <hr class="form-divider">
            <div class="form-row">
                <div class="form-field">
                    <label for="prix">Prix (DH)</label>
                    <input type="number" id="prix" name="prix" placeholder="Ex: 299" min="0" required>
                </div>
                <div class="form-field">
                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock" placeholder="Ex: 50" min="0">
                </div>
            </div>
            <div class="form-field">
                <label for="genre">Catégorie</label>
                <div class="select-wrap">
                    <select id="genre" name="genre">
                        <option value="femme">Femme</option>
                        <option value="homme">Homme</option>
                        <option value="enfants">Enfants</option>
                        <option value="fit tech">Fit Tech</option>
                    </select>
                </div>
            </div>
            <div class="form-field">
                <label for="image">URL de l'image</label>
                <input type="text" id="image" name="image" placeholder="Ex: produit.jpg">
            </div>
            <hr class="form-divider">
            <div class="ajouter-submit">
                <a class="btn-retour" href="dashboard.php">← Retour au dashboard</a>
                <button type="submit" class="btn-ajouter" name="add">
                    + Ajouter le produit
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>