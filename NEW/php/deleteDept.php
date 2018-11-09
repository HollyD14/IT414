<?php
include 'open-db.php';
$id=$_GET['id'];
$sql = "DELETE from department WHERE Dept_ID=$id";

if ($conn->query($sql) === TRUE) {
   echo "Record deleted successfully";
} else {
   echo "Error deleting record: " . $conn->error;
}



?>
