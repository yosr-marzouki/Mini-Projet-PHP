
<?php
session_start();
require_once 'connexion.php';

$message = "";

if (isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {

        $message = "Veuillez remplir tous les champs.";

    } else {

        // Rechercher l'utilisateur dans la base de données
        $req = "SELECT * FROM utilisateurs WHERE username = ?";
        $stmt = $pdo->prepare($req);
        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier le mot de passe
        if ($user && $password == $user['password']) { 

            // Enregistrer les informations dans la session
            session_regenerate_id(true);

            $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirection selon le rôle
            if ($user['role'] == 'admin') {

                header("Location: dashboard.php");
                exit;

            } else {

                header("Location: liste_article.php");
                exit;
            }

        } else {

            $message = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Connexion - Ma Pâtisserie</title>

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/morph/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow mx-auto" style="max-width: 450px;">

        <div class="card-body p-4">

            <h2 class="text-center text-info mb-4">
                🍰 Connexion
            </h2>

            <?php if ($message != ""): ?>

                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($message); ?>
                </div>

            <?php endif; ?>

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Nom d'utilisateur
                    </label>

                    <input type="text"
                           name="username"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Mot de passe
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>

                </div>

                <button type="submit"
                        name="submit"
                        class="btn btn-info text-white w-100">

                    Se connecter

                </button>

            </form>

            <p class="text-center mt-3">

                Vous n'avez pas de compte ?

                <a href="inscription.php" class="text-info">
                    S'inscrire
                </a>

            </p>

        </div>

    </div>

</div>

</body>
</html>
