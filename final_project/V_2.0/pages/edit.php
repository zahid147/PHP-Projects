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

$contact_id = $_GET['id'] ?? null;
$stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ? AND user_id = ?");
$stmt->execute([$contact_id, $_SESSION['user_id']]);
$contact = $stmt->fetch();

if (!$contact) die("Contact not found or access denied.");

if(!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['contact'];

    $stmt = $pdo->prepare("UPDATE contacts SET name = ?, email = ?, phone = ? WHERE id = ? AND user_id = ?");
    $stmt->execute([$name, $email, $phone, $contact_id, $_SESSION['user_id']]);

    header('Location: action.php?page=home');
    exit;
}
?>

<div class="center-wrapper">
  <div class="card shadow-lg p-4 center-card">
    <h3 class="text-center mb-4">Edit Contact</h3>
    <form method="POST">
      <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($contact['name']) ?>" required>
      </div>
      <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($contact['email']) ?>" required>
      </div>
      <div class="mb-3">
        <label>Contact</label>
        <input type="text" name="contact" class="form-control" value="<?= htmlspecialchars($contact['phone']) ?>" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Update Info</button>
      <div class="text-center mt-3">
        <a href="home.php">Back to Contacts</a>
      </div>
    </form>
  </div>
</div>

<?php include("footer.php"); ?>
