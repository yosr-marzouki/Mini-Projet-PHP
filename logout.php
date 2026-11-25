
<?php
session_start();

$_SESSION = array();

session_destroy();

header("Location: liste_article.php");
exit;
?>
