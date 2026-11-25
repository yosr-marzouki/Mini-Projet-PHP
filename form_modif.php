<?php
require 'connexion.php';

ob_start();

try {
    // Récupérer l'identifiant du dessert
    $id = $_GET['id_articles'];

    // Récupérer les informations du dessert
    $sql = "SELECT * FROM articles WHERE id_articles = ?";
    $pdostat = $pdo->prepare($sql);
    $pdostat->execute([$id]);

    $ligne = $pdostat->fetch(PDO::FETCH_ASSOC);

    if (!$ligne) {
        die("Dessert introuvable !");
    }

    // Récupérer les données
    $nom = $ligne['nom_article'];
    $description = $ligne['description'];
    $prix = $ligne['prix'];
    $image = $ligne['image'];
    $id_categories = $ligne['id_categories'];
} catch (Exception $e) {
    die("ERREUR : " . $e->getMessage());
}
?>

<div class="container mt-5">

    <div class="text-center mb-4">
        <h1 class="fw-bold">🍰 Modifier un dessert</h1>
        <p class="text-muted">Modifiez les informations de votre dessert.</p>
    </div>

    <div class="card shadow-sm border-0 rounded-4 mx-auto"
        style="max-width: 650px;">

        <div class="card-body p-4">

            <form action="modif_article.php" method="post">

                <input type="hidden" name="id_articles"
                    value="<?= htmlspecialchars($id) ?>">

                <!-- Nom -->
                <div class="mb-3">
                    <label class="form-label">Nom du dessert</label>
                    <input type="text"
                        name="nom_article"
                        class="form-control"
                        value="<?= htmlspecialchars($nom) ?>"
                        required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description"
                        class="form-control"
                        rows="4"
                        required><?= htmlspecialchars($description) ?></textarea>
                </div>

                <!-- Prix -->
                <div class="mb-3">
                    <label class="form-label">Prix (DT)</label>
                    <input type="number"
                        name="prix"
                        class="form-control"
                        step="0.001"
                        min="0"
                        value="<?= htmlspecialchars($prix) ?>"
                        required>
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label class="form-label">Lien de l'image</label>
                    <input type="url"
                        name="image"
                        class="form-control"
                        value="<?= htmlspecialchars($image) ?>"
                        required>
                </div>

                <!-- Catégorie -->
                <div class="mb-4">
                    <label class="form-label">Catégorie</label>

                    <select name="id_categories"
                        class="form-select"
                        required>

                        <?php
                        $sql = "SELECT * FROM categories";
                        $pdostat = $pdo->query($sql);
                        $categories = $pdostat->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($categories as $cat) {
                            $selected = ($cat['id_categories'] == $id_categories)
                                ? 'selected'
                                : '';

                            echo '<option value="' . $cat['id_categories'] . '" '
                                . $selected . '>'
                                . htmlspecialchars($cat['nom_categories'])
                                . '</option>';
                        }
                        ?>

                    </select>
                </div>

                <!-- Boutons -->
                <div class="d-flex gap-2">

                    <button type="submit"
                        class="btn btn-info text-white rounded-pill flex-fill">
                        💾 Enregistrer
                    </button>

                    <a href="liste_article.php"
                        class="btn btn-outline-secondary rounded-pill flex-fill">
                        Annuler
                    </a>

                </div>

            </form>

        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'layout.php';
?>