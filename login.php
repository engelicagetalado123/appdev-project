
<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: migrant_dashboard.php");
        }
        exit();
    } else {
        echo "<p style='color:red;'>Invalid login credentials.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <!-- Link your CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <div class="login-container">
  <button onclick="window.location.href='index.php'" class="btn-back">← Back</button>
    <h2>Login</h2>
    <form action="login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <p>Not registered? <a href="register.php">Register as Migrant</a></p>
  </div>
</body>
</html>
