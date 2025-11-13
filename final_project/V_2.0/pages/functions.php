<?php
include('db.php');
session_start();

function getContacts() {
    global $pdo;
    if(!isset($_SESSION['user_id'])) return [];
    $stmt = $pdo->prepare("SELECT * FROM contacts WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetchAll();
}
?>
