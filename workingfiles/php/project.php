<!doctype html>
<html lang ="en">
	<head>
		<title>Project</title>
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
						<!--*****ADD PROJECTS***** -->
	<button class="openButton" onclick="openForm()">+ Add Project</button>
	<div class="formPopup" id="createProj">
		<form action="addProj.php" method="post" class="formContainer"> 
			<h1>Add Project</h1>
			<label for="Project ID"><b>Project No.</b></label>
			<input type="number" placeholder="Enter Project #" name="pNo" required><br>
			<label for="Project Name"><b>Project Name</b></label>
			<input type="text" placeholder="Enter Project Name" name="pName" required><br>
			<label for="Start Date"><b>Start Date</b></label> 
			<input type="text" placeholder="Enter Start Date" name="sDate" required><br>
			<label for="End Date"><b>End Date</b></label> 
			<input type="text" placeholder="Enter End Date" name="eDate"><br>
		<center><button type="submit" class="btn save">Save</button>
		<button type="button" class="btn cancel" onclick="closeForm()">Cancel</button></center>
		</form>
		<script>
			function openForm(){
			document.getElementById("createProj").style.display="block";}
			function closeForm() {
			document.getElementById("createProj").style.display="none";}
		</script> 
		</div>
	<!--*****SEARCH PROJECTS*****-->		
<!--form-->
	<div id="search">
		<h1><center>Search Project</center></h1>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
			<label>Project ID: </label><input type="number" id="pNo" name="pNo"> 
			<label>Project Name: </label><input type="text" id="pName" name="pName">
			<label>Employee ID: </label><input type="text" id="eNo" name="eNo">
			<label>Start Date: </label><input type="text" id="start" name="start">
			<label>End Date: </label><input type="text" id="end" name="end">
			<input type="submit" id="searchButton" name="search" value="Search">
	</div>
