<?php

require 'open-db.php';

/*Add employee*/
$E_ID=$_POST['eNo'];
$E_FName=$_POST['eFName'];
$E_LName=$_POST['eLName'];
$Sex=$_POST['sex'];
$BDate=$_POST['bdate'];
$E_Addr=$_POST['eAddr'];
$SSN=$_POST['ssn'];
$Start_Date=$_POST['startDate'];


$Emp = "INSERT into employee (Emp_Number, First_Name, Last_Name, Birth_Date, Sex, Address, SSN, Start_Date)
VALUES ('$E_ID', '$E_FName', '$E_LName', ".(($BDate=='')? "NULL" :("'".$BDate."'")).",
		".(($Sex=='')? "NULL" :("'".$Sex."'")).", ".(($E_Addr=='')?"NULL":("'".$E_Addr."'")).",
		".(($SSN=='')?"NULL":("'".$SSN."'")).", ".(($Start_Date=='')?"NULL":("'".$Start_Date."'"))."
	   )";

//Following block returns the user to the updated department page when successfull,
//Or returns an error code with a shortcut to the deapartment page if not
if ($conn->query($Emp) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: /php/employee.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="/php/employee.php">Return to Employee Page</a>
HTML;
}
?>
