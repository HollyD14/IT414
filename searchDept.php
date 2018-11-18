<?php
echo '<link rel="stylesheet" type = "text/css" href="../css/resultStyle.css">';
echo '<link rel="stylesheet" type = "text/css" href="../css/pageStyle.css">';
include 'headerFooter.php';
require 'open-db.php';

/*Department info*/
$Dept_ID= $_POST['dNo'];
$Dept_Name= $_POST['dName'];
$Office_Addr= $_POST['dAddr'];
$Office_Phone= $_POST['dPhone'];
	
		$id= mysqli_query($conn, "SELECT * FROM department where Dept_ID=$Dept_ID");
		$name= mysqli_query($conn, "SELECT * FROM department where Dept_Name like '%$Dept_Name%'");
		$addr= mysqli_query($conn, "SELECT * FROM department where Office_Addr like '%$Office_Addr%'");
		$phone= mysqli_query($conn, "SELECT * FROM department where Office_Phone like '%$Office_Phone%'");
	
		$id= mysqli_query($conn, "SELECT * FROM department where Dept_ID=$Dept_ID");
		if (!$id) {
		printf("Error: %s\n", mysqli_error($conn));
		exit();}
		/*where Dept_ID = $Dept_ID;
		or Dept_Name=$Dept_Name 
		or Office_Addr=$Office_Addr 
		or Office_Phone=$Office_Phone"); //select info*/
			
		echo '<table>
		<tr>
			<th>Department Number</th>
			<th>Department Name</th>
			<th>Office Address</th>
			<th>Office Phone</th>
		</tr>';
		
		while ($row = mysqli_fetch_array($id)) {
			echo "<tr>";
			echo "<td>" . $row['Dept_ID'] . "</td>";
			echo "<td>" . $row["Dept_Name"] . "</td>";
			echo "<td>" . $row["Office_Addr"] . "</td>";
			echo "<td>" . $row["Office_Phone"] . "</td>";
			echo "</tr>"; //show results
		}
		echo '</table>';  
	 
	

	
?>
