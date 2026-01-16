<?php
session_start();
include 'db.php';

// Only allow admins
if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$request_id = $_POST['request_id'];

if (isset($_POST['approve'])) {
    $sql = "UPDATE cert_requests SET status='approved' WHERE id='$request_id'";
    mysqli_query($conn, $sql);

    // Fetch user info for notification
    $user_sql = "SELECT user_id, resolution_number FROM cert_requests WHERE id='$request_id'";
    $user_res = mysqli_query($conn, $user_sql);
    $user = mysqli_fetch_assoc($user_res);

    // Notify migrant
    $message = "Your certificate request #{$user['resolution_number']} has been approved. Please claim it at the Barangay office.";
    mysqli_query($conn, "INSERT INTO notifications (user_id, message, status) VALUES ('{$user['user_id']}', '$message', 'unread')");

    // Notify admin (optional)
    $admin_message = "Certificate request #{$user['resolution_number']} has been approved.";
    mysqli_query($conn, "INSERT INTO notifications (user_id, message, status) VALUES ('{$_SESSION['user_id']}', '$admin_message', 'unread')");
}

if (isset($_POST['reject'])) {
    $sql = "UPDATE cert_requests SET status='rejected' WHERE id='$request_id'";
    mysqli_query($conn, $sql);

    // Fetch user info for notification
    $user_sql = "SELECT user_id, resolution_number FROM cert_requests WHERE id='$request_id'";
    $user_res = mysqli_query($conn, $user_sql);
    $user = mysqli_fetch_assoc($user_res);

    // Notify migrant
    $message = "Your certificate request #{$user['resolution_number']} has been rejected.";
    mysqli_query($conn, "INSERT INTO notifications (user_id, message, status) VALUES ('{$user['user_id']}', '$message', 'unread')");

    // Notify admin (optional)
    $admin_message = "Certificate request #{$user['resolution_number']} has been rejected.";
    mysqli_query($conn, "INSERT INTO notifications (user_id, message, status) VALUES ('{$_SESSION['user_id']}', '$admin_message', 'unread')");
}

header("Location: admin_dashboard.php");
exit();
?>
