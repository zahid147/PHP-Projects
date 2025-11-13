<?php include("includes/header.php"); ?>
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
        $message = 'User not found, please register first!';
        session_unset();
    }
}
?>
<div class="center-wrapper">
<div class="card shadow-lg p-4 center-card">
  <h3 class="text-center mb-4">Login</h3>
  <?php if(!empty($message)): ?>
    <div class="alert alert-danger text-center"><?= htmlspecialchars($message) ?></div>
  <?php endif; ?>
  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="Email" class="form-control" placeholder="Enter email" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="Pass" class="form-control" placeholder="Enter password" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
    <div class="text-center mt-3">
      <a href="register.php">Create an account</a>
    </div>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</div>
<?php include("includes/footer.php"); ?>
