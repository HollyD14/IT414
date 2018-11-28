<!doctype html>
<html lang ="en">
	<head>
		<title>Employee</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../css/pageStyle.css" rel="stylesheet" type="text/css"/>
		<link href="../css/searchStyle.css" rel="stylesheet" type="text/css"/>
		<link href="../css/resultStyle.css" rel="stylesheet" type="text/css"/>
		<link href="../css/popupFormStyle.css" rel="stylesheet" type="text/css"/>
		<?php include 'headerFooter.php'?>
	</head>
	<body>
					<!--*****ADD EMPLOYEE***** -->
		<div id="container">
	<button class="openButton" onclick="openForm()">+ Add Employee</button>
	<div class="formPopup" id="createEmp">
		<form action="addEmp.php" method="post" class="formContainer"> 
			<h1>Add Employee</h1>
			<label for="Employee No.">Employee Number:</label>
			<input type="number" placeholder="Enter Employee # (REQUIRED)" name="eNo" required><br>
			<label for="First Name">First Name:</label>
			<input type="text" placeholder="Enter First Name (REQUIRED)" name="eFName" required><br>
			<label for="Last Name">Last Name:</label> 
			<input type="text" placeholder="Enter Last Name (REQUIRED)" name="eLName" required><br>
			<label for="Date of Birth">Date of Birth: <i>(YYYY-MM-DD)</i></label> 
			<input type="text" placeholder="Enter birth date" name="bdate"><br>
			<label for="Sex">Sex: </label>
				<select id="Sex" name="Sex">
			  	<option value=NULL> </option>
				<option value="M">M</option>
				<option value="F">F</option>
			  </select>
			<br>
			<label for="Office Address">Address:</label> 
			<input type="text" placeholder="Enter Home Address" name="eAddr"><br>
			<label for="SSN">SSN: <i>(no dashes)</i></label> 
			<input type="text" placeholder="Enter SSN" name="ssn"><br>
			<label for="Start Date">Start Date:</label>
			<input type="text" placeholder="Enter Start Date" name="startDate"><br>
		<center><button type="submit" class="btn save">Save</button>
		<button type="button" class="btn cancel" onclick="closeForm()">Cancel</button></center>
		</form>
		<script>
			function openForm(){ //open or close form
			document.getElementById("createEmp").style.display="block";}
			function closeForm() {
			document.getElementById("createEmp").style.display="none";}
		</script> 
		</div>
		
							<!--*****SEARCH EMPLOYEES*****--> 
