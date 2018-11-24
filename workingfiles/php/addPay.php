<?php

require 'open-db.php';

/*Add payroll*/
$Pay_ID=$_POST['pay_No'];
$Emp_Name=$_POST['emp_Name'];
$Salary=$_POST['salary'];
$Garnish=$_POST['garnish'];

$sql = "INSERT into payroll (Payroll_ID, Employee_Name, Salary, Garnishment)
VALUES ('$Pay_ID', '$Emp_Name', '$Salary','$Garnish')";

if ($conn->query($sql) === TRUE) {
   echo "Record inserted successfully";
} else {
   echo "Error inserting record: " . $conn->error;
}

?>
