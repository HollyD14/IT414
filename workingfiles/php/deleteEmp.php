<?php
include 'open-db.php';
include 'headerFooter.php';
echo "<link href='../css/pageStyle.css' rel='stylesheet' type='text/css'/>";
$emp_number=$_POST['emp_number'];

$sql = "DELETE from employee WHERE Emp_Number=$emp_number";

	if ($conn->query($sql) === TRUE) {
		echo "<br><center><h3>Record deleted successfully</h3></center>";
		echo "<br><center><a href='employee.php'>Go back</a></center>";
	} else {
		echo "<br><center><h3>Error deleting record: " . $conn->error . "</h3></center>";
		echo "<br><center><a href='employee.php'>Go back</a></center>";
	}
	


?>
