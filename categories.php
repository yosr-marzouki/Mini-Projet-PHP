
<?php
require_once 'connexion.php';

$req = "SELECT * FROM categories ORDER BY id_categories DESC";
$stmt = $pdo->prepare($req);
$stmt->execute();

$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php ob_start(); ?>

<h2 class="text-center text-info mb-4">
    Nos catégories
</h2>

<div class="row">

    <?php foreach ($categories as $categorie): ?>

        <div class="col-md-4 mb-4">

            <div class="card shadow h-100">

                <div class="card-body text-center">

                    <h5 class="card-title text-info">
                        <?php echo htmlspecialchars($categorie['nom_categories']); ?>
                    </h5>

                    <a href="parcat.php?id_categories=<?php echo (int)$categorie['id_categories']; ?>"
                       class="btn btn-info text-white mt-3">
                        Voir les articles
                    </a>

                </div>

            </div>

        </div>

    <?php endforeach; ?>

</div>

<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
