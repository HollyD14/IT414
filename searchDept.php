<?php
echo '<link rel="stylesheet" type = "text/css" href="../../css/resultStyle.css">';
echo '<link rel="stylesheet" type = "text/css" href="../../css/pageStyle.css">';
include '../headerFooter.php';
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "telmon_database";

$conn = new mysqli($servername, $username, $password, $dbname); //open connection

if ($conn->connect_error) { //error if no connection
    die("Connection failed: " . $conn->connect_error);
} 
/*Department info*/
$Dept_ID= $_POST['dNo'];
$Dept_Name= $_POST["dName"];
$Office_Addr= $_POST["dAddr"];
$Office_Phone= $_POST["dPhone"];

//if (isset($_POST['search'])) //, $_POST['dName'], $_POST['dAddr'], $_POST['dPhone'])) //check for info
	
		$result= mysqli_query($conn, "SELECT * FROM department where Dept_ID=$Dept_ID");
		if (!$result) {
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
		
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['Dept_ID'] . "</td>";
			echo "<td>" . $row["Dept_Name"] . "</td>";
			echo "<td>" . $row["Office_Addr"] . "</td>";
			echo "<td>" . $row["Office_Phone"] . "</td>";
			echo "</tr>"; //show results
		}
		echo '</table>'; 
	 
	

	
?>