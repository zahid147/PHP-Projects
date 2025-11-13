<?php include("header.php"); ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="container mt-5">
    <?php if (isset($_SESSION['user_name'])) { ?>
        <div class="text-center">
            <div class="card shadow-lg border-0 mx-auto" style="max-width: 500px;">
                <div class="card-body p-5">
                    <h1 class="text-primary mb-3 fw-bold">Welcome to Your Dashboard</h1>
                    <h4 class="text-secondary mb-4">👤 User: <span class="text-dark"><?= htmlspecialchars($_SESSION['user_name']) ?></span></h4>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="text-center">
            <div class="card shadow-lg border-0 mx-auto" style="max-width: 500px;">
                <div class="card-body p-5">
                    <h1 class="text-danger mb-3 fw-bold">Unknown User</h1>
                    <p class="text-muted mb-4">Please register or log in to access your dashboard.</p>
                    <a href="action.php?page=register" class="btn btn-success btn-lg me-2">
                        <i class="bi bi-person-plus"></i> Register
                    </a>
                    <a href="action.php?page=login" class="btn btn-primary btn-lg">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php include("footer.php"); ?>