<!--form-->	
	<div id="search">
		<h1><center>Search Employees</center></h1>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST"> 
			<label>Employee No: </label><input type="number" id="eNo" name="eNo"> 
			<label>First Name: </label><input type="text" id="fName" name="fName">
			<label>Last Name: </label><input type="text" id="lName" name="lName">
			<label>Start Date: </label><input type="text" id="date" name="date">
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
		$Emp_Number= $_POST['eNo'];
		$Eid= mysqli_query($conn, "SELECT * FROM employee where Emp_Number=$Emp_Number");
		echo '<table>
	<tr>
		<th>Employee Number</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Birthdate</th>
		<th>Sex</th>
		<th>Address</th>
		<th>SSN</th>
		<th>Start Date</th>
		<th>Job ID</th>
		<th>Department ID</th>
		<th>Vehicle ID</th>
		<th>Payroll ID</th>
		<th></th>
		<th></th>
	</tr>';
			while ($row = mysqli_fetch_array($Eid)) {
				$id=$row['Emp_Number'];
				echo "<tr>";
				echo "<td>" . $row['Emp_Number'] . "</td>";
				echo "<td>" . $row['First_Name'] . "</td>";
				echo "<td>" . $row['Last_Name'] . "</td>";
				echo "<td>" . $row['Birth_Date'] . "</td>";
				echo "<td>" . $row['Sex'] . "</td>";
				echo "<td>" . $row['Address'] . "</td>";
				echo "<td>" . $row['SSN'] . "</td>";
				echo "<td>" . $row['Start_Date'] . "</td>";
				echo "<td>" . $row['J_ID'] . "</td>";
				echo "<td>" . $row['D_ID'] . "</td>";
				echo "<td>" . $row['V_ID'] . "</td>";
				echo "<td>" . $row['P_ID'] . "</td>";
				echo "<td class='details'><a href='UpdateEmployeeForm.php?id=$id'><b>Update</b></a></td>";
				echo "<td class='details'><a href='deleteFormEmp.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['fName']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$First_Name= $_POST['fName'];
		$FName= mysqli_query($conn, "SELECT * FROM employee where First_Name like '%$First_Name%'");
		echo '<table>
	<tr>
		<th>Employee Number</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Birthdate</th>
		<th>Sex</th>
		<th>Address</th>
		<th>SSN</th>
		<th>Start Date</th>
		<th>Job ID</th>
		<th>Department ID</th>
		<th>Vehicle ID</th>
		<th>Payroll ID</th>
		<th></th>
		<th></th>
	</tr>';
		while ($row = mysqli_fetch_array($FName)) {
				$id=$row['Emp_Number'];
				echo "<tr>";
				echo "<td>" . $row['Emp_Number'] . "</td>";
				echo "<td>" . $row['First_Name'] . "</td>";
				echo "<td>" . $row['Last_Name'] . "</td>";
				echo "<td>" . $row['Birth_Date'] . "</td>";
				echo "<td>" . $row['Sex'] . "</td>";
				echo "<td>" . $row['Address'] . "</td>";
				echo "<td>" . $row['SSN'] . "</td>";
				echo "<td>" . $row['Start_Date'] . "</td>";
				echo "<td>" . $row['J_ID'] . "</td>";
				echo "<td>" . $row['D_ID'] . "</td>";
				echo "<td>" . $row['V_ID'] . "</td>";
				echo "<td>" . $row['P_ID'] . "</td>";
				echo "<td class='details'><a href='UpdateEmployeeForm.php?id=$id'><b>Update</b></a></td>";
				echo "<td class='details'><a href='deleteFormEmp.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['lName']){
		echo "<style>
			.formDefault{
				display: none;
			} </style>";
		$Last_Name= $_POST['lName'];
		$lName= mysqli_query($conn, "SELECT * FROM employee where Last_Name like '%$Last_Name%'");
		echo '<table>
	<tr>
		<th>Employee Number</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Address</th>
		<th>Birthdate</th>
		<th>Sex</th>
		<th>SSN</th>
		<th>Start Date</th>
		<th>Job ID</th>
		<th>Department ID</th>
		<th>Vehicle ID</th>
		<th>Payroll ID</th>
		<th></th>
		<th></th>
	</tr>';
		while ($row = mysqli_fetch_array($lName)) {
				$id=$row['Emp_Number'];
				echo "<tr>";
				echo "<td>" . $row['Emp_Number'] . "</td>";
				echo "<td>" . $row['First_Name'] . "</td>";
				echo "<td>" . $row['Last_Name'] . "</td>";
				echo "<td>" . $row['Address'] . "</td>";
				echo "<td>" . $row['Birth_Date'] . "</td>";
				echo "<td>" . $row['Sex'] . "</td>";
				echo "<td>" . $row['SSN'] . "</td>";
				echo "<td>" . $row['Start_Date'] . "</td>";
				echo "<td>" . $row['J_ID'] . "</td>";
				echo "<td>" . $row['D_ID'] . "</td>";
				echo "<td>" . $row['V_ID'] . "</td>";
				echo "<td>" . $row['P_ID'] . "</td>";
				echo "<td class='details'><a href='UpdateEmployeeForm.php?id=$id'><b>Update</b></a></td>";
				echo "<td class='details'><a href='deleteFormEmp.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['date']){
		echo "<style>
			.formDefault{
				display: none;
			} </style>";
		$Start_Date= $_POST['date'];
		$date= mysqli_query($conn, "SELECT * FROM employee where Start_Date like '%$Start_Date%'");
		echo '<table>
	<tr>
		<th>Employee Number</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Address</th>
		<th>Birthdate</th>
		<th>Sex</th>
		<th>SSN</th>
		<th>Start Date</th>
		<th>Job ID</th>
		<th>Department ID</th>
		<th>Vehicle ID</th>
		<th>Payroll ID</th>
		<th></th>
		<th></th>
	</tr>';
			while ($row = mysqli_fetch_array($date)) {
				$id=$row['Emp_Number'];
				echo "<tr>";
				echo "<td>" . $row['Emp_Number'] . "</td>";
				echo "<td>" . $row['First_Name'] . "</td>";
				echo "<td>" . $row['Last_Name'] . "</td>";
				echo "<td>" . $row['Address'] . "</td>";
				echo "<td>" . $row['Birth_Date'] . "</td>";
				echo "<td>" . $row['Sex'] . "</td>";
				echo "<td>" . $row['SSN'] . "</td>";
				echo "<td>" . $row['Start_Date'] . "</td>";
				echo "<td>" . $row['J_ID'] . "</td>";
				echo "<td>" . $row['D_ID'] . "</td>";
				echo "<td>" . $row['V_ID'] . "</td>";
				echo "<td>" . $row['P_ID'] . "</td>";
				echo "<td class='details'><a href='UpdateEmployeeForm.php?id=$id'><b>Update</b></a></td>";
				echo "<td class='details'><a href='deleteFormEmp.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
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
	$result= mysqli_query($conn, "SELECT Emp_Number, First_Name, Last_Name, Address, Birth_Date, Sex, SSN, employee.Start_Date, position.Job_Title, department.Dept_Name, project.Project_Name, payroll.Salary, V_ID  
								  FROM employee 
								  LEFT JOIN position ON position.Job_ID = employee.J_ID 
								  LEFT JOIN department ON department.Dept_ID = employee.D_ID
								  LEFT JOIN project ON project.Project_ID = employee.Proj_ID
								  LEFT JOIN payroll ON payroll.Payroll_ID = employee.P_ID
								  ORDER BY Emp_Number");
								  
//CONCAT(SUBSTR(employee.SSN,1,3), '-', SUBSTR(employee.SSN,4,2), '-', SUBSTR(employee.SSN,6,4))


	echo '<div class = "formDefault"><table>
	<tr>
		<th>Employee Number</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Address</th>
		<th>Birthdate</th>
		<th>Sex</th>
		<th>SSN</th>
		<th>Start Date</th>
		<th>Position</th>
		<th>Department</th>
		<th>Project</th>	
		<th>Salary</th>		
		<th>Vehicle ID</th>
		<th></th>
		<th></th>
	</tr>';
	while ($row = mysqli_fetch_array($result)) {
		$id=$row['Emp_Number'];
		//$SSN=strtoupper($row['SSN']);
		//$SSN = SUBSTR($row['SSN'],1,3). '-'.SUBSTR($row['SSN'],4,2). '-'. SUBSTR($row['SSN'],5,4);
		echo "<tr>";
		echo "<td>" . $row['Emp_Number'] . "</td>";
		echo "<td>" . $row['First_Name'] . "</td>";
		echo "<td>" . $row['Last_Name'] . "</td>";
		echo "<td>" . $row['Address'] . "</td>";		
		echo "<td>" . $row['Birth_Date'] . "</td>";
		echo "<td>" . $row['Sex'] . "</td>";
		echo "<td>" . SUBSTR($row['SSN'],1,3). '-'.SUBSTR($row['SSN'],4,2). '-'. SUBSTR($row['SSN'],5,4) . "</td>";
		//echo "<td>" . $SSN ."</td>";
		echo "<td>" . $row['Start_Date'] . "</td>";
		echo "<td>" . $row['Job_Title'] . "</td>";
		echo "<td>" . $row['Dept_Name'] . "</td>";
		echo "<td>" . $row['Project_Name'] . "</td>";
		echo "<td>" . '$'. $row['Salary'] . "</td>";		
		echo "<td>" . $row['V_ID'] . "</td>";
		echo "<td class='details'><a href='UpdateEmployeeForm.php?id=$id'><b>Update</b></a></td>";
		echo "<td class='details'><a href='deleteFormEmp.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
		echo "</tr>";
	}
	echo '</table>'; ?>	

		</div>
	
	</body>
</html>
