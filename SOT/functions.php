<?php
function createForumTable($conn)
{
    $sql = "CREATE TABLE IF NOT EXISTS forum_messages (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user VARCHAR(30) NOT NULL,
        message TEXT NOT NULL,
        timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table 'forum_messages' créée avec succès.";
    } else {
        echo "Erreur lors de la création de la table : " . $conn->error;
    }
}

// Utilisation : createForumTable($conn);
?>
