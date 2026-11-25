
<?php
session_start();

// Vérifier que l'utilisateur est Admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Admin - Ma Pâtisserie</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/morph/bootstrap.min.css">
</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-info shadow">
    <div class="container">

        <a class="navbar-brand fw-bold" href="dashboard.php">
            🍰 Ma Pâtisserie - Administration
        </a>

        <a href="logout.php" class="btn btn-danger btn-sm">
            Déconnexion
        </a>

    </div>
</nav>

<div class="container mt-5">

    <h2 class="text-center text-info fw-bold mb-2">
        Bienvenue Administrateur 👋
    </h2>

    <p class="text-center text-muted mb-5">
        Bonjour <?php echo htmlspecialchars($_SESSION['username']); ?>,
        bienvenue dans votre espace de gestion.
    </p>

    <div class="row g-4">

        <div class="col-md-6 col-lg-4">

            <div class="card shadow h-100 text-center p-4">

                <h1>🍰</h1>

                <h5 class="fw-bold">Gestion des articles</h5>

                <p class="text-muted">
                    Ajouter, modifier, supprimer et consulter les articles.
                </p>

                <a href="liste_article.php"
                   class="btn btn-info text-white mt-auto">
                    Gérer les articles
                </a>

            </div>

        </div>

        <!-- Gestion des catégories -->
        <div class="col-md-6 col-lg-4">

            <div class="card shadow h-100 text-center p-4">

                <h1>📂</h1>

                <h5 class="fw-bold">Gestion des catégories</h5>

                <p class="text-muted">
                    Gérer les catégories et les sous-catégories.
                </p>

                <a href="categories.php"
                   class="btn btn-info text-white mt-auto">
                    Gérer les catégories
                </a>

            </div>

        </div>

        

    </div>

</div>

<!-- Footer -->
<footer class="bg-info text-white text-center p-4 mt-5">

    <h5>🍰 Ma Pâtisserie</h5>

    <p class="mb-0">
        Espace Administrateur - © 2026
    </p>

</footer>

</body>
</html>
