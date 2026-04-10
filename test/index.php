<?php
require "function.php";
require "db.php";
$UsersAray = getAllUsers($pdo);

if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET["role"])) {
        $role = $_GET["role"];
        if($role=="all"){
            $UsersAray =getAllUsers($pdo);
        }elseif($role=="teacher" || $role=="student"){
            $UsersAray=fillterUsersByRole($pdo, $role);
        }
    }
    if(isset($_GET["search"]) && $_GET["search"] != "") {
        $search = $_GET["search"];
        $UsersAray = searchUsers($pdo, $search);
    }
     if(isset($_GET["active"])) {
        $active = $_GET["active"];
        if($active=="all"){
            $UsersAray =getAllUsers($pdo);
        }elseif($active=="1" || $active=="0"){
            $UsersAray=fillterUsersByActive($pdo, $active);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head> 
<body>
    <h1>List of users</h1>
    <form method="GET">
        <input type="text" name="search" placeholder="Search by name">
        
        <select name="role">
            <option value="all">All</option>
            <option value="student">Students</option>
            <option value="teacher">Teachers</option>
        </select>

        <select name="active">
            <option value="all">All</option>
            <option value="0">non active</option>
            <option value="1">active</option>
        </select>

        <input type="submit" value="filter">
    </form>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email Address</th>
            <th>Role</th>
            <th>Active</th>
        </tr>
        <?php foreach($UsersAray as $user){ ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['fname'] ?></td>
            <td><?= $user['lname'] ?></td>
            <td><?= $user['gmail'] ?></td>
            <td><?= $user['role'] ?></td>
            <td><?= $user['active'] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>