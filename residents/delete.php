<?php
session_start();
include '../db.php'; // DB connection

// Only admins can delete
if ($_SESSION['role'] !== 'admin') {
    die("Unauthorized access.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Delete cert_requests first
$stmt1 = $conn->prepare("DELETE FROM cert_requests WHERE user_id = ?");
$stmt1->bind_param("i", $id);
$stmt1->execute();

// Then delete user
$stmt2 = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt2->bind_param("i", $id);
$stmt2->execute();
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../barangay_dashboard.php?deleted=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
