<?php include("includes/header.php"); ?>
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
    header('location: contacts.php');
}
?>
<div class="center-wrapper">
  <div class="card shadow-lg p-4 center-card">
    <h3 class="text-center mb-4">Add Contact</h3>
    <form action="" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label for="contact" class="form-label">Contact</label>
        <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter your contact" required>
      </div>
      <button type="submit" class="btn btn-success w-100">Save Info</button>
      <div class="text-center mt-3">
        <a href="index.php" class="text-decoration-none">Back to Contacts</a>
      </div>
    </form>
  </div>
</div>
<?php include("includes/footer.php"); ?>
