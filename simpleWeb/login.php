<?php
$file = 'users.json';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['Email']);
    $pass = $_POST['Pass'];

    $message = '';
    $users = json_decode(file_get_contents($file), true);

    $found = false;
    session_start();
    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $found = true;
            if (password_verify($pass, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['username'];
                $_SESSION['user_email'] = $user['email'];
                $message = 'Login success!';
                header('location: dashboard.php');
                exit;
            } else {
                $message = 'Password is incorrect!';
                session_unset();
            }
            break;
        }
    }
    if (!$found) {
        $message = 'User not found register first!';
        session_unset();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css" integrity="sha512-xiunq9hpKsIcz42zt0o2vCo34xV0j6Ny8hgEylN3XBglZDtTZ2nwnqF/Z/TTCc18sGdvCjbFInNd++6q3J0N6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            padding: 2%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <p style="color: red;"><?= $message ?></p>
        <form method="POST">
            <input type="email" name="Email" placeholder="Enter email" required>
            <input type="password" name="Pass" placeholder="Enter password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>