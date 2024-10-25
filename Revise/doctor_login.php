<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to bottom, #f0f0f0, #dcdcdc); /* Gradient neutral background */
        }
        .container {
            width: 400px; /* Increased width */
            padding: 40px; /* Increased padding */
            border-radius: 10px; /* Increased border radius */
            background-color: #fff;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.3); /* Increased box shadow */
        }
        h2 {
            text-align: center;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            margin-top: 20px; /* Increased margin top */
            padding: 15px; /* Increased padding */
            box-sizing: border-box;
            border-radius: 5px; /* Added border radius */
            border: 1px solid #ccc; /* Added border */
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 20px; /* Increased margin top */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Doctor Login</h2>
        <form action="doctor_welcome.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="register.php">Create one</a></p>
        <?php
        // Check if there's an error message to display
        if (isset($_GET['error'])) {
            echo '<p class="error">' . $_GET['error'] . '</p>';
        }
        ?>
    </div>
</body>
</html>
