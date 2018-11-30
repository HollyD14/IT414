<?php

//defined variables for db login
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "telmon_database";

// Gets the user inputs from the form, and defines them in variables to be used in the SQL statement
$pnum = $_POST['Payroll_ID'];
$sal = $_POST['Salary'];
$garnish = $_POST['Garnishments'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br>";


//Single line to update the database from the form data
$sql = "UPDATE payroll SET Salary = '".$_POST['Salary']."', Garnishments = NULLIF('".$_POST['Garnishments']."','') WHERE Payroll_ID = $pnum";

 
//Following block returns the user to the updated department page when successfull,
//Or returns an error code with a shortcut to the deapartment page if not
if ($conn->query($sql) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: http://localhost/php/payroll.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="http://localhost/php/payroll.php">Return to Payroll Page</a>
HTML;
}
?>