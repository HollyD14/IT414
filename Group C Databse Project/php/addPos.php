<?php

require 'open-db.php';

/*Add position*/
$Job_ID=$_POST['jNo'];
$Job_Title=$_POST['jTitle'];
$B_Sal=$_POST['base'];


$sql = "INSERT into position (Job_ID, Job_Title, Base_Salary)
VALUES ('$Job_ID',  ".(($Job_Title=='')? "NULL" :("'".$Job_Title."'")).",
				".(($B_Sal=='')?"NULL":("'".$B_Sal."'"))."
	   		   )";

//Following block returns the user to the updated position page when successful,
//Or returns an error code with a shortcut to the position page if not
if ($conn->query($sql) === TRUE) {
   echo "Record updated successfully";
      echo "Return to Update Page: " ;
	  header ("Location: /php/position.php");
} else {
   echo "Error updating record: " . $conn->error;
   echo <<<HTML
			<a href="/php/position.php">Return to Position Page</a>
HTML;
}
?>
