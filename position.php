<!doctype html>
<html lang ="en">
	<head>
		<title>Position</title>
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

	<button class="openButton" onclick="openForm()">+ Add Employee</button>
	<div class="formPopup" id="createEmp">
		<form action="addEmp.php" method="post" class="formContainer"> 
			<h1>Add Employee</h1>
			<label for="Employee No."><b>Employee No.</b></label>
			<input type="number" placeholder="Enter Employee #" name="eNo" required><br>
			<label for="First Name"><b>First Name</b></label>
			<input type="text" placeholder="Enter First Name" name="eFName" required><br>
			<label for="Last Name"><b>Last Name</b></label> 
			<input type="text" placeholder="Enter Last Name" name="eLName" required><br>
			<label for="Office Address"><b>Date of Birth</b></label> 
			<input type="text" placeholder="Enter birth date" name="bdate"><br>
			<label for="Office Address"><b>Sex</b></label> 
			<input type="text" placeholder="Enter sex" name="sex"><br>
			<label for="Office Address"><b>Address</b></label> 
			<input type="text" placeholder="Enter Home Address" name="eAddr"><br>
			<label for="Office Address"><b>SSN</b></label> 
			<input type="text" placeholder="Enter SSN" name="ssn"><br>
			<label for="Emp Phone Number"><b>Start Date</b></label>
			<input type="text" placeholder="Enter Start Date" name="startDate"><br>
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
	<!--*****SEARCH POSITION*****-->
<!--form-->
	<div id="search">
		<h1><center>Search Positions</center></h1>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
			<label>Employee No: </label><input type="text" id="eNo" name="eNo"> 
			<label>First Name: </label><input type="text" id="fName" name="fName">
			<label>Last Name: </label><input type="text" id="lName" name="lName">
			<label>Position ID: </label><input type="text" id="Pid" name="Pid">
			<label>Job Title: </label><input type="text" id="title" name="title">

			<input type="submit" id="searchButton" name="search" value="Search">
	</div>
	<!--function-->
<?php
require 'open-db.php';
if (isset($_POST['search'])){
	if ($_POST['eNo']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$Emp_Number=$_POST['eNo'];
		$Eid= mysqli_query($conn, "SELECT Emp_Number, Job_ID, First_Name, Last_Name, Job_Title, Dept_Name FROM ((employee inner join position on Job_ID=J_ID) inner join department on Dept_ID=D_ID) where Emp_Number=$Emp_Number");
		echo '<table>
		<tr>
			<th>Job ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Job Title</th>
			<th>Department</th>
		</tr>';
			while ($row = mysqli_fetch_array($Eid)) {
				echo "<tr>";
				echo "<td>" . $row['Job_ID'] . "</td>";
				echo "<td>" . $row['First_Name'] . "</td>";
				echo "<td>" . $row['Last_Name'] . "</td>";
				echo "<td>" . $row['Job_Title'] . "</td>";
				echo "<td>" . $row['Dept_Name'] . "</td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['fName']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$First_Name= $_POST['fName'];
		$fName= mysqli_query($conn, "SELECT Emp_Number, Job_ID, First_Name, Last_Name, Job_Title, Dept_Name FROM ((employee inner join position on Job_ID=J_ID) inner join department on Dept_ID=D_ID) where First_Name like '%$First_Name%'");
		echo '<table>
		<tr>
			<th>Job ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Job Title</th>
			<th>Department</th>
		</tr>';
		while ($row = mysqli_fetch_array($fName)) {
				echo "<tr>";
				echo "<td>" . $row['Job_ID'] . "</td>";
				echo "<td>" . $row['First_Name'] . "</td>";
				echo "<td>" . $row['Last_Name'] . "</td>";
				echo "<td>" . $row['Job_Title'] . "</td>";
				echo "<td>" . $row['Dept_Name'] . "</td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['lName']){
		echo "<style>
			.formDefault{
				display: none;
			} </style>";
		$Last_Name= $_POST['lName'];
		$lName= mysqli_query($conn, "SELECT Emp_Number, Job_ID, First_Name, Last_Name, Job_Title, Dept_Name FROM ((employee inner join position on Job_ID=J_ID) inner join department on Dept_ID=D_ID) where Last_Name like '%$Last_Name%'");
		echo '<table>
		<tr>
			<th>Job ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Job Title</th>
			<th>Department</th>
		</tr>';
		while ($row = mysqli_fetch_array($lName)) {
				echo "<tr>";
				echo "<td>" . $row['Job_ID'] . "</td>";
				echo "<td>" . $row['First_Name'] . "</td>";
				echo "<td>" . $row['Last_Name'] . "</td>";
				echo "<td>" . $row['Job_Title'] . "</td>";
				echo "<td>" . $row['Dept_Name'] . "</td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['Pid']){
		echo "<style>
			.formDefault{
				display: none;
			} </style>";
		$Job_ID= $_POST['Pid'];
		$Pid= mysqli_query($conn, "SELECT Emp_Number, Job_ID, First_Name, Last_Name, Job_Title, Dept_Name FROM ((employee inner join position on Job_ID=J_ID) inner join department on Dept_ID=D_ID) where Job_ID=$Job_ID");
		echo '<table>
		<tr>
			<th>Job ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Job Title</th>
			<th>Department</th>
		</tr>';
			while ($row = mysqli_fetch_array($Pid)) {
				echo "<tr>";
				echo "<td>" . $row['Job_ID'] . "</td>";
				echo "<td>" . $row['First_Name'] . "</td>";
				echo "<td>" . $row['Last_Name'] . "</td>";
				echo "<td>" . $row['Job_Title'] . "</td>";
				echo "<td>" . $row['Dept_Name'] . "</td>";
				echo "</tr>";}
		echo '</table>';}
		elseif ($_POST['title']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$Job_Title= $_POST['title'];
		$title= mysqli_query($conn, "SELECT Emp_Number, Job_ID, First_Name, Last_Name, Job_Title, Dept_Name FROM ((employee inner join position on Job_ID=J_ID) inner join department on Dept_ID=D_ID) where Job_Title like '%$Job_Title%'");
		echo '<table>
		<tr>
			<th>Job ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Job Title</th>
			<th>Department</th>

		</tr>';
		while ($row = mysqli_fetch_array($title)) {
				echo "<tr>";
				echo "<td>" . $row['Job_ID'] . "</td>";
				echo "<td>" . $row['First_Name'] . "</td>";
				echo "<td>" . $row['Last_Name'] . "</td>";
				echo "<td>" . $row['Job_Title'] . "</td>";
				echo "<td>" . $row['Dept_Name'] . "</td>";
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
	$result= mysqli_query($conn, "SELECT * FROM position");
	echo '<div class="formDefault"><table>
	<tr>
		<th>Job ID</th>
		<th>Job Title</th>
		<th>Base Salary</th>
		<th></th>
		<th></th>
	</tr>';
	while ($row = mysqli_fetch_array($result)) {
		$id=$row['Job_ID'];
		echo "<tr>";
		echo "<td>" . $row['Job_ID'] . "</td>";
		echo "<td>" . $row['Job_Title'] . "</td>";
		echo "<td>" . '$'. $row['Base_Salary'] . "</td>";	
		echo "<td class='details'><a href='UpdatePositionForm.php?id=$id'>Update</a></td>";
		echo "<td class='details'><a href='deleteFormPos.php?id=$id'>Delete</a></td>";
		echo "</tr></div>";
	}
	echo '</table>'; ?>	

		</div>
	
	</body>
</html>
