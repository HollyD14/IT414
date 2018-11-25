<?php

require 'open-db.php';

/*Add vehicle*/
$Vehicle_ID=$_POST['vNo'];
$Make=$_POST['make'];
$Model=$_POST['model'];
$Year=$_POST['year'];
$Color=$_POST['color'];
$Plate_Num=$_POST['pNumber'];


$sql = "INSERT into vehicle (Vehicle_ID, Make, Model, Year, Color, Plate_Number)
VALUES ('$Vehicle_ID', '$Make', '$Model','$Year', '$Color', '$Plate_Num')";

//Following block returns the user to the updated department page when successfull,
//Or returns an error code with a shortcut to the deapartment page if not
if ($conn->query($sql) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: /php/vehicle.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="/php/vehicle.php">Return to Vehicle Page</a>
HTML;
}
?>
