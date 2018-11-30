<?php

include 'open-db.php';

// Gets the user inputs from the form, and defines them in variables to be used in the SQL statement
$enum = $_POST['Emp_Number'];
$fname = $_POST['First_Name'];
$lname = $_POST['Last_Name'];
$addr = $_POST['Address'];
$birth = $_POST['Birth_Date'];
$sex = $_POST['Sex'];
$ssn = $_POST['SSN'];
$sdate = $_POST['Start_Date'];
$jobid = $_POST['J_ID']; //position ID
$depid = $_POST['D_ID']; //depertment ID
$vid = $_POST['V_ID']; //vehicle id
$pr = $_POST['P_ID']; //payroll ID
$projid = $_POST['Proj_ID']; //project ID
$pay_sal = $_POST['P_Salary'];


//Single line to update the database from the form data



$sql1 = "UPDATE payroll SET Salary = '".$_POST['P_Salary']."' WHERE Payroll_ID = $pr";


  
$sql2 = "UPDATE employee SET First_Name = '$fname', Last_Name = '$lname'
										, Birth_Date = ".(($birth=='')? "NULL" :("'".$birth."'"))."
										, Sex = ".(($sex=='')? "NULL" :("'".$sex."'"))."
										, Address = ".(($addr=='')?"NULL":("'".$addr."'"))."
										, SSN = ".(($ssn=='')?"NULL":("'".$ssn."'"))."
										, Start_Date = ".(($sdate=='')?"NULL":("'".$sdate."'"))."
										, J_ID = ".(($jobid=='')?"NULL":("'".$jobid."'"))."
										, D_ID = ".(($depid=='')?"NULL":("'".$depid."'"))."
										, Proj_ID = ".(($projid=='')?"NULL":("'".$projid."'"))."
										, V_ID = ".(($vid=='')?"NULL":("'".$vid."'"))."
		WHERE Emp_Number = $enum"; 
 

//Following block returns the user to the updated department page when successfull,
//Or returns an error code with a shortcut to the deapartment page if not
if ($conn->query($sql2) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: http://localhost/php/employee.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="http://localhost/php/employee.php">Return to Employee Page</a>
HTML;
}

if ($conn->query($sql1) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: http://localhost/php/employee.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="http://localhost/php/employee.php">Return to Employee Page</a>
HTML;
}
?>