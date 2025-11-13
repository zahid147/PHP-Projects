<?php
include("header.php");
include('db.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['Email']);
    $pass = $_POST['Pass'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        header('Location: action.php?page=');
        exit;
    } else {
        $message = $user ? 'Password is incorrect!' : 'User not found, please register first!';
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
</div>

<?php include("footer.php"); ?>
