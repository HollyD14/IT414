<?php
include 'open-db.php';
include 'headerFooter.php';
echo "<link href='../css/pageStyle.css' rel='stylesheet' type='text/css'/>";
$id=$_POST['id'];

$sql = "DELETE from position WHERE Job_ID=$id";

//Following block returns the user to the updated position page when successful,
//Or returns an error code with a shortcut to the position page if not
if ($conn->query($sql) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: /php/position.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="/php/position.php">Return to Position Page</a>
HTML;
}
?>
