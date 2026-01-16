<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // can be email or contact
    $password = $_POST['password'];

    // Check if username matches email OR contact
    $stmt = $conn->prepare("SELECT id, email, contact, password, role FROM users WHERE email=? OR contact=?");
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['email']; // store email as canonical username
        $_SESSION['role'] = $user['role'];

        if ($user['role'] === 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: migrant_dashboard.php");
        }
        exit();
    } else {
       $error = "Invalid login credentials.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <button onclick="window.location.href='index.php'" class="btn-back">← Back</button>
  <div class="login-container">
    <h2>Login</h2>
    <!----Error---->
     <?php if (!empty($error)): ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="login.php" method="POST">
      <input type="text" name="username" class="form-control mb-2" placeholder="Email or Contact Number" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <p>Not registered? <a href="register.php">Register as Migrant</a></p>
  </div>
</body>
</html>
