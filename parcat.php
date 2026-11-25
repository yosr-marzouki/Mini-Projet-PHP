
<?php
require_once 'connexion.php';

if (!isset($_GET['id_categories']) || !ctype_digit($_GET['id_categories'])) {
    header("Location: categories.php");
    exit;
}

$id_categories = (int) $_GET['id_categories'];

// Récupérer le nom de la catégorie
$req = "SELECT nom_categories FROM categories WHERE id_categories = ?";
$stmt = $pdo->prepare($req);
$stmt->execute([$id_categories]);

$categorie = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$categorie) {
    header("Location: categories.php");
    exit;
}

// Récupérer uniquement les articles de cette catégorie
$req = "SELECT * FROM articles WHERE id_categories = ?";
$stmt = $pdo->prepare($req);
$stmt->execute([$id_categories]);

$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

ob_start();
?>

<h2 class="text-center text-info mb-4">
    Articles : <?php echo htmlspecialchars($categorie['nom_categories']); ?>
</h2>

<style>
    .dessert-card {
        transition: transform .2s, box-shadow .2s;
    }

    .dessert-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 .8rem 1.5rem rgba(0,0,0,.15) !important;
    }

    .dessert-img {
        height: 220px;
        object-fit: cover;
    }
</style>

<div class="row g-4">

    <?php if (count($articles) > 0): ?>

        <?php foreach ($articles as $ligne): ?>

            <div class="col-md-6 col-lg-4">

                <div class="card dessert-card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                    <div class="position-relative">

                        <img src="<?php echo htmlspecialchars($ligne['image']); ?>"
                             class="card-img-top dessert-img"
                             alt="<?php echo htmlspecialchars($ligne['nom_article']); ?>"
                             onerror="this.src='https://placehold.co/600x400?text=Dessert'">

                        <span class="badge bg-danger position-absolute top-0 end-0 m-3 fs-6">
                            <?php echo htmlspecialchars($ligne['prix']); ?> DT
                        </span>

                    </div>

                    <div class="card-body">

                        <h5 class="card-title fw-bold">
                            <?php echo htmlspecialchars($ligne['nom_article']); ?>
                        </h5>

                        <p class="card-text text-muted">
                            <?php echo htmlspecialchars($ligne['description']); ?>
                        </p>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    <?php else: ?>

        <div class="col-12">
            <div class="alert alert-info text-center">
                Aucun article dans cette catégorie.
            </div>
        </div>

    <?php endif; ?>

</div>

<div class="text-center mt-4">
    <a href="categories.php" class="btn btn-outline-info rounded-pill">
        ← Retour aux catégories
    </a>
</div>

<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
