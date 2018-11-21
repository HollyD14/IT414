<?php

//defined variables for db login
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "telmon_database";

// Gets the user inputs from the form, and defines them in variables to be used in the SQL statement
$prnum = $_POST['Project_ID'];
$prname = $_POST['Project_Name'];
$bdate = $_POST['Start_Date'];
$edate = $_POST['End_Date'];
	
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br>";


//Single line to update the database from the form data
$sql = "UPDATE project SET Project_Name = '".$_POST['Project_Name']."', Start_Date = '".$_POST['Start_Date']."', End_Date = '".$_POST['End_Date']."' WHERE Project_ID = $prnum";

 
//Following block returns the user to the updated department page when successfull,
//Or returns an error code with a shortcut to the deapartment page if not
if ($conn->query($sql) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: http://localhost/php/project.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="http://localhost/php/project.php">Return to Departments</a>
HTML;
}
?>