<?php
include("header.php");
include('db.php');

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['Username']));
    $email = trim($_POST['Email']);
    $pass = $_POST['Pass'];
    $conPass = $_POST['Confirm_pass'];

    if ($pass !== $conPass) {
        $message = 'Passwords do not match!';
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE name = ? OR email = ?");
        $stmt->execute([$username, $email]);
        $user = $stmt->fetch();

        if ($user) {
            $message = ($user['name'] === $username) ? "User $username already exists" : "Email $email already exists";
        } else {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hash]);
            header('Location: action.php?page=login');
            exit;
        }
    }
}
?>

<div class="center-wrapper">
  <div class="card shadow-lg p-4 center-card">
    <h3 class="text-center mb-4">Register</h3>
    <?php if(!empty($message)): ?>
      <div class="alert alert-info text-center"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="Username" class="form-control" placeholder="Enter username" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="Email" class="form-control" placeholder="Enter email" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="Pass" class="form-control" placeholder="Enter password" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="Confirm_pass" class="form-control" placeholder="Confirm password" required>
      </div>
      <button type="submit" class="btn btn-success w-100">Register</button>
      <div class="text-center mt-3">
        <a href="login.php">Already have an account?</a>
      </div>
    </form>
  </div>
</div>

<?php include("footer.php"); ?>
