<?php


require "db.php";


$sql = "SELECT * FROM Recipes";
$stmt = $pdo->query($sql);
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recettes</title>
    <style>
        .card {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 200px;
            display: inline-block;
        }
        img {
            width: 100%;
        }
    </style>
</head>
<body>

<h1>Liste des recettes</h1>

<?php foreach ($recipes as $recipe): ?>
    <div class="card">
        <img src="<?= $recipe['image'] ?>" alt="">
        <h3><?= $recipe['name'] ?></h3>
        <p>Catégorie : <?= $recipe['category'] ?></p>
        <p>Temps : <?= $recipe['preparation_time'] ?> min</p>
    </div>
<?php endforeach; ?>

</body>
</html>