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

// SQL query to retrieve all payments
$sql = "SELECT PayPayment.id, Patient.name AS patient_name, PayPayment.amount, PayPayment.card_type, PayPayment.exp_date, PayPayment.zip_code
        FROM PayPayment
        INNER JOIN Patient ON PayPayment.patient_id = Patient.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Payments</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            text-align: center;
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

        .no-payments {
            text-align: center;
            font-style: italic;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>All Payments:</h2>
        <table>
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Patient Name</th>
                    <th>Amount</th>
                    <th>Card Type</th>
                    <th>Expiration Date</th>
                    <th>ZIP Code</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["id"]."</td><td>".$row["patient_name"]."</td><td>".$row["amount"]."</td><td>".$row["card_type"]."</td><td>".$row["exp_date"]."</td><td>".$row["zip_code"]."</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='no-payments'>No payments found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
