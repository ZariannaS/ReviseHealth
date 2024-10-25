<?php
require_once('mysqli_connect.php');
session_start();


echo "<p> <a href=\"viewProfile.php\">Back</a></p>";
echo "</br>";
echo "<p> <h1>Reservation History</h1></p>";

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch reviews from the database
$sql = "SELECT reviewID, comment, rating, username FROM WritesReviews";
$result = $conn->query($sql);

// Get user ID from session or any other source
$username = $_SESSION['login_user'];

// Prepare SQL query

$sql = "SELECT Schedule.eDate, Schedule.eTime, makesReservation.reservationNo, arrangeSeating.seatPrice, Events.name
        FROM Schedule
        JOIN Details ON Schedule.eID = Details.eID
        JOIN makesReservation ON Details.reservationNo = makesReservation.reservationNo
        JOIN arrangeSeating ON makesReservation.reservationNo = arrangeSeating.reservationNo
        JOIN pays ON makesReservation.reservationNo = pays.reservationNo
        JOIN paysPayment ON pays.paymentID = paysPayment.paymentID
        JOIN users ON makesReservation.username = users.username
        JOIN Events ON Details.eID = Events.eID
        JOIN Concert ON Events.eID = Concert.eID
        JOIN Performs ON Concert.performerID = Performs.performerID
        JOIN Performers ON Performs.performerID = Performers.performerID
        WHERE users.username = '" . mysqli_real_escape_string($conn, $username) . "'";




// Execute query
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Event Name: " . $row["name"] . " | Event Date: " . $row["eDate"] . " | Event Time: " . $row["eTime"] . " | Reservation No: " . $row["reservationNo"] . " | Seat Price: $" . $row["seatPrice"] . "<br>";
    }
} else {
    echo "No reservation history found.";
}

// Close connection
mysqli_close($conn);
?>