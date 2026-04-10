<?php
function getAllUsers($pdo){
    // cette function se conectte  al abse de donner et retourne la liste de tout utilisateur  se forme d un array
    $sql = "SELECT * FROM users";
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function fillterUsersByRole($pdo, $role){
    $sql= "SELECT * FROM users where role = ?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$role]);
    return $stmt->fetchAll();
}

function fillterUsersByActive($pdo, $active){
    $sql= "SELECT * FROM users where active = ?";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$active]);
    return $stmt->fetchAll();
}

function searchUsers($pdo, $search){
    $sql = "SELECT * FROM users 
            WHERE fname LIKE ? OR lname LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%$search%", "%$search%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}