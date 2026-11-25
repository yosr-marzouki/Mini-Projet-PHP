<?php
try {
    $dsn = "mysql:host=localhost;dbname=mini_projet";
    $user = "root";
    $password = "";
    $pdo = new PDO($dsn,  $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "ERREUR : " . $e->getMessage();
}
