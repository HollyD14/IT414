<?php

require 'open-db.php';

/*Add vehicle*/
$Vehicle_ID=$_POST['vehicle_ID'];
$Make=$_POST['make'];
$Model=$_POST['model'];
$Year=$_POST['year'];
$Color=$_POST['color'];
$Plate_Num=$_POST['plate_num'];


$sql = "INSERT into vehicle (Vehicle_ID, Make, Model, Year, Color, Plate_Number)
VALUES ('$Vehicle_ID', '$Proj_Name', '$Start_Date','$End_Date')";

if ($conn->query($sql) === TRUE) {
   echo "Record inserted successfully";
} else {
   echo "Error inserting record: " . $conn->error;
}

?>
