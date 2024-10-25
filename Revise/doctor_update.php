<?php
require_once('mysqli_connect.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 18px;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            font-size: 16px;
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .back-button {
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

        .back-button:hover {
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
    <a href="doctor_welcome.php" class="back-button">Back to Profile</a>
    <div class="container">
        <h1>Update Profile</h1>
        <?php
    $username = $_SESSION['login_user'];
    $query = "SELECT * FROM doctor WHERE username = '$username'";
    $response = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($response, MYSQLI_ASSOC);

    $count = mysqli_num_rows($response);
    if ($count == 1) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password = $_POST['password'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $query = "UPDATE doctor SET password ='$password',
                                         name ='$name',
                                         email ='$email',
                                         phone ='$phone'
                      WHERE username ='$username'";
            $response = mysqli_query($dbc, $query);
            if ($response) {
                echo "<p>Your profile has been updated successfully.</p>";
            } else {
                echo "<p>An error occurred while updating your profile.</p>";
            }
        }

        echo "<form action='' method='POST'>";
        echo "<label for='username'>Username:</label>";
        echo "<p>{$row['username']}</p>";
        echo "<label for='password'>Password:</label>";
        echo "<input type='password' name='password' value='{$row['password']}' required>";
        echo "<label for='name'>Name:</label>";
        echo "<input type='text' name='name' value='{$row['name']}' required>";
        echo "<label for='email'>Email:</label>";
        echo "<input type='text' name='email' value='{$row['email']}' required>";
        echo "<label for='phone'>Phone:</label>";
        echo "<input type='text' name='phone' value='{$row['phone']}' required>";
        echo "<input type='submit' name='update' value='Update Now'>";
        echo "</form>";
    } else {
        echo "<p>Error: Invalid User.</p>";
    }
    ?>
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
