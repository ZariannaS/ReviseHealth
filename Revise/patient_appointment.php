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

// SQL query to retrieve appointments for the logged-in patient
$sql = "SELECT Doctor.name AS doctor_name, Patient.name AS patient_name, RequestAppointment.date, RequestAppointment.time
        FROM RequestAppointment
        INNER JOIN Doctor ON RequestAppointment.doctor_id = Doctor.id
        INNER JOIN Patient ON RequestAppointment.patient_id = Patient.id
        WHERE Patient.username='$loggedInUser'";

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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333; /* Text color */
            overflow: hidden; /* Hide overflowing elements */
            position: relative;
        }

        .container {
            width: 60%;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
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

        .no-appointments {
            text-align: center;
            font-style: italic;
            color: #999; /* Message color */
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
        <h2>Your Appointments</h2>
        <?php if ($result->num_rows > 0) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Doctor</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?= $row["doctor_name"] ?></td>
                            <td><?= $row["date"] ?></td>
                            <td><?= $row["time"] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="no-appointments">No appointments found</p>
        <?php endif; ?>
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
