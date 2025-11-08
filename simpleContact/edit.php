<?php
include 'functions.php';
$contactInfo = getContacts();

$user_id = $_GET['id'];
$user_data = $contactInfo[$user_id];

// echo '<pre>';
// print_r($contactInfo[$user_id]);
// echo '</pre>';

if(!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $contactInfo[$user_id] = [
        'name' => $name,
        'email' => $email,
        'contact' => $contact
    ];

    putContacts($contactInfo);
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact edit page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Edit Contact</h1>

    <div class="container">

        <form action="" method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter your name" value="<?= $user_data['name'] ?>">

            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Enter your email" value="<?= $user_data['email'] ?>">

            <label for="contact">Contact</label>
            <input type="text" name="contact" placeholder="Enter your contact" value="<?= $user_data['contact'] ?>">

            <button type="submit">Update Info</button>
        </form>
        <a href="index.php">Show Contacts</a>
    </div>
</body>
</html>