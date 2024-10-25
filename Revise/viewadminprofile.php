<?php
include("menue3.html");
require_once('adminsession.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Your Profile</title>
<style>

    .avatar {
    vertical-align: middle;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    }

    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #ffffff, #add8e6);


    }
    .profile-container {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .profile-heading {
        text-align: center;
        margin-bottom: 20px;
    }
    .profile-info {
        margin-bottom: 10px;
    }
    .profile-label {
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="profile-container">
    <h1 class="profile-heading">Your Profile</h1>
    <img src="img\avatar.jpg" alt="Avatar" class="avatar">

    <?php
    // Retrieve the patient's ID from the session
    $admin_id = $_SESSION['admin_id'];

    // Check if the patient ID is set
    if(isset($admin_id)) {
        // Create your database connection (already done in session.php)
        // $dbc is assumed to be the database connection object

        // Construct your SQL query using the patient's ID
        $sql = "SELECT * FROM admin WHERE id='$admin_id'";
        
        // Execute the query
        $result = $dbc->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='profile-info'>";
                echo "<p class='profile-label'>Name:</p> <p>" . $row["name"]."</p>";
                echo "<p class='profile-label'>Email:</p> <p>" . $row["email"]."</p>";
                echo "<p class='profile-label'>Your phone number:</p> <p>" . $row["phone"]."</p>";
                echo "<p class='profile-label'>Your ID:</p> <p>" . $row["id"]."</p>";

                echo "</div>";
            }
        } else {
            echo "<p class='profile-info'>No results found</p>";
        }
        
        // Close the database connection
        $dbc->close();
    } else {
        // Handle the case where the patient ID is not set in the session
        echo "<p class='profile-info'>Admin ID not found in session.</p>";
    }
    ?>
</div>
</body>
</html>