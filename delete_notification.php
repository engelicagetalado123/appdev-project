<?php
session_start();
include 'db.php';

if (isset($_POST['id'])) {
    $notif_id = intval($_POST['id']);
    $user_id = $_SESSION['user_id']; // ensure user owns this notification

    $sql = "DELETE FROM notifications WHERE id='$notif_id' AND user_id='$user_id'";
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
