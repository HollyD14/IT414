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

/*************SAMPLE DELETE STATEMENT***********
$sql = "DELETE from employee 
WHERE emp_number = 654890";

if ($conn->query($sql) === TRUE) {
   echo "Record deleted successfully";
} else {
   echo "Error deleting record: " . $conn->error;
}
*/






?>
