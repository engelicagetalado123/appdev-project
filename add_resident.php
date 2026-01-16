<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Resident</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/add_residents.css" rel="stylesheet">
</head>
<body class="container py-4">

  <h1 class="mb-4">Add New Resident</h1>

  <form action="save_resident.php" method="POST" class="row g-3">
    <!-- Personal Info -->
    <div class="col-md-4">
      <label>First Name</label>
      <input type="text" name="first_name" class="form-control" required>
    </div>
    <div class="col-md-4">
      <label>Middle Name</label>
      <input type="text" name="middle_name" class="form-control">
    </div>
    <div class="col-md-4">
      <label>Last Name</label>
      <input type="text" name="last_name" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>Age</label>
      <input type="number" name="age" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>Sex</label>
      <select name="sex" class="form-select" required>
        <option value="">Select</option>
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
    <div class="col-md-6">
      <label>Civil Status</label>
      <select name="civil_status" class="form-select" required>
        <option value="">Select</option>
        <option>Single</option>
        <option>Married</option>
        <option>Widowed</option>
        <option>Separated</option>
      </select>
    </div>
    <div class="col-md-6">
      <label>Birthdate</label>
      <input type="date" name="birthdate" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>Birthplace</label>
      <input type="text" name="birthplace" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>Citizenship</label>
      <input type="text" name="citizenship" class="form-control" required>
    </div>

    <!-- Contact Info -->
    <div class="col-md-6">
      <label>Address</label>
      <input type="text" name="address" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>Contact</label>
      <input type="text" name="contact" class="form-control">
    </div>
    <div class="col-md-6">
  <label>Education</label>
  <select name="education" class="form-select">
    <option value="Elementary">Elementary</option>
    <option value="High School">High School</option>
    <option value="Senior High School">Senior High School</option>
    <option value="College Undergraduate">College Undergraduate</option>
    <option value="College Graduate">College Graduate</option>
    <option value="Postgraduate">Postgraduate</option>
    <option value="None">None</option>
  </select>
</div>

    <!-- Classification + Role -->
    <div class="col-md-6">
      <label>Inhabitant Type</label>
      <select name="inhabitant_type" class="form-select" required>
        <option value="">Select</option>
        <option value="resident">Resident</option>
        <option value="migrant">Migrant</option>
      </select>
    </div>
    <div class="col-md-6">
      <label>Role</label>
      <select name="role" class="form-select">
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
    </div>

    <!-- Actions -->
    <div class="col-12">
      <button type="submit" class="btn btn-success">Save Resident</button>
      <a href="barangay_dashboard.php" class="btn btn-secondary">Cancel</a>
    </div>
  </form>

</body>
</html>
