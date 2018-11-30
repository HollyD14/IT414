<!doctype html>
<html lang ="en">
	<head>
		<title>Vehicles</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../css/pageStyle.css" rel="stylesheet" type="text/css"/>
		<link href="../css/searchStyle.css" rel="stylesheet" type="text/css"/>
		<link href="../css/resultStyle.css" rel="stylesheet" type="text/css"/>
		<link href="../css/popupFormStyle.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<div id="container">
		<header>
			<?php include 'headerFooter.php'?>
		</header>
	<!--*****ADD VEHICLE***** -->
	<button class="openButton" onclick="openForm()">+ Add Vehicle</button>
	<div class="formPopup" id="createEmp">
		<form action="addVehicle.php" method="post" class="formContainer"> 
			<h1>Add Vehicle</h1>
			<label for="Vehicle No.">Vehicle Number:</label>
			<input type="number" placeholder="Enter Vehicle #" name="vNo" required><br>
			<label for="Vehicle Make">Make:</label>
			<input type="text" placeholder="Enter make" name="make" required><br>
			<label for="Vehicle Model">Model:</label> 
			<input type="text" placeholder="Enter model" name="model" required><br>
		    <label for="Year">Year: <i>(YYYY)</i></label> 
			<input type="number" placeholder="Enter year" name="year"><br>
			<label for="Color">Color:</label> 
			<input type="text" placeholder="Enter color" name="color"><br>
			<label for="Plate Number">Plate Number: <i>(XXX XXX)</i></label> 
			<input type="text" placeholder="Enter License Plate" name="pNumber"><br> 
		<center><button type="submit" class="btn save">Save</button>
		<button type="button" class="btn cancel" onclick="closeForm()">Cancel</button></center>
		</form>
		<script>
			function openForm(){
			document.getElementById("createEmp").style.display="block";}
			function closeForm() {
			document.getElementById("createEmp").style.display="none";}
		</script> 
		</div>
	<!--*****SEARCH VEHICLE*****-->
<!--form-->
	<div id="search">
		<h1><center>Search Vehicles</center></h1>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
			<label>Vehicle No: </label><input type="text" id="vNo" name="vNo"> 
			<label>Make: </label><input type="text" id="make" name="make">
			<label>Model: </label><input type="text" id="model" name="model">
			<label>Year: </label><input type="text" id="y" name="y">
			<label>Employee ID: </label><input type="text" id="eNo" name="eNo">
			<input type="submit" id="searchButton" name="search" value="Search">
	</div>
