
<?php
require_once 'connexion.php';

// Vérifier l'identifiant
if (isset($_GET['id_article']) && ctype_digit($_GET['id_article'])) {

    $id = (int) $_GET['id_article'];

    // Supprimer l'article
    $req = "DELETE FROM articles WHERE id_article = ?";
    $stmt = $pdo->prepare($req);
    $stmt->execute([$id]);

    // Retourner à la liste des articles
    header("Location: liste_article.php");
    exit;

} else {
    header("Location: liste_article.php");
    exit;
}
?>
