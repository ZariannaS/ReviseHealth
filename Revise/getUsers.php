<?php

require_once('mysqli_connect.php');

echo "<p> <a href=\"welcome.php\">Back</a></p>";
echo "</br>";
echo "<h1>Current Users</h1>";
$query = "SELECT users.*, address.address FROM users
       JOIN address ON users.username = address.username";

$response = @mysqli_query($dbc, $query);

if ($response) {
    echo '<table border="black" >
    <tr> <td align = "left"> <b> User ID </b> </td>
		 <td align = "left"> <b> User Password </b> </td>
         <td align = "left"> <b> User First Name </b> </td>
         <td align = "left"> <b> User Last Name </b> </td>
         <td align = "left"> <b> Address</b> </td>
         <td align = "left"> <b> User Email </b> </td>
    </tr>';

    while ($row = mysqli_fetch_array($response)) {
        echo '<tr> <td align = "left">' . $row['username'] . '</td>'
		. '<td align = "left">' . $row['password'] . '</td>'
        . '<td align = "left">' . $row['fName'] . '</td>'
        . '<td align = "left">' . $row['lName'] . '</td>'
        . '<td align = "left">' . $row['address'] . '</td>'
        . '<td align = "center">' . $row['email'] . '</td>'
        
         ;
    }
    echo '</table>';
} else {
    echo "Could not issue database query";
    echo mysqli_error($dbc);
}
mysqli_close($dbc);
?>
