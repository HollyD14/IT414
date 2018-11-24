<?php

require 'open-db.php';

/*Add project*/
$Proj_ID=$_POST['proj_ID'];
$Proj_Name=$_POST['proj_Name'];
$Start_Date=$_POST['s_Date'];
$End_Date=$_POST['e_Date'];

$sql = "INSERT into project (Project_ID, Project_Name, Start_Date, End_Date)
VALUES ('$Proj_ID', '$Proj_Name', '$Start_Date','$End_Date')";

if ($conn->query($sql) === TRUE) {
   echo "Record inserted successfully";
} else {
   echo "Error inserting record: " . $conn->error;
}

?>
