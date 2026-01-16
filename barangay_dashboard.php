<?php include 'db.php'; ?>
<?php if (isset($_GET['deleted'])): ?> <div class="alert alert-danger alert-dismissible fade show" role="alert"> Resident deleted successfully. <button type="button" class="btn-close" data-bs-dismiss="alert"></button> </div> <?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barangay Information System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" />
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1B4v5l9O+...etc"
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/barangay_dashboard.css" />
    <link rel="stylesheet" href="assets/css/home.css" />
    <link rel="stylesheet" href="assets/css/global.css" />
    
</head>
<body>
    <div class="mobile-container ">
        <header>
           <div class="overlay" id="overlay" onclick="closeMenu()"></div> 

            <aside class="drawer" id="drawer">
                <div class="drawer-header">
                    <button class="close-btn" onclick="closeMenu()" aria-label="Close menu"> <i class="fas fa-times"></i> </button>
                    <div class="menu-hero">
                        <img src="./icons/logo1.png" alt="Barangay Logo" class="app-logo" />
                        <div class="main-logo">
                            <span>BARANGAY</span><br />
                            <strong>INFORMATION SYSTEM</strong>
                        </div>
                        <a href="logout.php" class="btn btn-danger">Logout</a><br>
                        <strong>ADMIN</strong>
                    </div>
                </div>

                <nav class="menu-list-container">
                    <ul class="menu-links">
                        <li onclick="window.location.href='admin_dashboard.php'"> <i class="fas fa-bullhorn"></i> Announcements & Events </li>
                        <li onclick="window.location.href='officials.html'"> <i class="fas fa-users"></i> Officials Directory </li>
                        <li><i class="fas fa-comments"></i> Residence Feedback</li> 
                        <li onclick="window.location.href='barangay_dashboard.php'"> <i class="fas fa-university"></i> Barangay Dashboard </li>
                        <li onclick="window.location.href='settings.html'"> <i class="fas fa-cog"></i> Settings </li> 
                    </ul>
                </nav>
            </aside>

            <div class="logo-container">
                <img src="./icons/logo1.png" alt="Barangay Logo" class="app-logo" />
                <div class="logo-text">
                    <span>BARANGAY</span><br />
                    <strong>INFORMATION SYSTEM</strong>
                </div>
            </div>
            
 <!-- Notification Wrapper -->
<div class="notif-wrapper">
  <div class="notification-icon" onclick="openNotifications()">
    <i class="fas fa-bell"></i>
    <span id="notif-count" class="notif-count">0</span>
  </div>

  <!-- Dropdown container -->
  <div id="notif-dropdown" class="notif-dropdown" style="display:none;">
    <!-- notifications will be loaded here -->
  </div>
</div>




            <div class="menu-icon" onclick="openMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </header>

        <!-- Sidebar -->
  <aside class="sidebar responsive-sidebar">
  <ul>
    <li><a href="barangay_dashboard.php?page=residents" class="<?php echo basename($_SERVER['PHP_SELF']) == 'barangay_dashboard.php' ? 'active' : ''; ?>">
  <i class="fas fa-users"></i> <span class="label">Residents</span>
</a></li>

    <li><a href="households.php?page=households"><i class="fas fa-home"></i> <span class="label">Households</span></a></li>
    <li><a href="cert_requests_dashboard.php"><i class="fas fa-file-alt"></i> <span class="label">Certificate Requests</span></a></li>
    <li><a href="reports.php"><i class="fas fa-chart-bar"></i> <span class="label">Reports</span></a></li>
  </ul>
</aside>
    


  <!-- Main Content -->
  <main class="content">
 
<h1>Residents</h1>
<!-- Add Resident Button -->
<button class="btn btn-success mb-3" onclick="window.location.href='add_resident.php'">
  <i class="fas fa-user-plus"></i> Add Resident
</button>

<div class="table-responsive">
<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Address</th>
      <th>Birthdate</th>
      <th>Birthplace</th>
      <th>Contact</th>
      <th>Age</th>
      <th>Sex</th>
      <th>Civil Status</th>
      <th>Education</th>
      <th>Email</th>
      <th>Citizenship</th>
      <th>Type</th>
      <th>Role</th>
      <th>Actions</th>          
    </tr>
  </thead>
  <tbody>
    <?php
    $query = "SELECT * FROM users";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $fullName = "{$row['first_name']} {$row['middle_name']} {$row['last_name']}";
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$fullName}</td>
                <td>{$row['address']}</td>
                <td>{$row['birthdate']}</td>
                <td>{$row['birthplace']}</td>
                <td>{$row['contact']}</td>
                <td>{$row['age']}</td>
                <td>{$row['sex']}</td>
                <td>{$row['civil_status']}</td>
                <td>{$row['education']}</td>
                <td>{$row['email']}</td>
                <td>{$row['citizenship']}</td>
                <td>{$row['inhabitant_type']}</td>
                <td>{$row['role']}</td>
                <td> <button class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#editResidentModal' data-id='" . $row['id'] . "'>Edit</button> <form action='residents/delete.php' method='POST' style='display:inline;' onsubmit='return confirm(\"Are you sure you want to delete this resident?\");'> <input type='hidden' name='id' value='" . $row['id'] . "'> <button type='submit' class='btn btn-sm btn-danger'>Delete</button> </form> </td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='11'>No residents found</td></tr>";
    }
    ?>
  </tbody>
</table>
</div>
<!-- Add Resident Modal -->
<div class="modal fade" id="addResidentModal" tabindex="-1" aria-labelledby="addResidentLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="residents/add_resident.php" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addResidentLabel">Add Resident</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body row g-3">
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
            <label>Birthdate</label>
            <input type="date" name="birthdate" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label>Contact</label>
            <input type="text" name="contact" class="form-control">
          </div>
          <div class="col-md-6">
            <label>Address</label>
            <input type="text" name="address" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label>Sex</label>
            <select name="sex" class="form-select">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="col-md-6">
            <label>Civil Status</label>
            <select name="civil_status" class="form-select">
              <option value="Single">Single</option>
              <option value="Married">Married</option>
              <option value="Widowed">Widowed</option>
            </select>
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
          <div class="col-md-6">
  <label>Inhabitant Type</label>
  <select name="Inhabitant_type" class="form-select">
    <option value="migrant">Migrant</option>
    <option value="non-migrant">Non-Migrant</option>
  </select>
</div>
          <div class="col-md-6">
  <label>Role</label>
  <select name="role" class="form-select">
    <option value="user">User</option>
    <option value="admin">Admin</option>
  </select>
</div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Add Resident</button>
        </div>
      </div>
    </form>
  </div>
</div>

</main>



        <footer>
            <div class="social-icons">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
            </div>
            <div class="contact">
                <i class="fas fa-phone"></i>    
                <div>
                    <strong>+639123456789</strong>
                    <span>Call Us</span>
                </div>
            </div>
        </footer>
    </div>
    </div>
    
   <script>
  const addModal = document.getElementById('addResidentModal');

  addModal.addEventListener('show.bs.modal', () => {
    document.getElementById('overlay').style.visibility = 'hidden';
  });

  addModal.addEventListener('hidden.bs.modal', () => {
    document.getElementById('overlay').style.visibility = 'visible';
  });
</script>


    
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="assets/js/menu.js"></script>
    <script defer src="assets/js/notifications.js"></script>
</body>
</html>