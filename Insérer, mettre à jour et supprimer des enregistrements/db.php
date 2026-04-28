<?php
$host = 'localhost';
$dbname = 'recipesdb';
$username = 'root';
$password = '';

try{
    $pdo =new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "conection reusie";
} catch(PDOException $e){
    echo "ereure de conection" .$e->getMessage();
}