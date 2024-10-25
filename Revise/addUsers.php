<!--// Code for addUsers.php -->
<!DOCTYPE html>
<!
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
        echo "<p> <a href=\"index.php\">Home</a></p>";
        echo "</br>";
        echo "<form action=\"userAdded.php\" method=\"POST\">
            <b> Register</b>
            <p> Username: <input type='text' name =\"username\" size = \"10\" /></p>
		<p> Password: <input type='text' name=\"password\" size = \"12\" /></p>
            <p> First Name: <input type='text' name =\"fName\" size = \"20\" /></p>
            <p> Last Name: <input type='text' name =\"lName\" size = \"20\" /></p>
            <p> Address: <input type='text' name =\"address\" size = \"20\" /></p>
            <p> Email: <input type=\"text\" name=\"email\" value=\"\" size=\"13\" /></p>
            <p> <input type=\"submit\" name=\"submit\" value=\"Send\"/></p>
            </form>";
        ?>
    </body>
</html>
