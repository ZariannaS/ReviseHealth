<!DOCTYPE html>
<html>

<head>
    <title>View Treatment Plans</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.7/lottie.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #007bff; /* Blue color */
            margin-top: 40px; /* Added margin top */
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1; /* Ensure the table stays above the animation */
            position: relative; /* Needed for z-index to work */
        }

        table th,
        table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
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
    <h1>Treatment Plans:</h1>
    <table>
        <tr>
            <th>Treatment ID</th>
            <th>Patient Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Notes</th>
        </tr>
        <?php
        require_once('mysqli_connect.php');

        $query = "SELECT t.id AS treatment_id, p.name AS patient_name, t.start_date, t.end_date, t.notes FROM Treatment t JOIN Patient p ON t.patient_id = p.id";

        $response = @mysqli_query($dbc, $query);

        if ($response) {
            while ($row = mysqli_fetch_array($response)) {
                echo '<tr>';
                echo '<td>' . $row['treatment_id'] . '</td>';
                echo '<td>' . $row['patient_name'] . '</td>';
                echo '<td>' . $row['start_date'] . '</td>';
                echo '<td>' . $row['end_date'] . '</td>';
                echo '<td>' . $row['notes'] . '</td>';
                echo '</tr>';
            }
        } else {
            echo "Error: " . mysqli_error($dbc);
        }

        mysqli_close($dbc);
        ?>
    </table>
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
