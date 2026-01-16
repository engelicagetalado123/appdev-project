<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT id, message, created_at, status 
        FROM notifications 
        WHERE user_id='$user_id' 
        ORDER BY created_at DESC LIMIT 10";
$result = mysqli_query($conn, $sql);

echo "<ul class='notif-list'>";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $statusClass = $row['status'] === 'unread' ? 'unread' : 'read'; 
        echo "<li class='$statusClass' data-id='" . $row['id'] . "'>" . htmlspecialchars($row['message']) . "<small>" . htmlspecialchars($row['created_at']) . "</small>" . "<button class='delete-btn' data-id='" . $row['id'] . "'>×</button>" . "</li>"; }
} else {
    echo "<li class='no-notif'>You have no notifications.</li>";
}
echo "</ul>";
?>
