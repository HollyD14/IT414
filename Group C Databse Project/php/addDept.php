<?php

require 'open-db.php';

/*Add department*/
$Dept_ID=$_POST['deptNo'];
$Dept_Name=$_POST['deptName'];
$Dept_Addr=$_POST['deptAddr'];
$Dept_Phone=$_POST['deptPhone'];

$sql = "INSERT into department (Dept_ID, Dept_Name, Office_Addr, Office_Phone)
VALUES ('$Dept_ID', '$Dept_Name', ".(($Dept_Addr=='')?"NULL":("'".$Dept_Addr."'")).",
		".(($Dept_Phone =='')?"NULL":("'".$Dept_Phone."'"))."
	   )";

//Following block returns the user to the updated department page when successfull,
//Or returns an error code with a shortcut to the deapartment page if not
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
