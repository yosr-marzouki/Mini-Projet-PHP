<?php
require_once 'connexion.php';

$message = "";

if (isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $message = "Veuillez remplir tous les champs.";
    } else {

        // Vérifier si le username existe
        $req = "SELECT * FROM utilisateurs WHERE username = ?";
        $stmt = $pdo->prepare($req);
        $stmt->execute([$username]);

        if ($stmt->fetch()) {
            $message = "Ce nom d'utilisateur existe déjà.";
        } else {

            // Crypter le mot de passe
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Ajouter un visiteur
            $req = "INSERT INTO utilisateurs (username, password, role)
                    VALUES (?, ?, 'visiteur')";

            $stmt = $pdo->prepare($req);
            $stmt->execute([$username, $hash]);

            header("Location: connexion.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inscription - Ma Pâtisserie</title>

   <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/morph/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow mx-auto" style="max-width: 450px;">
        <div class="card-body p-4">

            <h2 class="text-center text-info mb-4">
                🍰 Inscription
            </h2>

            <?php if ($message != ""): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Nom d'utilisateur</label>
                    <input type="text" name="username"
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" name="password"
                           class="form-control" required>
                </div>

                <button type="submit" name="submit"
        class="btn btn-light w-100">
    S'inscrire
</button>

            </form>

            <p class="text-center mt-3">
                Vous avez déjà un compte ?
                <a href="connexion.php" class="text-info">Se connecter</a>
            </p>

        </div>
    </div>
</div>

</body>
</html>
