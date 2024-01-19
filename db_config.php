<?php
$servername = "localhost";
$username = getenv('Ugo'); // Remplacez 'DB_USER' par le nom de votre variable d'environnement pour le nom d'utilisateur
$password = getenv('RADIGUET'); // Remplacez 'DB_PASSWORD' par le nom de votre variable d'environnement pour le mot de passe
$dbname = "sea_of_thieves_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}
?>
