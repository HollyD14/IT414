<?php

require 'open-db.php';

/*Add position*/
$Job_ID=$_POST['job_No'];
$Job_Title=$_POST['job_Title'];
$B_Sal=$_POST['b_Sal'];


$sql = "INSERT into position (Job_ID, Job_Title, Base_Salary)
VALUES ('$Job_ID', '$Job_Title', '$B_Sal',)";

if ($conn->query($sql) === TRUE) {
   echo "Record inserted successfully";
} else {
   echo "Error inserting record: " . $conn->error;
}

?>
