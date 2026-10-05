<?php
session_start();
include("connexion.php");
include("navbar.php");
$stmt = $pdo->query("SELECT * FROM produits");
$produits = $stmt->fetchAll();
$total = count($produits);
$stmtAvg = $pdo->query("SELECT AVG(prix) as avg_prix FROM produits");
$row_avg = $stmtAvg->fetch();
$avg_prix = round($row_avg['avg_prix']);
$stmtCat = $pdo->query("SELECT COUNT(DISTINCT genre) as nb FROM produits");
$row_cat = $stmtCat->fetch();
$nb_genres = $row_cat['nb'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard — Ihssane Shop</title>
    <link rel="stylesheet" href="style.css?v=1">
</head>
<body>

<div class="container">
    <div class="dash-header">
        <div class="dash-title-block">
            <span class="dash-eyebrow">Panneau d'administration</span>
            <h1 class="dash-title"><em>Admin Dashboard</em></h1>
        </div>
        <a class="btn-add" href="ajouter.php">
            + Ajouter produit
        </a>
    </div>
    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-label">Total produits</div>
            <div class="stat-value"><?php echo $total; ?> <span>articles</span></div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Prix moyen</div>
            <div class="stat-value"><?php echo $avg_prix; ?> <span>DH</span></div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Catégories</div>
            <div class="stat-value"><?php echo $nb_genres; ?> <span>genres</span></div>
        </div>
    </div>

    <div class="table-wrap">
        <div class="table-toolbar">
            <span class="table-toolbar-title">Catalogue produits</span>
            <span class="table-count"><?php echo $total; ?> résultats</span>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Stock Disponible</th>
                    <th style="text-align:right">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($produits as $row) { ?>
                <tr>
                    <td class="td-id">#<?php echo $row['id']; ?></td>
                    <td class="td-nom"><?php echo htmlspecialchars($row['nom']); ?></td>
                    <td class="td-prix"><?php echo $row['prix']; ?> DH</td>
                    <td class="td-stock"><?php echo $row['stock_dispo']; ?></td>
                    <td>
                        <div class="td-actions">
                            <a class="btn btn-modifier" href="modifier.php?id=<?php echo $row['id']; ?>">
                                Modifier
                            </a>

                            <a class="btn btn-supprimer"
                               href="supprimer.php?id=<?php echo $row['id']; ?>"
                               onclick="return confirm('Supprimer ce produit ?')">
                                Supprimer
                            </a>
                        </div>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>