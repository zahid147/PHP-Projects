<?php
include 'functions.php';
if(!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $id = time();

    $contactInfo = getContacts();

    $contactInfo[$id] = [
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
    <title>Add Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Contact add page</h1>

    <div class="container">

        <form action="" method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Enter your name">

            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Enter your email">

            <label for="contact">Contact</label>
            <input type="text" name="contact" placeholder="Enter your contact">

            <button type="submit">Save Info</button>
        </form>
    </div>
</body>
</html>