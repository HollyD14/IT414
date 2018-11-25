<?php
include 'open-db.php';
include 'headerFooter.php';
echo "<link href='../css/pageStyle.css' rel='stylesheet' type='text/css'/>";
$id=$_POST['id'];

$sql = "DELETE from payroll WHERE Payroll_ID=$id";

//Following block returns the user to the updated payroll page when successful,
//Or returns an error code with a shortcut to the payroll page if not
if ($conn->query($sql) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: /php/payroll.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="/php/payroll.php">Return to Payroll Page</a>
HTML;
}
?>
