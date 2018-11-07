<?php
// The folowing code just prints the inputs on the form to the screen, uncomment if you want verification of inputs
/*department number: <?php echo (int)$_POST['dept_number'];?>
department name <?php echo htmlspecialchars($_POST['dept_name']); ?>
address: <?php echo htmlspecialchars($_POST['address']); ?>
phone: <?php echo (int)$_POST['phone']; ?>*/
//defined variables for db login
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "telmon_database";
// Gets the user inputs from the form, and defines them in variables to be used in the SQL statement
$dnum = $_POST['dep_number'];
$dname = $_POST['dep_name'];
$addr = $_POST['address'];
$phone = $_POST['phone'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br>";

//The following lines of code are the actual sql update commands using the form data. They are seperated out for testing purposes only.
//They will be combined into one block of code once the testing is complete.
//I've been commenting out all but one line for testing purposes.
//Following lines are for testing each field individually
//$sql = "UPDATE department SET dept_name = '".$_POST['dep_name']."' WHERE Dept_ID = 1";
//$sql = "UPDATE department SET Office_addr = '".$_POST['address']."' WHERE Dept_ID = 1";
//$sql = "UPDATE department SET Office_Phone = '".$_POST['phone']."' WHERE Dept_ID = 1";
//Single line to update the database from the form data
$sql = "UPDATE department SET dept_name = '".$_POST['dep_name']."', Office_addr = '".$_POST['address']."', Office_Phone = '".$_POST['phone']."' WHERE Dept_ID = $dnum";

//Following block prints the data from the databse AFTER the update command is implemented
if ($conn->query($sql) === TRUE) {
   echo "Record updated successfully";
} else {
   echo "Error updating record: " . $conn->error;
}
$result= mysqli_query($conn, "SELECT Dept_ID, Dept_Name, Office_Addr, Office_Phone FROM department");
	echo '<table>
	<tr>
		<th>Department Number</th>
		<th>Department Name</th>
		<th>Office Address</th>
		<th>Office Phone</th>
		<th></th>
		<th></th>
	</tr>';
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $row['Dept_ID'] . "</td>";
		echo "<td>" . $row['Dept_Name'] . "</td>";
		echo "<td>" . $row['Office_Addr'] . "</td>";
		echo "<td>" . $row['Office_Phone'] . "</td>";
		echo "<td class='details'><a href='updateDept.php'>Update Record</a></td>";
		echo "<td class='details'><a href='deleteDept.php'>Delete Record</a></td>";
		echo "</tr>";
	}
	echo '</table>';
?>