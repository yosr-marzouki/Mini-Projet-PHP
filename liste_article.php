<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Liste des desserts</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">

        <center>
            <h1>Nos Desserts</h1>
            <p>Découvrez notre sélection de délicieux desserts !</p>

            <br>

            <a class="btn btn-success" href="form_ajout_article.php">
                Ajouter un dessert
            </a>
        </center>

        <div class="row mt-4">

            <?php
            require 'connexion.php';

            try {
                $pdostat = $pdo->query("SELECT * FROM article");

                foreach ($pdostat as $ligne) {

                    echo '
                <div class="col-md-4 mb-4">

                    <div class="card h-100 shadow">

                        <img src="images/' . htmlspecialchars($ligne['image']) . '"
                             class="card-img-top"
                             style="height:220px; object-fit:cover;"
                             alt="Dessert">

                        <div class="card-body">

                            <h5 class="card-title text-center">
                                ' . htmlspecialchars($ligne['nom_article']) . '
                            </h5>

                            <p class="card-text">
                                ' . htmlspecialchars($ligne['description']) . '
                            </p>

                            <h5 class="text-center text-danger">
                                ' . htmlspecialchars($ligne['prix']) . ' DT
                            </h5>

                            <p>
                                <b>Catégorie :</b> ' . htmlspecialchars($ligne['id_categories']) . '
                            </p>

                            <div class="text-center">

                                <a class="btn btn-primary btn-sm"
                                   href="form_modif_article.php?id_article=' . $ligne['id_article'] . '">
                                   Modifier
                                </a>

                                <a class="btn btn-danger btn-sm"
                                   href="supp_article.php?id_article=' . $ligne['id_article'] . '">
                                   Supprimer
                                </a>

                            </div>

                        </div>
                    </div>

                </div>';
                }
            } catch (Exception $e) {
                echo "ERREUR : " . $e->getMessage();
            }
            ?>

        </div>

    </div>

</body>

</html>