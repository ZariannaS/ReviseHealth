<!DOCTYPE html>
<html>

<head>
    <title>Update Treatment Plan</title>
    <style>
        .container {
            width: 50%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #007bff; /* Blue color */
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        textarea,
        input[type="date"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff; /* Blue color */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker shade of blue */
        }

        .back-button {
            background-color: #007bff; /* Blue color */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            float: left;
            margin-bottom: 20px;
        }

        .back-button:hover {
            background-color: #0056b3; /* Darker shade of blue */
        }
    </style>
</head>

<body>
    <a href="doctor_welcome.php" class="back-button">Back to Profile</a>
    <div class="container">
        <h1>Update Treatment Plan</h1>
        <form method="GET">
            <label for="patient_name">Patient Name:</label>
            <input type="text" id="patient_name" name="patient_name" required>
            <input type="submit" value="Search">
        </form>

        <?php
        require_once('mysqli_connect.php');

        if (isset($_GET['patient_name'])) {
            $patient_name = $_GET['patient_name'];

            // Fetch patient details
            $query = "SELECT p.id AS patient_id, p.name AS patient_name, t.id AS treatment_id, t.start_date, t.end_date, t.notes 
                        FROM Patient p
                        JOIN Treatment t ON p.id = t.patient_id
                        WHERE p.name = '$patient_name'";
            $response = @mysqli_query($dbc, $query);

            if ($response && mysqli_num_rows($response) > 0) {
                $row = mysqli_fetch_array($response);
        ?>
                <form method="POST">
                    <input type="hidden" name="treatment_id" value="<?php echo $row['treatment_id']; ?>">
                    <input type="hidden" name="patient_id" value="<?php echo $row['patient_id']; ?>">

                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" value="<?php echo $row['start_date']; ?>" required>

                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date" value="<?php echo $row['end_date']; ?>" required>

                    <label for="notes">Notes:</label>
                    <textarea id="notes" name="notes" rows="4" required><?php echo $row['notes']; ?></textarea>

                    <input type="submit" value="Update Treatment Plan">
                </form>
        <?php
            } else {
                echo "<p>No treatment plan found for the patient '$patient_name'.</p>";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $treatment_id = $_POST['treatment_id'];
            $patient_id = $_POST['patient_id'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $notes = $_POST['notes'];

            // Update treatment plan
            $query = "UPDATE Treatment SET start_date='$start_date', end_date='$end_date', notes='$notes' WHERE id=$treatment_id";

            if (mysqli_query($dbc, $query)) {
                echo "<p>Treatment plan updated successfully.</p>";
            } else {
                echo "Error updating record: " . mysqli_error($dbc);
            }
        }

        mysqli_close($dbc);
        ?>
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
