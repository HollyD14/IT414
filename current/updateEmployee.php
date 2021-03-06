<?php

//defined variables for db login
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "telmon_database";

// Gets the user inputs from the form, and defines them in variables to be used in the SQL statement
$enum = $_POST['Emp_Number'];
$fname = $_POST['First_Name'];
$lname = $_POST['Last_Name'];
$addr = $_POST['Address'];
$birth = $_POST['Birth_Date'];
$sex = $_POST['Sex'];
$ssn = $_POST['SSN'];
$sdate = $_POST['Start_Date'];
$jobid = $_POST['J_ID'];
$depid = $_POST['D_ID'];
$vid = $_POST['V_ID'];
$projid = $_POST['Proj_ID'];


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br>";


//Single line to update the database from the form data
$sql = "UPDATE employee SET First_Name = '".$_POST['First_Name']."', Last_Name = '".$_POST['Last_Name']."', Address = NULLIF('".$_POST['Address']."',''),
Birth_Date = NULLIF('".$_POST['Birth_Date']."',''), Sex = NULLIF(UPPER('".$_POST['Sex']."'),''), SSN = NULLIF('".$_POST['SSN']."',''), Start_Date = NULLIF('".$_POST['Start_Date']."',''),
J_ID = NULLIF('".$_POST['J_ID']."',''), D_ID = NULLIF('".$_POST['D_ID']."',''), V_ID = NULLIF('".$_POST['V_ID']."',''), Proj_ID = NULLIF('".$_POST['Proj_ID']."','') WHERE Emp_Number = $enum";

 
//Following block returns the user to the updated department page when successfull,
//Or returns an error code with a shortcut to the deapartment page if not
if ($conn->query($sql) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: http://localhost/php/employee.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="http://localhost/php/employee.php">Return to Employee Page</a>
HTML;
}
?>