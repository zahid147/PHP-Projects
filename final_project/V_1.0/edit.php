<?php include("includes/header.php"); ?>
<?php
include 'functions.php';
$contactInfo = getContacts();
$user_id = $_GET['id'];
$user_data = $contactInfo[$user_id];

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
    header('location: contacts.php');
}
?>

<div class="center-wrapper">
  <div class="card shadow-lg p-4 center-card">
    <h3 class="text-center mb-4">Edit Contact</h3>
    <form action="" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($user_data['name']) ?>" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user_data['email']) ?>" required>
      </div>
      <div class="mb-3">
        <label for="contact" class="form-label">Contact</label>
        <input type="text" name="contact" id="contact" class="form-control" value="<?= htmlspecialchars($user_data['contact']) ?>" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Update Info</button>
      <div class="text-center mt-3">
        <a href="index.php" class="text-decoration-none">Show Contacts</a>
      </div>
    </form>
  </div>
</div>
<?php include("includes/footer.php"); ?>
