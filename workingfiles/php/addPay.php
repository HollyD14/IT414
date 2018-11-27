<?php

require 'open-db.php';

/*Add payroll*/
$Pay_ID=$_POST['pNo'];
$Salary=$_POST['salary'];
$Garnish=$_POST['garnishment'];

$sql = "INSERT into payroll (Payroll_ID, Salary, Garnishments)
VALUES ('$Pay_ID',  ".(($Salary=='')? "NULL" :("'".$Salary."'")).",
				".(($Garnish=='')?"NULL":("'".$Garnish."'"))."
	   		   )";
//Following block returns the user to the updated department page when successfull,
//Or returns an error code with a shortcut to the deapartment page if not
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
