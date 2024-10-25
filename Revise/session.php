<?php
// Code for session.php
require_once('mysqli_connect.php');
session_start();

// Check if 'login_user' key is set in $_SESSION array
if (isset($_SESSION['login_user'])) {
    $username = $_SESSION['login_user'];

    // Query to select username from the appropriate table based on the user type
    // Assuming 'Patient', 'Doctor', and 'Admin' tables for demonstration purposes

    // Check if the user is a patient
    $patient_sql = mysqli_query($dbc, "SELECT id FROM patient WHERE username = '$username'");
    if ($patient_sql) {
        // Fetch the result row as an associative array
        $patient_row = mysqli_fetch_array($patient_sql, MYSQLI_ASSOC);
        if ($patient_row) {
            // Assign the patient ID to $_SESSION['patient_id']
            $_SESSION['patient_id'] = $patient_row['id'];
        }
    } else {
        // Handle query execution failure
        echo "Error executing patient query: " . mysqli_error($dbc);
    }

    // Check if the user is a doctor
    $doctor_sql = mysqli_query($dbc, "SELECT id FROM doctor WHERE username = '$username'");
    if ($doctor_sql) {
        // Fetch the result row as an associative array
        $doctor_row = mysqli_fetch_array($doctor_sql, MYSQLI_ASSOC);
        if ($doctor_row) {
            // Assign the doctor ID to $_SESSION['doctor_id']
            $_SESSION['doctor_id'] = $doctor_row['id'];
        }
    } else {
        // Handle query execution failure
        echo "Error executing doctor query: " . mysqli_error($dbc);
    }

    // Check if the user is an admin
    $admin_sql = mysqli_query($dbc, "SELECT id FROM admin WHERE username = '$username'");
    if ($admin_sql) {
        // Fetch the result row as an associative array
        $admin_row = mysqli_fetch_array($admin_sql, MYSQLI_ASSOC);
        if ($admin_row) {
            // Assign the admin ID to $_SESSION['admin_id']
            $_SESSION['admin_id'] = $admin_row['id'];
        }
    } else {
        // Handle query execution failure
        echo "Error executing admin query: " . mysqli_error($dbc);
    }

} else {
    // Redirect to login page if 'login_user' key is not set
    header("location: viewprofile.php");
    exit(); // Stop further execution of the script
}
?>
