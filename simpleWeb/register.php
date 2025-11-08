<?php
$file = 'users.json';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['Username']));
    $email = trim($_POST['Email']);
    $pass = $_POST['Pass'];
    $conPass = $_POST['Confirm_pass'];

    $message = '';
    if($pass !== $conPass) {
        $message = 'Passwords do not match!';
    }
    else {
        $users = json_decode(file_get_contents($file),true);

        foreach($users as $user) {
            if($user['username'] == $username) {
                $message = "User $username already exists";
            }
            elseif ($user['email'] == $email) {
                $message = "Email $email already exists";
            }
        }

        if($message === '') {
            $users[] = [
                'id' => time(),
                'username' => $username,
                'email' => $email,
                'password' => password_hash($pass,PASSWORD_DEFAULT)
            ];

            file_put_contents($file,json_encode($users,JSON_PRETTY_PRINT));
            $message = 'Registration success';
            header('location: login.php');
            exit;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css" integrity="sha512-xiunq9hpKsIcz42zt0o2vCo34xV0j6Ny8hgEylN3XBglZDtTZ2nwnqF/Z/TTCc18sGdvCjbFInNd++6q3J0N6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            padding: 2%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <p style="color: green;"><?= $message ?></p>
        <form method="POST">
            <input type="text" name="Username" placeholder="Enter username" required>
            <input type="email" name="Email" placeholder="Enter email" required>
            <input type="password" name="Pass" placeholder="Enter password" required>
            <input type="password" name="Confirm_pass" placeholder="Confirm password" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>