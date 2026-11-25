<?php
require 'connexion.php';

ob_start();
?>

<style>
    .dessert-card {
        transition: transform .2s, box-shadow .2s;
    }

    .dessert-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 .8rem 1.5rem rgba(0, 0, 0, .15) !important;
    }

    .dessert-img {
        height: 220px;
        object-fit: cover;
    }
</style>

<div class="text-center mb-5">
    <h1 class="fw-bold">🍰 Nos Desserts</h1>
    <p class="text-muted fs-5">Découvrez notre sélection de délicieux desserts !</p>
    <a class="btn btn-info text-white rounded-pill px-4" href="form_ajout_article.php">
        ➕ Ajouter un dessert
    </a>
</div>

<div class="row g-4">
    <?php
    try {
        $pdostat = $pdo->query("SELECT * FROM articles");
        $nb = 0;

        foreach ($pdostat as $ligne) {
            $nb++;
            $image = htmlspecialchars($ligne['image']);
            $nom   = htmlspecialchars($ligne['nom_article']);
            $desc  = htmlspecialchars($ligne['description']);
            $prix  = htmlspecialchars($ligne['prix']);
            $cat   = htmlspecialchars($ligne['id_categories']);
            $id    = (int)$ligne['id_article'];

            echo '
        <div class="col-md-6 col-lg-4">
            <div class="card dessert-card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                <div class="position-relative">
                    <img src="' . $image . '" class="card-img-top dessert-img" alt="' . $nom . '"
     onerror="this.src=\'https://placehold.co/600x400?text=Dessert\'">
     <img src="' . htmlspecialchars($image) . '"
     class="card-img-top dessert-img"
     alt="' . $nom . '"
     onerror="this.src=\'https://placehold.co/600x400?text=Dessert\'">
                    <span class="badge bg-danger position-absolute top-0 end-0 m-3 fs-6">' . $prix . ' DT</span>
                </div>

                <div class="card-body d-flex flex-column">
                    <span class="badge bg-info text-white align-self-start mb-2">Catégorie ' . $cat . '</span>
                    <h5 class="card-title fw-bold">' . $nom . '</h5>
                    <p class="card-text text-muted">' . $desc . '</p>

                    <div class="mt-auto d-flex gap-2">
                        <a class="btn btn-outline-primary btn-sm flex-fill rounded-pill"
                           href="form_modif_article.php?id_article=' . $id . '">✏️ Modifier</a>
                        <a class="btn btn-outline-danger btn-sm flex-fill rounded-pill"
                           href="supp_article.php?id_article=' . $id . '"
                           onclick="return confirm(\'Supprimer ce dessert ?\');">🗑️ Supprimer</a>
                    </div>
                </div>
            </div>
        </div>';
        }

        if ($nb === 0) {
            echo '<div class="col-12"><div class="alert alert-info text-center">Aucun dessert pour le moment.</div></div>';
        }
    } catch (Exception $e) {
        echo '<div class="col-12"><div class="alert alert-danger">ERREUR : ' . htmlspecialchars($e->getMessage()) . '</div></div>';
    }
    ?>
</div>

<?php
$content = ob_get_clean();
include 'layout.php';
