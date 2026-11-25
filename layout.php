
<?php
if (!isset($content)) {
    $content = "";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ma Pâtisserie</title>

    <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/morph/bootstrap.min.css">
</head>
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-info shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="accueil.php">🍰 Ma Pâtisserie</a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="article.php">Articles</a></li>
                <li class="nav-item"><a class="nav-link" href="categories.php">Catégories</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">login</a></li>
                <li class="nav-item">
    <a class="nav-link" href="inscription.php">Inscription</a>
</li>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-5">
    <?php echo $content; ?>
</main>

<footer class="bg-info text-white text-center p-4 mt-5">
    <h5>🍰 Ma Pâtisserie</h5>
    <p class="mb-0">Des douceurs pour tous les goûts !</p>
    <small>© 2026 - Tous droits réservés</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
