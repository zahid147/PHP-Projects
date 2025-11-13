<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact App</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <style>
    body {
      background-color: #f8f9fa;
      padding-top: 70px;
      padding-bottom: 70px;
    }

    .center-wrapper {
      min-height: calc(100vh - 140px);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .center-card {
      width: 100%;
      max-width: 600px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="action.php?page=">Simple Contact</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="ms-auto d-flex align-items-center gap-2">
          <?php if (isset($_SESSION['user_id'])): ?>
            <a class="btn btn-outline-light" href="action.php?page=">Dashboard</a>
            <a class="btn btn-outline-light" href="action.php?page=home">Contacts</a>
            <a class="btn btn-danger" href="action.php?page=logout">Logout</a>
          <?php else: ?>
            <a class="btn btn-primary" href="action.php?page=login">Login</a>
            <a class="btn btn-success" href="action.php?page=register">Register</a>
          <?php endif; ?>
        </div>
      </div>
  </nav>
  <div class="container mt-4">