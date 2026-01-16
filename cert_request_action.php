<?php
session_start();
include 'db.php';

if ($_SESSION['role'] !== 'admin') {
    die("Unauthorized access.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $action = $_POST['action'];

    if ($action === 'approve' || $action === 'reject') {
        $stmt = $conn->prepare("UPDATE cert_requests SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $action, $id);
        $stmt->execute();
    }

    header("Location: cert_requests_dashboard.php");
    exit();
}
?>
