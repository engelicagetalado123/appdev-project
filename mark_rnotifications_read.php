<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];

// Mark all unread notifications as read
$sql = "UPDATE notifications SET status='read' WHERE user_id='$user_id' AND status='unread'";
mysqli_query($conn, $sql);
?>
