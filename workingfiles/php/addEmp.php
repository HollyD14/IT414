<?php

require 'open-db.php';

/*Add employee*/
$E_ID=$_POST['eNo'];
$E_FName=$_POST['eFName'];
$E_LName=$_POST['eLName'];
$BDate=$_POST['bdate'];
$Sex=$_POST['sex'];
$E_Addr=$_POST['eAddr'];
$SSN=$_POST['ssn'];
$Start_Date=$_POST['startDate'];
$Salary=$_POST['salary'];



$sql = "INSERT into employee (Emp_Number, First_Name, Last_Name, Birth_Date, Sex, Address, SSN, 
													   Start_Date, Salary)
VALUES ('$E_ID', '$E_FName', '$E_LName', '$BDate', '$Sex', '$E_Addr', '$SSN', '
				 $Start_Date', '$Salary')";

if ($conn->query($sql) === TRUE) {
   echo "Record inserted successfully";
} else {
   echo "Error inserting record: " . $conn->error;
}
?>