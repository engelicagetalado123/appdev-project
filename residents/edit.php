<?php
include '../db.php';

$id = $_GET['id'];

// Fetch user
$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $civil_status = $_POST['civil_status'];

    $update = $conn->prepare("
        UPDATE users 
        SET first_name=?, last_name=?, contact=?, address=?, civil_status=?
        WHERE id=?
    ");

    $update->bind_param("sssssi",
        $first_name,
        $last_name,
        $contact,
        $address,
        $civil_status,
        $id
    );

    if ($update->execute()) {
        header("Location: user_list.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Resident</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h2>Edit Resident</h2>

  <form method="POST">
    <input class="form-control mb-2" name="first_name" value="<?= $user['first_name'] ?>" required>
    <input class="form-control mb-2" name="last_name" value="<?= $user['last_name'] ?>" required>
    <input class="form-control mb-2" name="contact" value="<?= $user['contact'] ?>" required>
    <input class="form-control mb-2" name="address" value="<?= $user['address'] ?>" required>

    <select class="form-control mb-3" name="civil_status">
      <option <?= $user['civil_status']=='Single'?'selected':'' ?>>Single</option>
      <option <?= $user['civil_status']=='Married'?'selected':'' ?>>Married</option>
      <option <?= $user['civil_status']=='Widowed'?'selected':'' ?>>Widowed</option>
    </select>

    <button class="btn btn-success">Save Changes</button>
    <a href="user_list.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>

</body>
</html>
