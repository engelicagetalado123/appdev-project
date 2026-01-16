<?php
session_start();
include 'db.php'; // your DB connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first = $_POST['first_name'];
    $middle = $_POST['middle_name'];
    $last = $_POST['last_name'];
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
    $role = $_POST['role'];
    $inhabitant_type = $_POST['inhabitant_type'];

    // Auto-generate username and default password
    $username = $email;
    $default_password = password_hash("default123", PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users 
        (inhabitant_type, first_name, middle_name, last_name, age, sex, civil_status, birthdate, birthplace, citizenship, address, email, contact, education, username, password, role) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "sssssssssssssssss",
        $inhabitant_type, $first, $middle, $last, $age, $sex, $civil_status, $birthdate, $birthplace,
        $citizenship, $address, $email, $contact, $education, $username, $default_password, $role
    );

    if ($stmt->execute()) {
        header("Location: barangay_dashboard.php?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
