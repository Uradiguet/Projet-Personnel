<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "hazbin");

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pagination
$limit = 10; // Nombre de personnages par page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Récupération des données des personnages avec pagination
$result = $conn->query("SELECT * FROM characters LIMIT $start, $limit");
$characters = array();
while ($row = $result->fetch_assoc()) {
    $characters[] = $row;
}

// Nombre total de personnages
$total = $conn->query("SELECT count(id) as id FROM characters")->fetch_all(MYSQLI_ASSOC)[0]['id'];
$totalPages = ceil($total / $limit);

// Conversion en format JSON et envoi
header('Content-Type: application/json');
echo json_encode(array(
    'characters' => $characters,
    'totalPages' => $totalPages
));

// Fermeture de la connexion à la base de données
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hazbin Hotel</title>
    <link rel="stylesheet" href="Styles.css">
</head>
<body>
    <header>
        <h1>Hazbin Hotel Characters</h1>
        <input type="text" id="search-input" placeholder="Search characters...">
        <button onclick="searchCharacters()">Search</button>
    </header>
    <div id="character-list">
        <!-- Le contenu des personnages sera chargé ici via JavaScript -->
    </div>

    <script src="script.js"></script>
</body>
</html>
