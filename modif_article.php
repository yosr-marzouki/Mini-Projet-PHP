
<?php
require 'connexion.php';

try {
    $id = $_POST['id_articles'];
    $nom = $_POST['nom_article'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $image = $_POST['image'];
    $id_categories = $_POST['id_categories'];

    $sql = "UPDATE articles
            SET nom_article = ?,
                description = ?,
                prix = ?,
                image = ?,
                id_categories = ?
            WHERE id_articles = ?";

    $pdostat = $pdo->prepare($sql);

    $pdostat->execute([
        $nom,
        $description,
        $prix,
        $image,
        $id_categories,
        $id
    ]);

    header('Location: liste_article.php');
    exit;
} catch (Exception $e) {
    echo "ERREUR : " . $e->getMessage();
}
?>
