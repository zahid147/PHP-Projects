<?php include("includes/header.php"); ?>
<?php

session_start();

?>

<?php if(isset($_SESSION['user_name'])) { ?>
<h1>Welcome to dashboard</h1>
<h2>User: <?= $_SESSION['user_name'] ?></h2>
<?php } else { ?>
<h1>Unknown User</h1>
<a href="register.php">Register</a>
OR
<a href="login.php">Login</a>
<?php } ?>

<?php include("includes/footer.php"); ?>