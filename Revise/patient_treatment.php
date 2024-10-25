<?php
require_once('mysqli_connect.php');
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit();
}

// Get logged-in patient's ID
$loggedInUser = $_SESSION['login_user'];

// Database connection
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root";
$password = "";
$dbname = "rehab";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve treatment plan for the logged-in patient
$sql = "SELECT * FROM Treatment WHERE patient_id = (
    SELECT id FROM Patient WHERE username = '$loggedInUser'
)";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Treatment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333; /* Text color */
        }

        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            text-align: center;
            color: #007bff; /* Heading color */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333; /* Table heading color */
            font-weight: bold;
        }

        .no-treatment {
            text-align: center;
            font-style: italic;
            color: #999; /* Message color */
        }

        /* Back to Profile button */
        .button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            margin-top: 20px; /* Added margin top */
            margin-left: 20px; /* Moved button to the left */
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3;
        }

        /* Background animation */
        .lottie-animation {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 200px; /* Adjust the width */
            height: auto; /* Automatically adjust height */
            z-index: -1; /* Place the animation behind other content */
        }

    </style>
</head>
<body>
    <a href="patient_welcome.php" class="button">Back to Profile</a>
    <div class="container">
        <h2>Your Treatment Plans:</h2>
        <table>
            <thead>
                <tr>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["start_date"]."</td><td>".$row["end_date"]."</td><td>".$row["notes"]."</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='no-treatment'>No treatment plan found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <!-- Lottie animation for background -->
    <div class="lottie-animation" id="lottie-animation"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.7/lottie.min.js"></script>
    <script>
        var animation = bodymovin.loadAnimation({
            container: document.getElementById('lottie-animation'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'img/Animation - 1715054754937.json' // Path to your animation JSON file
        });
    </script>
</body>
</html>
