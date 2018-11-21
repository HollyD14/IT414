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
	<div id="search">
		<h1><center>???Search Project???</center></h1>
		<form method="POST" action="search.php"> <!--change form action to correct file name and change variables-->
			<label>Project ID: </label><input type="text" id="dNo" name="dNo"> 
			<label>Project Name: </label><input type="text" id="dName" name="dName">
			<label>Employee ID: </label><input type="text" id="dAddr" name="dAddr">
			<input type="submit" id="searchButton" value="Search">
	</div>
	
		<!--Display all department info by default on main department page-->
	<?php 
	echo '<link rel="stylesheet" type = "text/css" href="../css/results.css">';
	echo '<link rel="stylesheet" type = "text/css" href="../css/searchStyle.css">';
	echo '<link rel="stylesheet" type = "text/css" href="../css/style.css">';
	require 'open-db.php';
	$result= mysqli_query($conn, "SELECT Project_ID, Project_Name, Start_Date, End_Date FROM project");
	echo '<table>
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
		echo "<td class='details'><a href='UpdateProjectForm.php?id=$id'>Update</a></td>";
		echo "<td class='details'><a href='deleteFormProj.php?id=$id'>Delete</a></td>";
		echo "</tr>";
	}
	echo '</table>'; ?>	

		</div>
	
	</body>
</html>
