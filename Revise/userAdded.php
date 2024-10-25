<!--Code for userAdded.php -->
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        if (isset($_POST['submit'])) {
            $data_missing = array();
		} if (empty($_POST['username'])) {
                //Add a value to array
                $data_missing[] = 'Username';
            } else {
                //Trim white space from the value and store the value
                $username = trim($_POST['username']);
            }
			 if (empty($_POST['password'])) {
                //Add a value to array
                $data_missing[] = 'User Password';
            } else {
                //Trim white space from the value and store the value
                $password = trim($_POST['password']);
            }
            if (empty($_POST['fName'])) {
                //Add a value to array
                $data_missing[] = 'User First Name';
            } else {
                //Trim white space from the value and store the value
                $fName = trim($_POST['fName']);
            }

            if (empty($_POST['lName'])) {
                //Add a value to array
                $data_missing[] = 'User Last Name';
            } else {
                //Trim white space from the value and store the value
                $lName = trim($_POST['lName']);
            }

            if (empty($_POST['email'])) {
                //Add a value to array
                $data_missing[] = 'User Email';
            } else {
                //Trim white space from the value and store the value
                $email = trim($_POST['email']);
            }
		if (empty($_POST['address'])) {
    		//Add a value to array
    		$data_missing[] = 'User Address';
		} else {
    		//Trim white space from the value and store the value
    		$address = trim($_POST['address']);
		}
            if (empty($data_missing)) {
    require_once('mysqli_connect.php');
    $query1 = "INSERT INTO users (username, password, fName, lName, email) VALUES (?, ?, ?, ?, ?)";
    $stmt1 = mysqli_prepare($dbc, $query1);
    mysqli_stmt_bind_param($stmt1, "sssss", $username, $password, $fName, $lName, $email);
    mysqli_stmt_execute($stmt1);
    $affectedRows1 = mysqli_stmt_affected_rows($stmt1);
    
    $query2 = "INSERT INTO Address (username, address) VALUES (?, ?)";
    $stmt2 = mysqli_prepare($dbc, $query2);
    mysqli_stmt_bind_param($stmt2, "ss", $username, $address);
    mysqli_stmt_execute($stmt2);
    $affectedRows2 = mysqli_stmt_affected_rows($stmt2);

    if ($affectedRows1 == 1 && $affectedRows2 == 1) {
        echo 'New user registered!';
        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        mysqli_close($dbc);
    } else {
        echo 'Error Occurred <br/>';
        echo mysqli_error($dbc);
        mysqli_stmt_close($stmt1);
        mysqli_stmt_close($stmt2);
        mysqli_close($dbc);
    }
} else {
    echo 'You need to enter the following data <br />';
    foreach ($data_missing as $missing) {
        echo "$missing<br />";
    }
 }
        ?>
        <p><a href="index.php">Home</a></p>
 
    </body>
</html>


