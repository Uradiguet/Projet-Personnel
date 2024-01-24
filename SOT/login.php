<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifiez les informations de connexion dans la base de données
    // ...

    // Si les informations sont correctes, configurez la session utilisateur
    $_SESSION['user_id'] = $user_id;
    header("Location: index.php");
    exit();
}
?>