<?php
include 'open-db.php';
include 'headerFooter.php';
echo "<link href='../css/pageStyle.css' rel='stylesheet' type='text/css'/>";
$dep_number=$_POST['dep_number'];

$sql = "DELETE from department WHERE Dept_ID=$dep_number";

	if ($conn->query($sql) === TRUE) {
		echo "<br><center><h3>Record deleted successfully</h3></center>";
		echo "<br><center><a href='department.php'>Go back</a></center>";
	} else {
		echo "<br><center><h3>Error deleting record: " . $conn->error . "</h3></center>";
		echo "<br><center><a href='department.php'>Go back</a></center>";
	}
?>
