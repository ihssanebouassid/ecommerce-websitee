    <?php
    include("connexion.php");
    $genre = $_GET['genre'] ?? '';
    $stmt = $pdo->query("SELECT DISTINCT genre FROM produits ORDER BY genre");
    $categories = [];
    while ($g = $stmt->fetch()) {
        $categories[] = $g['genre'];
    }
    $categoryClasses = [
        'femme'    => 'cat-femme',
        'homme'    => 'cat-homme',
        'enfant'  => 'cat-enfants',
       
            ];
    $categoryTags = [
        'femme'    => 'Collection',
        'homme'    => 'Collection',
        'enfant'  => 'Collection',
        
    ];
    $produits = [];
    if (!empty($genre)) {$stmt = $pdo->prepare("SELECT *FROM produits WHERE genre = ? AND stock_dispo > 0 ");
        $stmt->execute([$genre ]);
        $produits = $stmt->fetchAll();
    }
    ?>
    <?php include 'header.php'; ?>
    <div class="container">
        <?php if (empty($genre)) : ?>
            <header class="section-header">
                <span class="section-eyebrow">Bienvenue chez Élégance</span>
                <h1 class="section-title"><em>Choisissez votre  univers</em></h1>
            </header>
            <div class="category-choices">
                <?php foreach ($categories as $category):
                    $key = strtolower(trim($category));
                    $cls = $categoryClasses[$key] ?? 'cat-default';
                    $tag = $categoryTags[$key]    ?? 'Découvrir';
                ?>  
                   <a href="index.php?genre=<?= $category ?>"
                    class="category-card <?= $cls ?>">
                        <div class="card-inner">
                            <span class="card-tag"><?= $tag ?></span>
                            <span class="card-name">
                                <?= mb_strtoupper($category) ?>
                            </span>
                            <span class="card-arrow">
                                <i class="ri-arrow-right-line"></i>
                                Explorer
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <a href="index.php" class="back-link">
                <i class="ri-arrow-left-line"></i>Toutes les catégories</a>
            <?php if (isset($_SESSION['message'])): ?>
                <div class="success-message" id="successMessage">
                    <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                </div>
                <script>
                    setTimeout(() => {
                        const el = document.getElementById("successMessage");
                        if (el) el.style.display = "none";
                    }, 2500);
                </script>
            <?php endif; ?>
            <header class="section-header" style="margin-bottom: 24px;">
                    <span class="section-eyebrow">Collection</span>
                    <h1 class="section-title">
                        <?= (mb_strtoupper($genre)) ?>
                    </h1>
            </header>
            <?php if (!empty($genre)): ?>
            <div class="cards" id="cardsGrid">
                <?php if (count($produits) == 0): ?>
                    <div class="empty-state">Aucun produit trouvé dans cette catégorie.</div>
                <?php endif; ?>
                <?php foreach ($produits as $row): ?>
                    <div class="card"
                        data-nom="<?= strtolower(($row['nom'])) ?>"
                        data-prix="<?= ($row['prix']) ?>">
                        <img src="images/<?= ($row['image']) ?>"
                            alt="<?= ($row['nom']) ?>">
                        <div class="card-content">
                            <h2><?= ($row['nom']) ?></h2>
                            <p class="price"><?= ($row['prix']) ?> DH</p>
                            <div class="card-actions">
                                <a class="btn"
                                href="ajouter_panier.php?id=<?= $row['id'] ?>&genre=<?= ($genre) ?>">
                                    Ajouter
                                </a>
                                <a class="btn" href="details.php?id=<?= $row['id'] ?>">
                                    Détails
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
         <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php 
    include 'footer.php'; ?>
