<?php include("includes/header.php"); ?>
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
    } else {
        $users = json_decode(file_get_contents($file), true);

        foreach($users as $user) {
            if($user['username'] == $username) {
                $message = "User $username already exists";
            } elseif ($user['email'] == $email) {
                $message = "Email $email already exists";
            }
        }

        if($message === '') {
            $users[] = [
                'id' => time(),
                'username' => $username,
                'email' => $email,
                'password' => password_hash($pass, PASSWORD_DEFAULT)
            ];
            file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
            header('location: login.php');
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include("includes/footer.php"); ?>
