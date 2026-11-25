<?php
require 'connexion.php';

ob_start();
?>

<div class="container mt-5">

    <div class="text-center mb-4">
        <h1 class="fw-bold">🍰 Ajouter un dessert</h1>
        <p class="text-muted">Ajoutez un nouveau dessert à notre collection.</p>
    </div>

    <div class="card shadow-sm border-0 rounded-4 mx-auto" style="max-width: 650px;">
        <div class="card-body p-4">

            <form action="ajout_article.php" method="post">

                <!-- Nom du dessert -->
                <div class="mb-3">
                    <label class="form-label">Nom du dessert</label>
                    <input type="text"
                        name="nom_article"
                        class="form-control"
                        placeholder="Ex : Fondant au chocolat"
                        required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description"
                        class="form-control"
                        rows="4"
                        placeholder="Décrivez votre dessert..."
                        required></textarea>
                </div>

                <!-- Prix -->
                <div class="mb-3">
                    <label class="form-label">Prix (DT)</label>
                    <input type="number"
                        name="prix"
                        class="form-control"
                        step="0.001"
                        min="0"
                        placeholder="Ex : 6.500"
                        required>
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label class="form-label">Lien de l'image</label>
                    <input type="url"
                        name="image"
                        class="form-control"
                        placeholder="https://exemple.com/dessert.jpg"
                        required>
                </div>

                <!-- Catégorie -->
                <div class="mb-4">
                    <label class="form-label">Catégorie</label>

                    <select name="id_categories" class="form-select" required>
                        <option value="">-- Choisir une catégorie --</option>

                        <?php
                        $q = "SELECT * FROM categories";
                        $pdostat = $pdo->query($q);
                        $categories = $pdostat->fetchAll();

                        foreach ($categories as $ligne) {
                            echo '<option value="' . $ligne['id_categories'] . '">'
                                . htmlspecialchars($ligne['nom_categories'])
                                . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <!-- Boutons -->
                <div class="d-flex gap-2">
                    <button type="submit"
                        class="btn btn-info text-white rounded-pill flex-fill">
                        ➕ Ajouter
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