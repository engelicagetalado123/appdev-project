<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];

// Count unread notifications
$sql = "SELECT COUNT(*) as unread FROM notifications WHERE user_id='$user_id' AND status='unread'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

echo isset($row['unread']) ? $row['unread'] : 0;
?>