<!--function-->
<?php
require 'open-db.php';
if (isset($_POST['search'])){
	if ($_POST['vNo']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$Vehicle_ID= $_POST['vNo'];
		$Vid= mysqli_query($conn, "SELECT Emp_Number, Vehicle_ID, First_Name, Last_Name, Make, Model, Year, Color, Plate_Number 
								FROM employee RIGHT JOIN vehicle on Vehicle_ID=V_ID where Vehicle_ID=$Vehicle_ID");
		echo '<table>
	<tr>
		<th>Vehicle ID</th>
		<th>Make</th>
		<th>Model</th>
		<th>Year</th>
		<th>Color</th>
		<th>Plate Number</th>
		<th>Assigned To</th>
		<th></th>
		<th></th>
	</tr>';
		while ($row = mysqli_fetch_array($Vid)) {
			$id=$row['Vehicle_ID'];
			echo "<tr>";
			echo "<td>" . $row['Vehicle_ID'] . "</td>";
			echo "<td>" . $row['Make'] . "</td>";
			echo "<td>" . $row['Model'] . "</td>";
			echo "<td>" . $row['Year'] . "</td>";
			echo "<td>" . $row['Color'] . "</td>";
			echo "<td>" . $row['Plate_Number'] . "</td>";
			echo "<td>" . $row['First_Name'] . " " . $row['Last_Name']. "</td>";
			echo "<td class='details'><a href='UpdateVehicleForm.php.php?id=$id'><b>Update</b></a></td>";
			echo "<td class='details'><a href='deleteFormVehicle.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
		echo "</tr>";}
	echo '</table>'; }
	elseif ($_POST['make']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$Make= $_POST['make'];
		$mk= mysqli_query($conn, "SELECT Emp_Number, Vehicle_ID, First_Name, Last_Name, Make, Model, Year, Color, Plate_Number 
								FROM employee RIGHT JOIN vehicle on Vehicle_ID=V_ID where Make like '%$Make%'");
		echo '<table>
	<tr>
		<th>Vehicle ID</th>
		<th>Make</th>
		<th>Model</th>
		<th>Year</th>
		<th>Color</th>
		<th>Plate Number</th>
		<th>Assigned To</th>
		<th></th>
		<th></th>
	</tr>';
		while ($row = mysqli_fetch_array($mk)) {
			$id=$row['Vehicle_ID'];
			echo "<tr>";
			echo "<td>" . $row['Vehicle_ID'] . "</td>";
			echo "<td>" . $row['Make'] . "</td>";
			echo "<td>" . $row['Model'] . "</td>";
			echo "<td>" . $row['Year'] . "</td>";
			echo "<td>" . $row['Color'] . "</td>";
			echo "<td>" . $row['Plate_Number'] . "</td>";
			echo "<td>" . $row['First_Name'] . " " . $row['Last_Name']. "</td>";
			echo "<td class='details'><a href='UpdateVehicleForm.php.php?id=$id'><b>Update</b></a></td>";
			echo "<td class='details'><a href='deleteFormVehicle.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
		echo "</tr>";}
	echo '</table>';} 
	elseif ($_POST['model']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$Model= $_POST['model'];
		$md= mysqli_query($conn, "SELECT Emp_Number, Vehicle_ID, First_Name, Last_Name, Make, Model, Year, Color, Plate_Number 
								FROM employee RIGHT JOIN vehicle on Vehicle_ID=V_ID where Model like '%$Model%'");
		echo '<table>
	<tr>
		<th>Vehicle ID</th>
		<th>Make</th>
		<th>Model</th>
		<th>Year</th>
		<th>Color</th>
		<th>Plate Number</th>
		<th>Assigned To</th>
		<th></th>
		<th></th>
	</tr>';
		while ($row = mysqli_fetch_array($md)) {
			$id=$row['Vehicle_ID'];
			echo "<tr>";
			echo "<td>" . $row['Vehicle_ID'] . "</td>";
			echo "<td>" . $row['Make'] . "</td>";
			echo "<td>" . $row['Model'] . "</td>";
			echo "<td>" . $row['Year'] . "</td>";
			echo "<td>" . $row['Color'] . "</td>";
			echo "<td>" . $row['Plate_Number'] . "</td>";
			echo "<td>" . $row['First_Name'] . " " . $row['Last_Name']. "</td>";
			echo "<td class='details'><a href='UpdateVehicleForm.php?id=$id'><b>Update</b></a></td>";
			echo "<td class='details'><a href='deleteFormVehicle.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
		echo "</tr>";}
	echo '</table>';} 
	elseif ($_POST['y']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$Year= $_POST['y'];
		$y= mysqli_query($conn, "SELECT Emp_Number, Vehicle_ID, First_Name, Last_Name, Make, Model, Year, Color, Plate_Number 
								FROM employee RIGHT JOIN vehicle on Vehicle_ID=V_ID where Year like '%$Year%'");
		echo '<table>
	<tr>
		<th>Vehicle ID</th>
		<th>Make</th>
		<th>Model</th>
		<th>Year</th>
		<th>Color</th>
		<th>Plate Number</th>
		<th>Assigned To</th>
		<th></th>
		<th></th>
	</tr>';
			while ($row = mysqli_fetch_array($y)) {
				$id=$row['Vehicle_ID'];
			echo "<tr>";
			echo "<td>" . $row['Vehicle_ID'] . "</td>";
			echo "<td>" . $row['Make'] . "</td>";
			echo "<td>" . $row['Model'] . "</td>";
			echo "<td>" . $row['Year'] . "</td>";
			echo "<td>" . $row['Color'] . "</td>";
			echo "<td>" . $row['Plate_Number'] . "</td>";
			echo "<td>" . $row['First_Name'] . " " . $row['Last_Name']. "</td>";
			echo "<td class='details'><a href='UpdateVehicleForm.php?id=$id'><b>Update</b></a></td>";
			echo "<td class='details'><a href='deleteFormVehicle.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
			echo "</tr>";}
			echo "</table>";}	
	elseif ($_POST['eNo']){
		echo "<style>
			.formDefault{
				display: none;
			} </style>";
		$Emp_Number= $_POST['eNo'];
		$eNo= mysqli_query($conn, "SELECT Emp_Number, Vehicle_ID, First_Name, Last_Name, Make, Model, Year, Color, Plate_Number 
								FROM employee LEFT JOIN vehicle on Vehicle_ID=V_ID where Emp_Number=$Emp_Number");
		echo '<table>
	<tr>
		<th>Vehicle ID</th>
		<th>Make</th>
		<th>Model</th>
		<th>Year</th>
		<th>Color</th>
		<th>Plate Number</th>
		<th>Assigned To</th>
		<th></th>
		<th></th>
	</tr>';
		while ($row = mysqli_fetch_array($eNo)) {
			$id=$row['Vehicle_ID'];
			echo "<tr>";
			echo "<td>" . $row['Vehicle_ID'] . "</td>";
			echo "<td>" . $row['Make'] . "</td>";
			echo "<td>" . $row['Model'] . "</td>";
			echo "<td>" . $row['Year'] . "</td>";
			echo "<td>" . $row['Color'] . "</td>";
			echo "<td>" . $row['Plate_Number'] . "</td>";
			echo "<td>" . $row['First_Name'] . " " . $row['Last_Name']. "</td>";
			echo "<td class='details'><a href='UpdateVehicleForm.php?id=$id'><b>Update</b></a></td>";
			echo "<td class='details'><a href='deleteFormVehicle.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
		echo "</tr>";}
	echo '</table>';} 
			}
?>		
	
		<!--Display all department info by default on main department page-->
	<?php 
	echo '<link rel="stylesheet" type = "text/css" href="../css/results.css">';
	echo '<link rel="stylesheet" type = "text/css" href="../css/searchStyle.css">';
	echo '<link rel="stylesheet" type = "text/css" href="../css/style.css">';
	require 'open-db.php';
	$result= mysqli_query($conn, "SELECT * FROM vehicle");
	echo '<div class = "formDefault"><table>
	<tr>
		<th>Vehicle ID</th>
		<th>Make</th>
		<th>Model </th>
		<th>Year</th>
		<th>Color</th>
		<th>Plate Number</th>
		<th></th>
		<th></th>
	</tr>';
	while ($row = mysqli_fetch_array($result)) {
		$id=$row['Vehicle_ID'];
		echo "<tr>";
		echo "<td>" . $row['Vehicle_ID'] . "</td>";
		echo "<td>" . $row['Make'] . "</td>";
		echo "<td>" . $row['Model'] . "</td>";
		echo "<td>" . $row['Year'] . "</td>";
		echo "<td>" . $row['Color'] . "</td>";
		echo "<td>" . $row['Plate_Number'] . "</td>";
		echo "<td class='details'><a href='UpdateVehicleForm.php?id=$id'><b>Update</b></a></td>";
		echo "<td class='details'><a href='deleteFormVehicle.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
		echo "</tr></div>";
	}
	echo '</table>'; ?>	

		</div>
	
	</body>
</html>
