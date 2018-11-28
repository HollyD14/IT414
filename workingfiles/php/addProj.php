<?php

require 'open-db.php';

/*Add project*/
$Proj_ID=$_POST['pNo'];
$Proj_Name=$_POST['pName'];
$Start_Date=$_POST['sDate'];
$End_Date=$_POST['eDate'];

$sql = "INSERT into project (Project_ID, Project_Name, Start_Date, End_Date)
VALUES ('$Pay_ID',  ".(($Proj_Name=='')? "NULL" :("'".$Proj_Name."'")).",
				".(($Start_Date=='')?"NULL":("'".$Start_Date."'")).",".(($End_Date=='')? "NULL" :("'".$End_Date."'"))."
	   		   )";

//Following block returns the user to the updated project page when successful,
//Or returns an error code with a shortcut to the project page if not
if ($conn->query($sql) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: /php/project.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="/php/project.php">Return to Project Page</a>
HTML;
}
?>

