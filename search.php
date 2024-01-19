<!-- search.php -->
<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['query'])) {
    $query = mysqli_real_escape_string($conn, $_GET['query']);

    // Recherche dans la base de données
    $search_query = "SELECT * FROM forum_messages WHERE user LIKE '%$query%' OR message LIKE '%$query%'";
    $result = $conn->query($search_query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Résultats de la recherche</title>
</head>
<body>
    <header>
        <h1>Résultats de la recherche</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="forum.php">Forum</a></li>
                <li><a href="news.php">Actualités</a></li>
            </ul>
        </nav>
    </header>

    <section class="content">
        <h2>Résultats de la recherche pour "<?php echo $query; ?>"</h2>
        <?php
        if (isset($result) && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='message'>";
                echo "<p><strong>" . $row['user'] . ":</strong> " . $row['message'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Aucun résultat trouvé pour la recherche.</p>";
        }
        ?>
    </section>

    <footer>
        <p>&copy; 2024 Sea of Thieves Universe</p>
    </footer>
</body>
</html>
