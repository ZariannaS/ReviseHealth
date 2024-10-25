<?php
require_once('session.php');
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
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        body {
            font-family: Arial, sans-serif;
            background: white;
            margin: 0;
            padding: 0;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profile-container {
            width: 80%;
            max-width: 600px;
            padding: 40px;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-heading {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
        }

        .profile-info {
            margin-bottom: 20px;
            font-size: 18px;
        }

        .profile-label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Back button styles */
        .back-button {
            position: absolute;
            top: 20px;
            right: 40px; /* Adjusted right value */
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Back button -->
    <button class="back-button" onclick="goBack()">Back</button>

    <div class="profile-container">
    <h1 class="profile-heading">Your Profile</h1>
    <img src="img\doc.png" alt="doc" class="doc">

    <?php
    // Retrieve the patient's ID from the session
    $doctor_id = $_SESSION['doctor_id'];

    // Check if the patient ID is set
    if(isset($doctor_id)) {
        // Create your database connection (already done in session.php)
        // $dbc is assumed to be the database connection object

        // Construct your SQL query using the patient's ID
        $sql = "SELECT * FROM Doctor WHERE id='$doctor_id'";
        
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
        echo "<p class='profile-info'>Doctor ID not found in session.</p>";
    }
    ?>
</div>

    <!-- JavaScript function to go back to the previous page -->
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
