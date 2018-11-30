<?php

require 'open-db.php';

/*Add employee*/

$E_ID=$_POST['eNo'];
$E_FName=$_POST['eFName'];
$E_LName=$_POST['eLName'];
$Sex=$_POST['Sex'];
$BDate=$_POST['bdate'];
$E_Addr=$_POST['eAddr'];
$SSN=$_POST['ssn'];
$Start_Date=$_POST['startDate'];
$Job_ID=$_POST['J_ID'];
$Pay_ID=$_POST['eNo'];
$Sal=$_POST['salary'];
$Dep_ID=$_POST['D_ID'];
$Pro_ID=$_POST['Proj_ID'];
$Veh_ID=$_POST['V_ID'];


$pay = "INSERT into payroll (Payroll_ID, Salary, Garnishments)
VALUES ('$Pay_ID', '$Sal','0')";

$Emp = "INSERT into employee (Emp_Number, First_Name, Last_Name, Birth_Date, Sex, Address, SSN, Start_Date, J_ID, P_ID, D_ID, Proj_ID, V_ID)
VALUES ('$E_ID', '$E_FName', '$E_LName', ".(($BDate=='')? "NULL" :("'".$BDate."'")).",
		".(($Sex=='')? "NULL" :("'".$Sex."'")).", ".(($E_Addr=='')?"NULL":("'".$E_Addr."'")).",
		".(($SSN=='')?"NULL":("'".$SSN."'")).", ".(($Start_Date=='')?"NULL":("'".$Start_Date."'")).", ".(($Job_ID=='')?"NULL":("'".$Job_ID."'")).", '$Pay_ID', ".(($Dep_ID=='')?"NULL":("'".$Dep_ID."'")).",
		".(($Pro_ID=='')?"NULL":("'".$Pro_ID."'")).", ".(($Veh_ID=='')?"NULL":("'".$Veh_ID."'"))."
	   )";   

//Following block returns the user to the updated department page when successfull,
//Or returns an error code with a shortcut to the deapartment page if not
if ($conn->query($pay) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: /php/employee.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="/php/employee.php">Return to Employee Page</a>
HTML;
}

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
