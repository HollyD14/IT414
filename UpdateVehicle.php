<?php

//defined variables for db login
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "telmon_database";

// Gets the user inputs from the form, and defines them in variables to be used in the SQL statement
$vnum = $_POST['Vehicle_ID'];
$make = $_POST['Make'];
$model = $_POST['Model'];
$year = $_POST['Year'];
$color = $_POST['Color'];
$plate = $_POST['Plate_Number'];


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br>";


//Single line to update the database from the form data
$sql = "UPDATE vehicle SET Make = '".$_POST['Make']."', Model = '".$_POST['Model']."', Year = '".$_POST['Year']."', Color = '".$_POST['Color']."', Plate_Number = '".$_POST['Plate_Number']."' WHERE Vehicle_ID = $vnum";

 
//Following block returns the user to the updated department page when successfull,
//Or returns an error code with a shortcut to the deapartment page if not
if ($conn->query($sql) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: http://localhost/php/vehicle.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="http://localhost/php/vehicle.php">Return to Vehicle Page</a>
HTML;
}
?>