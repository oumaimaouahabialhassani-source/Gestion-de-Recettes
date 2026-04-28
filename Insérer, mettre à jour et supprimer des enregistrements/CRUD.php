<?php
require "db.php";


$stmt = $pdo->prepare("INSERT INTO recipes (name, category, preparation_time, image, created_at) 
VALUES (:name, :category, :time, :image, NOW())");

$stmt->execute([
    'name' => 'Tacos',
    'category' => 'Plat',
    'time' => 20,
    'image' => 'image/tacos.jpg'
]);

$stmt = $pdo->prepare("UPDATE recipes 
SET preparation_time = :time, edited_at = NOW() 
WHERE id = :id");

$stmt->execute([
    'time' => 35,
    'id' => 4
]);

$stmt = $pdo->prepare("DELETE FROM recipes WHERE id = :id");

$stmt->execute([
    'id' => 10
]);

