<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "telmon_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br>";

/*****UPDATE*******

$sql = "UPDATE employee SET Last_Name = 'Dickey' where emp_number = 111111";

$result= mysqli_query($conn, "SELECT First_Name, Last_Name FROM employee");

if ($conn->query($sql) === TRUE) {
   echo "Record updated successfully";
} else {
   echo "Error updating record: " . $conn->error;
}*/

/**********SELECT*************
$result= mysqli_query($conn, "SELECT First_Name, Last_Name FROM employee");
echo '<table>
   <tr>
     <th>First Name</th>
     <th>Last Name</th>
   </tr>';
 while ($row = mysqli_fetch_array($result)) {

    echo "<tr>";
	echo "<td>" . $row['First_Name'] . "</td>";
	echo "<td>" . $row['Last_Name'] . "</td>";
	echo "</tr>";
 }
echo '</table>';*/

/*************INSERT***********
$sql = "INSERT into employee (Emp_Number, First_name, Last_name)
VALUES ('654890', 'Randy', 'Marsh')";

if ($conn->query($sql) === TRUE) {
   echo "Record inserted successfully";
} else {
   echo "Error inserting record: " . $conn->error;
}
*/

/************DELETE***********

$sql = "DELETE from employee 
WHERE emp_number = 654890";

if ($conn->query($sql) === TRUE) {
   echo "Record deleted successfully";
} else {
   echo "Error deleting record: " . $conn->error;
}
*/
mysqli_close($conn);


?> 