<?php
include 'open-db.php';
include 'headerFooter.php';
echo "<link href='../css/pageStyle.css' rel='stylesheet' type='text/css'/>";
$emp_number=$_POST['emp_number'];

$sql = "DELETE from employee WHERE Emp_Number=$emp_number";

//Following block returns the user to the updated employee page when successful,
//Or returns an error code with a shortcut to the employee page if not
if ($conn->query($sql) === TRUE) {
	  header ("Location: /php/employee.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="/php/employee.php">Return to Employee Page</a>
HTML;
}
?>
