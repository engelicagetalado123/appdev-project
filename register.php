<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inhabitant_type = $_POST['inhabitant_type'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
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

    $username = $email;

    // Check if email already exists
$check = $conn->prepare("SELECT id FROM users WHERE email=?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    // Check if email is registered
    $error = "Email already registered.";
    $check->close();
}
 else {
     $check->close();
    $stmt = $conn->prepare("INSERT INTO users 
        (inhabitant_type, first_name, middle_name, last_name, age, sex, civil_status, birthdate, birthplace, citizenship, address, email, contact, education, username, password, role) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'migrant')");


    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "ssssisssssssssss",
        $inhabitant_type,
        $first_name, 
        $middle_name, 
        $last_name,
        $age,
        $sex,
        $civil_status,
        $birthdate,
        $birthplace,
        $citizenship,
        $address,
        $email,
        $contact,
        $education,
        $username,
        $password
    );

    if ($stmt->execute()) {
        // Redirect to login modal with success flag
        header("Location: index.php?login=registered");
        exit();
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }
}

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      <input type="text" name="first_name" placeholder="First Name" required>
      <input type="text" name="middle_name" placeholder="Middle Name">
      <input type="text" name="last_name" placeholder="Last Name" required>
      <input type="number" name="age" placeholder="Age" required>
      <select name="sex" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
      <select name="civil_status" required>
        <option value="" disabled selected>Select Civil Status</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Widowed">Widowed</option>
        <option value="Separated">Separated</option>
        <option value="Divorced">Divorced</option>
      </select>
      <input type="date" name="birthdate" required>
      <input type="text" name="birthplace" placeholder="Birth Place: e.g., Iloilo City, Philippines" required>
      <select name="citizenship" required>
        <option value="" disabled selected>Select Citizenship</option>
        <option value="Filipino">Filipino</option>
        <option value="American">American</option>
        <option value="Chinese">Chinese</option>
        <option value="Japanese">Japanese</option>
        <option value="Korean">Korean</option>
        <option value="Other">Other</option>
      </select>
      <input type="text" name="address" placeholder="Address" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="text" name="contact" 
       placeholder="Contact Number" 
       required 
       pattern="[0-9]{10,11}" 
       title="Enter a valid 10-11 digit number">

      <select name="education" required>
        <option value="" disabled selected>Select Highest Educational Attainment</option>
        <option value="Elementary Graduate">Elementary Graduate</option>
        <option value="High School Graduate">High School Graduate</option>
        <option value="Vocational">Vocational</option>
        <option value="College Undergraduate">College Undergraduate</option>
        <option value="College Graduate">College Graduate</option>
        <option value="Postgraduate">Postgraduate (Master’s/Doctorate)</option>
      </select>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Register</button>
    </form>
    <p>Already registered? 
   <a href="index.php?login">Back to Login</a>
    </p>
  </div>
</body>
</html>

