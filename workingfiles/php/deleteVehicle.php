<?php
include 'open-db.php';
include 'headerFooter.php';
echo "<link href='../css/pageStyle.css' rel='stylesheet' type='text/css'/>";
$id=$_POST['id'];

$sql = "DELETE from vehicle WHERE Vehicle_ID=$id";

//Following block returns the user to the updated vehicle page when successful,
//Or returns an error code with a shortcut to the vehicle page if not
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
