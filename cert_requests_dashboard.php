<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$query = "SELECT * FROM cert_requests ORDER BY application_date DESC";
$result = $conn->query($query);
?>
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
 
<h1 class="mb-4">Certificate Requests</h1>
<div class="table-responsive">
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Application Date</th>
        <th>Certificate Type</th>
        <th>Purpose</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['user_id'] ?></td>
            <td><?= "{$row['first_name']} {$row['middle_name']} {$row['last_name']}" ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['application_date'] ?></td>
            <td><?= $row['cert_type'] ?></td>
            <td><?= $row['purpose'] ?></td>
            <td><?= ucfirst($row['status']) ?></td>
            <td>
              <?php if ($row['status'] === 'pending'): ?>
                <form action="cert_request_action.php" method="POST" style="display:inline;">
                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                  <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">Approve</button>
                  <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Reject</button>
                </form>
              <?php else: ?>
                <span class="text-muted">No actions</span>
              <?php endif; ?>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="9">No certificate requests found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
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