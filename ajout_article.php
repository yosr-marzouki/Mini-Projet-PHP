
<?php
require 'connexion.php';

$nom_article = $_POST['nom_article'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$image = $_POST['image'];
$id_categories = $_POST['id_categories'];

try {

    $sql = "INSERT INTO articles
            (nom_article, description, prix, image, id_categories)
            VALUES (?, ?, ?, ?, ?)";

    $pdostat = $pdo->prepare($sql);

    $pdostat->bindValue(1, $nom_article);
    $pdostat->bindValue(2, $description);
    $pdostat->bindValue(3, $prix);
    $pdostat->bindValue(4, $image);
    $pdostat->bindValue(5, $id_categories);

    $pdostat->execute();

    header('Location: liste_article.php');
    exit;
} catch (Exception $e) {
    echo "ERREUR : " . $e->getMessage();
}
?>
