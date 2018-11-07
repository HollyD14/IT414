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

$id=$_GET['d'];
$sql = "DELETE from department WHERE Dept_ID=$d";

if ($conn->query($sql) === TRUE) {
   echo "Record deleted successfully";
} else {
   echo "Error deleting record: " . $conn->error;
}

?>
