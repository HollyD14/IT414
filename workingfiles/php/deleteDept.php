<?php
include 'open-db.php';
include 'headerFooter.php';
echo "<link href='../css/pageStyle.css' rel='stylesheet' type='text/css'/>";
$dep_number=$_POST['dep_number'];

$sql = "DELETE from department WHERE Dept_ID=$dep_number";

//Following block returns the user to the updated department page when successful,
//Or returns an error code with a shortcut to the department page if not
if ($conn->query($sql) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: /php/department.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="/php/department.php">Return to Department Page</a>
HTML;
}
?>
