<?php
session_start();
include 'db.php';

if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $application_date = $_POST['application_date'];
    $cert_type = $_POST['cert_type'];
    $purpose = $_POST['purpose'];

    // Get current year
    $current_year = date("Y");

    // Count how many requests this user has made this year
    $sql_count = "SELECT COUNT(*) as total 
                  FROM cert_requests 
                  WHERE user_id = '$user_id' 
                  AND YEAR(application_date) = '$current_year'";
    $result = mysqli_query($conn, $sql_count);
    $row = mysqli_fetch_assoc($result);
    $count = $row['total'] + 1; // next request number

    // Format as 3 digits (e.g., 001, 002, 005)
    $resolution_number = str_pad($count, 3, "0", STR_PAD_LEFT);

    // Insert request with resolution_number
    $insert = "INSERT INTO cert_requests 
               (user_id, first_name, middle_name, last_name, address, application_date, cert_type, purpose, status, resolution_number) 
               VALUES 
               ('$user_id', '$first_name', '$middle_name', '$last_name', '$address', '$application_date', '$cert_type', '$purpose', 'pending', '$resolution_number')";

    if (mysqli_query($conn, $insert)) {
        // Notify admin(s)
        $admin_message = "New certificate request #$resolution_number submitted by $first_name $last_name.";
        
        // If you only have one admin with id=1:
        $admin_id = 2;
        mysqli_query($conn, "INSERT INTO notifications (user_id, message, status, created_at)
                             VALUES ('$admin_id', '$admin_message', 'unread', NOW())");

        // If you want ALL admins notified:
        /*
        $admins = mysqli_query($conn, "SELECT id FROM users WHERE role='admin'");
        while ($admin = mysqli_fetch_assoc($admins)) {
            $aid = $admin['id'];
            mysqli_query($conn, "INSERT INTO notifications (user_id, message, status, created_at)
                                 VALUES ('$aid', '$admin_message', 'unread', NOW())");
        }
        */

        echo "<script>alert('Request submitted successfully! Resolution No: $resolution_number'); window.location.href='migrant_dashboard.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
