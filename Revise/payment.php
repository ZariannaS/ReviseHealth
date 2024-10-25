<?php
// Include session.php to make sure session variables are set
require_once('session.php');



// Check if patient_id is set in the session
if (!isset($_SESSION["patient_id"])) {
    die("Patient ID is not set in the session.");
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rehab";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $patient_id = $_SESSION["patient_id"];
    $amount = $_POST["amount"];
    $card_type = $_POST["card_type"];
    $exp_date = $_POST["exp_date"];
    $zip_code = $_POST["zip_code"];
    $card_number = $_POST["card_number"];

    // Sanitize input
    $amount = $conn->real_escape_string($amount);
    $card_type = $conn->real_escape_string($card_type);
    $exp_date = $conn->real_escape_string($exp_date);
    $zip_code = $conn->real_escape_string($zip_code);
    $card_number = $conn->real_escape_string($card_number);

    // Check if patient_id exists in Patient table
    $checkPatientSql = "SELECT id FROM Patient WHERE id = '$patient_id'";
    $result = $conn->query($checkPatientSql);

    if ($result->num_rows == 0) {
        die("Invalid patient ID.");
    }

    // Insert payment data into PayPayment table
    $sql = "INSERT INTO PayPayment (patient_id, amount, card_type, exp_date, zip_code, card_number) 
            VALUES ('$patient_id', '$amount', '$card_type', '$exp_date', '$zip_code', '$card_number')";

    if ($conn->query($sql) === TRUE) {
        // Display confirmation message
        echo "<p class='confirmation'>Payment of $$amount made successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>
    <style>
        body {
            font-size: 18px;
            font-family: Arial, sans-serif;
        }
        h2 {
            font-size: 24px;
        }
        label {
            font-size: 20px;
        }
        input[type="text"],
        input[type="date"],
        select {
            font-size: 18px;
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            font-size: 18px;
            padding: 10px 20px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .confirmation {
            font-size: 22px;
            color: green;
        }
    </style>
</head>
<body>
    <h2>Make Payment</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="amount">Amount:</label><br>
        <input type="text" id="amount" name="amount" required><br><br>
        
        <label for="card_type">Card Type:</label><br>
        <select id="card_type" name="card_type" required>
            <option value="Visa">Visa</option>
            <option value="Mastercard">Mastercard</option>
            <option value="Amex">Amex</option>
            <option value="Discover">Discover</option>
        </select><br><br>

        <label for="card_number">Card Number:</label><br>
        <input type="text" id="card_number" name="card_number" required><br><br>

        <label for="exp_date">Expiration Date:</label><br>
        <input type="date" id="exp_date" name="exp_date" required><br><br>
        
        <label for="zip_code">Zip Code:</label><br>
        <input type="text" id="zip_code" name="zip_code" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
