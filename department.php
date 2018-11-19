<!doctype html>
<html lang ="en">
	<head>
		<title>Department</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../css/pageStyle.css" rel="stylesheet" type="text/css"/>
		<link href="../css/searchStyle.css" rel="stylesheet" type="text/css"/>
		<link href="../css/resultStyle.css" rel="stylesheet" type="text/css"/>
		<link href="../css/popupFormStyle.css" rel="stylesheet" type="text/css"/>
		<?php include 'headerFooter.php'?>
	</head>
	
					<!--*****ADD DEPARTMENT***** -->
	<button class="openButton" onclick="openForm()"> + Add Department</button> 
	<div class="formPopup" id="createDept"> 
		<form action="addDept.php" method="post" class="formContainer">
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
		<script> //open or close form
			function openForm(){
			document.getElementById("createDept").style.display="block";}
			function closeForm() {
			document.getElementById("createDept").style.display="none";}
		</script> 
		</div>

					<!--*****SEARCH DEPARTMENTS*****--> 
<!--form-->	
	<div id="search">
		<h1><center>Search Departments</center></h1>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
			<label>Department No: </label><input type="number" id="dNo" name="dNo"> 
			<label>Department Name: </label><input type="text" id="dName" name="dName">
			<label>Address: </label><input type="text" id="dAddr" name="dAddr">
			<label>Phone Number: </label><input type="text" id="dPhone" name="dPhone">
			<input type="submit" id="searchButton" name="search" value="Search">
	</div> 	
<!--function-->
<?php
require 'open-db.php';
if (isset($_POST['search'])){
	if ($_POST['dNo']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$Dept_ID= $_POST['dNo'];
		$Did= mysqli_query($conn, "SELECT * FROM department where Dept_ID=$Dept_ID");
		echo '<table>
		<tr>
			<th>Department Number</th>
			<th>Department Name</th>
			<th>Office Address</th>
			<th>Office Phone</th>
			<th></th>
			<th></th>
		</tr>';
			while ($row = mysqli_fetch_array($Did)) {
				$id=$row['Dept_ID'];
				echo "<tr>";
				echo "<td>" . $row['Dept_ID'] . "</td>";
				echo "<td>" . $row['Dept_Name'] . "</td>";
				echo "<td>" . $row['Office_Addr'] . "</td>";
				echo "<td>" . $row['Office_Phone'] . "</td>";
				echo "<td class='details'><a href='UpdateForm.php?id=$id'>Update</a></td>";
				echo "<td class='details'><a href='deleteFormDept.php?id=$id'>Delete</a></td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['dName']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$Dept_Name= $_POST['dName'];
		$name= mysqli_query($conn, "SELECT * FROM department where Dept_Name like '%$Dept_Name%'");
		echo '<table>
		<tr>
			<th>Department Number</th>
			<th>Department Name</th>
			<th>Office Address</th>
			<th>Office Phone</th>
			<th></th>
			<th></th>
		</tr>';
		while ($row = mysqli_fetch_array($name)) {
				$id=$row['Dept_ID'];
				echo "<tr>";
				echo "<td>" . $row['Dept_ID'] . "</td>";
				echo "<td>" . $row['Dept_Name'] . "</td>";
				echo "<td>" . $row['Office_Addr'] . "</td>";
				echo "<td>" . $row['Office_Phone'] . "</td>";
				echo "<td class='details'><a href='UpdateForm.php?id=$id'>Update</a></td>";
				echo "<td class='details'><a href='deleteFormDept.php?id=$id'>Delete</a></td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['dAddr']){
		echo "<style>
			.formDefault{
				display: none;
			} </style>";
		$Office_Addr= $_POST['dAddr'];
		$addr= mysqli_query($conn, "SELECT * FROM department where Office_Addr like '%$Office_Addr%'");
		echo '<table>
		<tr>
			<th>Department Number</th>
			<th>Department Name</th>
			<th>Office Address</th>
			<th>Office Phone</th>
			<th></th>
			<th></th>
		</tr>';
		while ($row = mysqli_fetch_array($addr)) {
				$id=$row['Dept_ID'];
				echo "<tr>";
				echo "<td>" . $row['Dept_ID'] . "</td>";
				echo "<td>" . $row['Dept_Name'] . "</td>";
				echo "<td>" . $row['Office_Addr'] . "</td>";
				echo "<td>" . $row['Office_Phone'] . "</td>";
				echo "<td class='details'><a href='UpdateForm.php?id=$id'>Update</a></td>";
				echo "<td class='details'><a href='deleteFormDept.php?id=$id'>Delete</a></td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['dPhone']){
		echo "<style>
			.formDefault{
				display: none;
			} </style>";
		$Office_Phone= $_POST['dPhone'];
		$phone= mysqli_query($conn, "SELECT * FROM department where Office_Phone like '%$Office_Phone%'");
		echo '<table><tr>
			<th>Department Number</th>
			<th>Department Name</th>
			<th>Office Address</th>
			<th>Office Phone</th>
			<th></th>
			<th></th></tr>';
			while ($row = mysqli_fetch_array($phone)) {
				$id=$row['Dept_ID'];
				echo "<tr>";
				echo "<td>" . $row['Dept_ID'] . "</td>";
				echo "<td>" . $row['Dept_Name'] . "</td>";
				echo "<td>" . $row['Office_Addr'] . "</td>";
				echo "<td>" . $row['Office_Phone'] . "</td>";
				echo "<td class='details'><a href='UpdateForm.php?id=$id'>Update</a></td>";
				echo "<td class='details'><a href='deleteFormDept.php?id=$id'>Delete</a></td>";
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
	$result= mysqli_query($conn, "SELECT Dept_ID, Dept_Name, Office_Addr, Office_Phone FROM department");
	echo '<div class = "formDefault"><table>
	<tr>
		<th>Department Number</th>
		<th>Department Name</th>
		<th>Office Address</th>
		<th>Office Phone</th>
		<th></th>
		<th></th>
	</tr>';
	while ($row = mysqli_fetch_array($result)) {
		$id=$row['Dept_ID'];
		echo "<tr>";
		echo "<td>" . $row['Dept_ID'] . "</td>";
		echo "<td>" . $row['Dept_Name'] . "</td>";
		echo "<td>" . $row['Office_Addr'] . "</td>";
		echo "<td>" . $row['Office_Phone'] . "</td>";
		echo "<td class='details'><a href='UpdateForm.php?id=$id'>Update</a></td>";
		echo "<td class='details'><a href='deleteFormDept.php?id=$id'>Delete</a></td>";
		echo "</tr>";}
	echo '</table></div>'; ?>	
	
		</div>
	</body>
</html>
