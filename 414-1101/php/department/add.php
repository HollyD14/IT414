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
/*************SAMPLE INSERT STATEMENT***********
$sql = "INSERT into employee (Emp_Number, First_name, Last_name)
VALUES ('654890', 'Randy', 'Marsh')";

if ($conn->query($sql) === TRUE) {
   echo "Record inserted successfully";
} else {
   echo "Error inserting record: " . $conn->error;
}
*/






?>
