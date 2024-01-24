<?php
include 'db_config.php';

// Définissez le nombre de messages par page
$messages_per_page = 10;

// Récupérez le numéro de page à partir de la requête GET
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculez l'offset pour la requête SQL
$offset = ($page - 1) * $messages_per_page;

// Récupérez les messages de la base de données avec la pagination
$query = "SELECT * FROM forum_messages LIMIT $offset, $messages_per_page";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Sea of Thieves Forum</title>
</head>
<body>
    <header>
        <h1>Sea of Thieves Forum</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="forum.php">Forum</a></li>
                <li><a href="news.php">Actualités</a></li>
            </ul>
        </nav>
    </header>

    <section class="content">
        <h2>Forum</h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='message'>";
                echo "<p><strong>" . $row['user'] . ":</strong> " . $row['message'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Aucun message sur le forum pour le moment.</p>";
        }
        ?>

        <?php
        // Afficher les messages du forum
        $query = "SELECT * FROM forum_messages";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='message'>";
                echo "<p><strong>" . $row['user'] . ":</strong> " . $row['message'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Aucun message sur le forum pour le moment.</p>";
        }
        ?>
        <div class="pagination">
            <?php
            $total_pages_query = "SELECT COUNT(*) as count FROM forum_messages";
            $total_pages_result = $conn->query($total_pages_query);
            $total_messages = $total_pages_result->fetch_assoc()['count'];
            $total_pages = ceil($total_messages / $messages_per_page);

            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<a href='forum.php?page=$i'>$i</a>";
            }
            ?>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Sea of Thieves Universe</p>
    </footer>
</body>
</html>
