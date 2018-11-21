<?php
include 'open-db.php';
include 'headerFooter.php';
echo "<link href='../css/pageStyle.css' rel='stylesheet' type='text/css'/>";
$id=$_POST['id'];

$sql = "DELETE from position WHERE Job_ID=$id";

	if ($conn->query($sql) === TRUE) {
		echo "<br><center><h3>Record deleted successfully</h3></center>";
		echo "<br><center><a href='position.php'>Go back</a></center>";
	} else {
		echo "<br><center><h3>Error deleting record: " . $conn->error . "</h3></center>";
		echo "<br><center><a href='position.php'>Go back</a></center>";
	}
	


?>
