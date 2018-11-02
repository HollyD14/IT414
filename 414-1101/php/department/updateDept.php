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

/*****SAMPLE UPDATE STATEMENT*******

$sql = "UPDATE employee SET Last_Name = 'Dickey' where emp_number = 111111";

$result= mysqli_query($conn, "SELECT First_Name, Last_Name FROM employee");

if ($conn->query($sql) === TRUE) {
   echo "Record updated successfully";
} else {
   echo "Error updating record: " . $conn->error;
}*/

?>
