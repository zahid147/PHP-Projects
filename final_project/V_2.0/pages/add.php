<?php
include("header.php");
include('db.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['user_id'])) {
    header('Location: action.php?page=');
    exit;
}

if(!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['contact'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO contacts (user_id, name, phone, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$user_id, $name, $phone, $email]);

    header('Location: action.php?page=home');
    exit;
}
?>

<div class="center-wrapper">
  <div class="card shadow-lg p-4 center-card">
    <h3 class="text-center mb-4">Add Contact</h3>
    <form method="POST">
      <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter name" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
      </div>
      <div class="mb-3">
        <label>Contact</label>
        <input type="text" name="contact" class="form-control" placeholder="Enter contact" required>
      </div>
      <button type="submit" class="btn btn-success w-100">Save Info</button>
      <div class="text-center mt-3">
        <a href="home.php">Back to Contacts</a>
      </div>
    </form>
  </div>
</div>

<?php include("footer.php"); ?>
