<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>
<h2>Welcome Admin!</h2>
<p>You can manage users and requests here.</p>
