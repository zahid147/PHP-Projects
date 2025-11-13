<?php
include("header.php");
include('db.php');
if(empty($_SESSION)) session_start();

if(!isset($_SESSION['user_id'])) {
    header('Location: action.php?page=login');
    exit;
}

$user_id = $_SESSION['user_id'];

// Delete contact
if(!empty($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = ? AND user_id = ?");
    $stmt->execute([$_GET['id'], $user_id]);
    header('Location: home.php');
    exit;
}

// Fetch contacts
$stmt = $pdo->prepare("SELECT * FROM contacts WHERE user_id = ?");
$stmt->execute([$user_id]);
$contactInfo = $stmt->fetchAll();
?>

<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Contact List</h2>
    <a href="add.php" class="btn btn-primary">+ Add Contact</a>
  </div>

  <?php if(empty($contactInfo)) { ?>
    <div class="alert alert-warning text-center">No contact found!</div>
  <?php } else { ?>
    <div class="card shadow-lg">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark text-center">
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $sl = 1; foreach($contactInfo as $contact) { ?>
                <tr>
                  <td class="text-center"><?= $sl++ ?></td>
                  <td><?= htmlspecialchars($contact['name']) ?></td>
                  <td><?= htmlspecialchars($contact['email']) ?></td>
                  <td><?= htmlspecialchars($contact['phone']) ?></td>
                  <td class="text-center">
                    <a href="edit.php?id=<?= $contact['id'] ?>" class="btn btn-sm btn-warning me-1">Edit</a>
                    <a href="home.php?id=<?= $contact['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php } ?>
</div>

<?php include("footer.php"); ?>
