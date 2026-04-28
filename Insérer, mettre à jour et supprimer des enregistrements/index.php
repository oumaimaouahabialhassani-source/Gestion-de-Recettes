<?php
require "db.php";
require "CRUD.php";

try {
    $sql = "SELECT * FROM recipes";
    $stmt = $pdo->query($sql);

    $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($recipes as $plat) {
        echo "ID : " . $plat['id'] . " - nom
         : " . $plat['name'] . " - category : " . $plat['category'] .  "<br>";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

