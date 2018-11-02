<!doctype html>
<html lang ="en">
	<head>
		<title>Department</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../../css/pageStyle.css" rel="stylesheet" type="text/css"/>
		<link href="../../css/searchStyle.css" rel="stylesheet" type="text/css"/>
		<link href="../../css/resultStyle.css" rel="stylesheet" type="text/css"/>
		<?php include '../headerFooter.php'?>;
	</head>
	<!--Click button to add department record -->
	<button class="openButton" onclick="openForm()">+ Add Department</button> 
	<div class="formPopup" id="createDept">
		<form action="addDept.php" class="formContainer">
			<h1>Add Department</h1>
			
			<label for="Department No."><b>Department No.</b></label>
			<input type="number" placeholder="Enter Department #" name="deptNo" required><br>
			<label for="Department Name"><b>Department Name</b></label>
			<input type="text" placeholder="Enter Department Name" name="deptName" required><br>
			<label for="Office Address"><b>Office Address</b></label>
			<input type="text" placeholder="Enter Office Address" name="deptAddr"><br>
			<label for="Phone Number"><b>Phone Number</b></label>
			<input type="number" placeholder="Enter Office Phone" name="deptPhone"><br>
		
		<center><button type="submit" class="btn save">Save</button>
		<button type="button" class="btn cancel" onclick="closeForm()">Cancel</button></center>
		</form>
		</div>

	<div id="search">
		<h1><center>Search Departments</center></h1>
		<form method="POST" action="searchDept.php">
			<label>Department No: </label><input type="text" id="dNo" name="dNo"> 
			<label>Department Name: </label><input type="text" id="dName" name="dName">
			<label>Address: </label><input type="text" id="dAddr" name="dAddr">
			<label>Phone Number: </label><input type="text" id="dPhone" name="dPhone">
			<input type="submit" id="searchButton" value="Search">
	</div>
	<?php 
	echo '<link rel="stylesheet" type = "text/css" href="../css/results.css">';
	echo '<link rel="stylesheet" type = "text/css" href="../css/searchStyle.css">';
	echo '<link rel="stylesheet" type = "text/css" href="../css/style.css">';
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "telmon_database";

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	$result= mysqli_query($conn, "SELECT Dept_ID, Dept_Name, Office_Addr, Office_Phone FROM department");
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
		echo "<td>" . $row['Dept_Name'] . "</td>";
		echo "<td>" . $row['Office_Addr'] . "</td>";
		echo "<td>" . $row['Office_Phone'] . "</td>";
		echo "</tr>";
	}
	echo '</table>'; ?>
		<!--<script>
			function openForm(){
			document.getElementById("createDept").style.display="block";}
			function closeForm() {
			document.getElementById("createDept").style.display="none";}
		</script> -->
	
		</div>
	
	</body>
</html>