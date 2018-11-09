<?php

require 'open-db.php';

/*Add department*/
$Dept_ID=$_POST['deptNo'];
$Dept_Name=$_POST['deptName'];
$Dept_Addr=$_POST['deptAddr'];
$Dept_Phone=$_POST['deptPhone'];

$sql = "INSERT into department (Dept_ID, Dept_Name, Office_Addr, Office_Phone)
VALUES ('$Dept_ID', '$Dept_Name', '$Dept_Addr','$Dept_Phone')";

if ($conn->query($sql) === TRUE) {
   echo "Record inserted successfully";
} else {
   echo "Error inserting record: " . $conn->error;
}

?>
