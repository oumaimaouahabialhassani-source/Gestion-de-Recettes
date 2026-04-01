<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $reduction = $_POST['reduction'];

    $Error = false; 

   
    if (empty($nom)) {
        echo "Vous avez laissé le nom du produit vide<br>";
        $Error = true;
    }

    if (empty($prix)) {
        echo "Vous avez laissé le prix  vide<br>";
        $Error = true;
    } elseif (!is_numeric($prix)) {
        echo "Le prix doit être un nombre<br>";
        $Error = true;
    }

    if ($reduction === "") {
        echo "Vous n'avez pas choisi de pourcentage de réduction<br>";
        $Error = true;
    }

    if (!$Error) {
        $prix_final = $prix - ($prix * $reduction / 100);

        echo "Résultat:<br>";
        echo "Produit : $nom <br>"; 
        echo "Prix initial : $prix DH <br>";
        echo "Prix avec réduction ($reduction%) : " . number_format($prix_final, 2) . " DH <br>";
    }
}

$host = 'localhost';
$dbname = 'dbblog';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>




