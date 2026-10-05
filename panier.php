<?php
session_start();
include("connexion.php");
$total = 0;
$items = [];
if (isset($_SESSION['panier'])) {
    foreach ($_SESSION['panier'] as $id => $quantity) {
        $stmt = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            $sous_total = $row['prix'] * $quantity;
            $total += $sous_total;
            $items[] = [
                'id'         => $id,
                'data'       => $row,
                'quantity'   => $quantity,
                'sous_total' => $sous_total
            ];
        }
    }
}
?>
<?php include 'header.php'; ?>
<div class="container">
    <div class="panier-header">
        <div>
            <span class="section-eyebrow">Mon espace</span>
            <h1 class="section-title">Mon Panier</h1>
        </div>
        <a href="index.php" class="back-link" style="margin-bottom:0">
            <i class="ri-arrow-left-line"></i>Continuer mes achats</a>
    </div>
    <?php if (empty($items)): ?>
        <div class="panier-empty">
            <div class="panier-empty-icon">
                <i class="ri-shopping-cart-line"></i>
            </div>
            <h2>Votre panier est vide</h2>
            <p>Découvrez nos collections et ajoutez des produits.</p>
            <a href="index.php" class="detail-btn">Explorer les collections</a>
        </div>
    <?php else: ?>
        <div class="panier-layout">
            <div class="panier-items">
                <?php foreach ($items as $item):
                    $row = $item['data'];
                    $id = $item['id'];
                    $quantity = $item['quantity'];
                    $sous_total = $item['sous_total'];
                ?>
                <div class="panier-item">
                    <div class="panier-item-img">
                        <img src="images/<?= htmlspecialchars($row['image']) ?>"
                             alt="<?= htmlspecialchars($row['nom']) ?>">
                    </div>
                    <div class="panier-item-info">
                        <span class="panier-item-genre">
                            <?= htmlspecialchars($row['genre']) ?>
                        </span>
                        <h3 class="panier-item-nom">
                            <?= htmlspecialchars($row['nom']) ?>
                        </h3>
                        <span class="panier-item-prix">
                            <?= htmlspecialchars($row['prix']) ?> DH
                        </span>
                    </div>
                    <div class="panier-qty">
                        <a href="supprimer_panier.php?id=<?= $id ?>&action=decrease"
                           class="panier-qty-btn">-</a>
                        <span><?= $quantity ?></span>
                        <a href="ajouter_panier.php?id=<?= $id ?>&genre=<?= urlencode($row['genre']) ?>&redirect=panier"
                           class="panier-qty-btn">+</a>
                    </div>
                    <span class="panier-item-sous-total">
                        <?= $sous_total ?> DH
                    </span>
                    <a href="supprimer_panier.php?id=<?= $id ?>&action=remove"
                       class="panier-item-delete"
                       title="Supprimer">
                        <i class="ri-delete-bin-line"></i>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="panier-summary">
                <h3 class="panier-summary-title">Récapitulatif</h3>
                <div class="panier-summary-row">
                    <span>Articles (<?= count($items) ?>)</span>
                    <span><?= $total ?> DH</span>
                </div>
                <div class="panier-summary-row">
                    <span>Livraison</span>
                    <span class="panier-free">Gratuite</span>
                </div>
                <div class="panier-summary-divider"></div>
                <div class="panier-summary-row panier-summary-total">
                    <span>Total</span>
                    <span><?= $total ?> DH</span>
                </div>
                <a href="#" class="detail-btn"
                   style="display:block; text-align:center; margin-top:24px;">
                    Commander</a>
                <a href="index.php" class="panier-continue">
                    <i class="ri-arrow-left-line"></i>
                    Continuer mes achats</a>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php include 'footer.php'; ?>