<!--function-->
<?php
require 'open-db.php';
if (isset($_POST['search'])){
	if ($_POST['pNo']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$Project_ID= $_POST['pNo'];
		$Pid= mysqli_query($conn, "SELECT Emp_Number, Project_ID, Project_Name, First_Name, Last_Name, project.Start_Date, End_Date 
								FROM employee RIGHT JOIN project on Proj_ID=Project_ID where Project_ID=$Project_ID");
		echo '<table>
	<tr>
		<th>Project ID</th>
		<th>Project Name</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>Assigned To</th>
		<th></th>
		<th></th>
	</tr>';
			while ($row = mysqli_fetch_array($Pid)) {
				$id=$row['Project_ID'];
				echo "<tr>";
				echo "<td>" . $row['Project_ID'] . "</td>";
				echo "<td>" . $row['Project_Name'] . "</td>";
				echo "<td>" . $row['Start_Date'] . "</td>";
				echo "<td>" . $row['End_Date'] . "</td>";
				echo "<td>" . $row['First_Name'] . " " . $row['Last_Name']. "</td>";
				echo "<td class='details'><a href='UpdateProjectForm.php?id=$id'><b>Update</b></a></td>";
				echo "<td class='details'><a href='deleteFormPay.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['pName']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$Project_Name= $_POST['pName'];
		$pName= mysqli_query($conn, "SELECT Emp_Number, Project_ID, Project_Name, First_Name, Last_Name, project.Start_Date, End_Date 
									FROM employee RIGHT JOIN project on Proj_ID=Project_ID where Project_Name like '%$Project_Name%'");
		echo '<table>
	<tr>
		<th>Project ID</th>
		<th>Project Name</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>Assigned To</th>
		<th></th>
		<th></th>
	</tr>';
		while ($row = mysqli_fetch_array($pName)) {
				$id=$row['Project_ID'];
				echo "<tr>";
				echo "<td>" . $row['Project_ID'] . "</td>";
				echo "<td>" . $row['Project_Name'] . "</td>";
				echo "<td>" . $row['Start_Date'] . "</td>";
				echo "<td>" . $row['End_Date'] . "</td>";
				echo "<td>" . $row['First_Name'] . " " . $row['Last_Name']. "</td>";
				echo "<td class='details'><a href='UpdateProjectForm.php?id=$id'><b>Update</b></a></td>";
				echo "<td class='details'><a href='deleteFormPay.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['eNo']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$Emp_Number= $_POST['eNo'];
		$Eid= mysqli_query($conn, "SELECT Emp_Number, Project_ID, Project_Name, First_Name, Last_Name, project.Start_Date, End_Date 
								FROM employee LEFT JOIN project on Proj_ID=Project_ID where Emp_Number=$Emp_Number");
		echo '<table>
	<tr>
		<th>Project ID</th>
		<th>Project Name</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>Assigned To</th>
		<th></th>
		<th></th>
	</tr>';
			while ($row = mysqli_fetch_array($Eid)) {
				$id=$row['Project_ID'];
				echo "<tr>";
				echo "<td>" . $row['Project_ID'] . "</td>";
				echo "<td>" . $row['Project_Name'] . "</td>";
				echo "<td>" . $row['Start_Date'] . "</td>";
				echo "<td>" . $row['End_Date'] . "</td>";
				echo "<td>" . $row['First_Name'] . " " . $row['Last_Name']. "</td>";
				echo "<td class='details'><a href='UpdateProjectForm.php?id=$id'><b>Update</b></a></td>";
				echo "<td class='details'><a href='deleteFormPay.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['start']){
		echo "<style>
			.formDefault{
				display: none;
			} </style>";
		$Start_Date= $_POST['start'];
		$start= mysqli_query($conn, "SELECT Emp_Number, Project_ID, Project_Name, First_Name, Last_Name, project.Start_Date, End_Date 
									FROM employee RIGHT JOIN project on Proj_ID=Project_ID where project.Start_Date like '%$Start_Date%'");
		echo '<table>
	<tr>
		<th>Project ID</th>
		<th>Project Name</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>Assigned To</th>
		<th></th>
		<th></th>
	</tr>';
		while ($row = mysqli_fetch_array($start)) {
				$id=$row['Project_ID'];
				echo "<tr>";
				echo "<td>" . $row['Project_ID'] . "</td>";
				echo "<td>" . $row['Project_Name'] . "</td>";
				echo "<td>" . $row['Start_Date'] . "</td>";
				echo "<td>" . $row['End_Date'] . "</td>";
				echo "<td>" . $row['First_Name'] . " " . $row['Last_Name']. "</td>";
				echo "<td class='details'><a href='UpdateProjectForm.php?id=$id'><b>Update</b></a></td>";
				echo "<td class='details'><a href='deleteFormPay.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['end']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$End_Date= $_POST['end'];
		$end= mysqli_query($conn, "SELECT Emp_Number, Project_ID, Project_Name, First_Name, Last_Name, project.Start_Date, End_Date 
								FROM employee RIGHT JOIN project on Proj_ID=Project_ID where End_Date like '%$End_Date%'");
		echo '<table>
	<tr>
		<th>Project ID</th>
		<th>Project Name</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>Assigned To</th>
		<th></th>
		<th></th>
	</tr>';
			while ($row = mysqli_fetch_array($end)) {
				$id=$row['Project_ID'];
				echo "<tr>";
				echo "<td>" . $row['Project_ID'] . "</td>";
				echo "<td>" . $row['Project_Name'] . "</td>";
				echo "<td>" . $row['Start_Date'] . "</td>";
				echo "<td>" . $row['End_Date'] . "</td>";
				echo "<td>" . $row['First_Name'] . " " . $row['Last_Name']. "</td>";
				echo "<td class='details'><a href='UpdateProjectForm.php?id=$id'><b>Update</b></a></td>";
				echo "<td class='details'><a href='deleteFormPay.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
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
	$result= mysqli_query($conn, "SELECT Project_ID, Project_Name, Start_Date, End_Date FROM project");
	echo '<div class="formDefault"><table>
	<tr>
		<th>Project ID</th>
		<th>Project Name</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th></th>
		<th></th>
	</tr>';
	while ($row = mysqli_fetch_array($result)) {
		$id=$row['Project_ID'];
		echo "<tr>";
		echo "<td>" . $row['Project_ID'] . "</td>";
		echo "<td>" . $row['Project_Name'] . "</td>";
		echo "<td>" . $row['Start_Date'] . "</td>";
		echo "<td>" . $row['End_Date'] . "</td>";
		echo "<td class='details'><a href='UpdateProjectForm.php?id=$id'><b>Update</b></a></td>";
		echo "<td class='details'><a href='deleteFormProj.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
		echo "</tr></div>";
	}
	echo '</table>'; ?>	

		</div>
	
	</body>
</html>
