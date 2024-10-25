<?php
require_once('mysqli_connect.php');
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit();
}

// Database connection
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root";
$password = "";
$dbname = "rehab";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve all appointments
$sql = "SELECT Doctor.name AS doctor_name, Patient.name AS patient_name, RequestAppointment.date, RequestAppointment.time
        FROM RequestAppointment
        INNER JOIN Doctor ON RequestAppointment.doctor_id = Doctor.id
        INNER JOIN Patient ON RequestAppointment.patient_id = Patient.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.7/lottie.min.js"></script>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
            color: #007bff; /* Blue color */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .no-appointments {
            text-align: center;
            font-style: italic;
            color: #999;
        }

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
    <a href="doctor_welcome.php" class="button">Back to Profile</a>
    <div class="container">
        <h2>All Appointments:</h2>
        <table>
            <thead>
                <tr>
                    <th>Doctor</th>
                    <th>Patient</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["doctor_name"]."</td><td>".$row["patient_name"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='no-appointments'>No appointments found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
     <!-- Lottie animation for background -->
     <div class="lottie-animation" id="lottie-animation"></div>
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
