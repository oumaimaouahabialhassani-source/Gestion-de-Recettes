<?php

$host ="localhost";
$namedb ="userdb";
$user ="root";
$password ="";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$namedb;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion reusie <br>";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}