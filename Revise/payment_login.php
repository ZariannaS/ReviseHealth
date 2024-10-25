<?php
require_once('mysqli_connect.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM Doctor WHERE username='$username' AND password='$password'";
    $result = mysqli_query($dbc, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $username;
        header("location: doctor_welcome.php");
        exit();
    }

    $query = "SELECT * FROM Admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($dbc, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $username;
        header("location: admin_welcome.php");
        exit();
    }

    $query = "SELECT * FROM Patient WHERE username='$username' AND password='$password'";
    $result = mysqli_query($dbc, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $username;
        header("location: payment.php");
        exit();
    }

    $error = "Your Login Name or Password is invalid";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 18px;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            position: relative;
            padding: 20px;
        }
        .back-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
        .login-box {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: auto;
            margin-top: 50px;
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
            padding: 12px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #007bff;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-btn">Back</a>
        <div class="login-box">
            <h1>Log In to Make a Payment</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br>
                
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br>
                
                <input type="submit" value="Login">
            </form>
            <?php
            if (isset($error)) {
                echo "<p class='error'>$error</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
