<?php
// Code for session.php
require_once('mysqli_connect.php');
session_start();

// Check if 'login_user' key is set in $_SESSION array
if (isset($_SESSION['login_user'])) {
    $username = $_SESSION['login_user'];

    // Determine the type of user based on the session variable or your database schema
    // For example, if the user type is stored in the session, you can retrieve it here.

    // Query to select username from the appropriate table based on the user type
    // Assuming 'Doctor' table for demonstration purposes
    $ses_sql = mysqli_query($dbc, "SELECT * FROM admin WHERE username = '$username'");
    
    if ($ses_sql) {
        // Fetch the result row as an associative array
        $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

        // Assign the username to $login_session
        $_SESSION['admin_id'] = $row['id'];
    } else {
        // Handle query execution failure
        echo "Error executing query: " . mysqli_error($dbc);
    }
} else {
    // Redirect to login page if 'login_user' key is not set
    header("location: viewadminprofile.php");
    exit(); // Stop further execution of the script
}
?>