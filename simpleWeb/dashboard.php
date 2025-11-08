<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css" integrity="sha512-xiunq9hpKsIcz42zt0o2vCo34xV0j6Ny8hgEylN3XBglZDtTZ2nwnqF/Z/TTCc18sGdvCjbFInNd++6q3J0N6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            padding: 2%;
        }
    </style>
</head>

<body>
    <?php if(isset($_SESSION['user_name'])) { ?>
    <h1>Welcome to dashboard</h1>
    <h2>User: <?= $_SESSION['user_name'] ?></h2>
    <a href="logout.php">Logout</a>
    <?php } else { ?>
    <h1>Unknown User</h1>
    <a href="register.php">Register</a>
    OR
    <a href="login.php">Login</a>
    <?php } ?>
</body>
</html>