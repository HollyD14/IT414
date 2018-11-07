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
************************************************/

/*Was using this as a test when trying to pass via href. This won't be in here later but I'm keeping it for testing purposes right now.

if (isset($_GET['id'])) {
	echo $_GET['id'];
	}
else {
	echo "Something went wrong";
	exit();
}*/


//This deletes department 8 or whatever department is hard coded

$Dept_ID="SELECT Dept_ID from department";
$sql = "DELETE from department WHERE Dept_ID=8";

if ($conn->query($sql) === TRUE) {
   echo "Record deleted successfully";
} else {
   echo "Error deleting record: " . $conn->error;
}


?>
