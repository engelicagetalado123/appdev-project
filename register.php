<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inhabitant_type = $_POST['inhabitant_type'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $civil_status = $_POST['civil_status'];
    $birthdate = $_POST['birthdate'];
    $birthplace = $_POST['birthplace'];
    $citizenship = $_POST['citizenship'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $education = $_POST['education'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // For simplicity, username = email
    $username = $email;

    $stmt = $conn->prepare("INSERT INTO users 
        (inhabitant_type, name, age, sex, civil_status, birthdate, birthplace, citizenship, address, email, contact, education, username, password, role) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'migrant')");
    $stmt->bind_param("ssisssssssssss", $inhabitant_type, $name, $age, $sex, $civil_status, $birthdate, $birthplace, $citizenship, $address, $email, $contact, $education, $username, $password);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Registration successful! <a href='login.php'>Login here</a></p>";
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Migrant Registration</title>
  <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
  <div class="register-container">
    <h2>Migrant Registration</h2>
    <form action="register.php" method="POST">
      <select name="inhabitant_type" required>
        <option value="migrant">Migrant</option>
        <option value="non-migrant">Non-Migrant</option>
      </select>
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="number" name="age" placeholder="Age" required>
      <select name="sex" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
      <input type="text" name="civil_status" placeholder="Civil Status" required>
      <input type="date" name="birthdate" required>
      <input type="text" name="birthplace" placeholder="Birthplace" required>
      <input type="text" name="citizenship" placeholder="Citizenship" required>
      <input type="text" name="address" placeholder="Address" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="text" name="contact" placeholder="Contact Number" required>
      <input type="text" name="education" placeholder="Highest Educational Attainment" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Register</button>
    </form>
    <p>Already registered? <a href="login.php">Login here</a></p>
  </div>
</body>
</html>

