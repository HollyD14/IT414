<?php

//defined variables for db login
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "telmon_database";

// Gets the user inputs from the form, and defines them in variables to be used in the SQL statement
$dnum = $_POST['dep_number'];
$dname = $_POST['dep_name'];
$addr = $_POST['address'];
$phone = $_POST['phone'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br>";


//Single line to update the database from the form data
$sql = "UPDATE department SET dept_name = '".$_POST['dep_name']."', Office_addr = NULLIF('".$_POST['address']."',''), Office_Phone = NULLIF('".$_POST['phone']."','') WHERE Dept_ID = $dnum";

 
//Following block returns the user to the updated department page when successfull,
//Or returns an error code with a shortcut to the deapartment page if not
if ($conn->query($sql) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: http://localhost/php/department.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="http://localhost/php/department.php">Return to Departments</a>
HTML;
}
?>