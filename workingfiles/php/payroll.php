<!doctype html>
<html lang ="en">
	<head>
		<title>Payroll</title>
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
			<!--*****ADD PAYROLL***** -->
	<button class="openButton" onclick="openForm()">+ Add Payroll</button>
	<div class="formPopup" id="createPay">
		<form action="addPay.php" method="post" class="formContainer"> 
			<h1>Add Payroll</h1>
			<label for="Payroll ID">Payroll ID:</label>
			<input type="number" placeholder="Enter Payroll #" name="pNo" required><br>
			<label for="Salary">Salary <i>(with or without commas)</i>:</label> 
			<input type="text" placeholder="Enter Salary" name="salary" required><br>
			<label for="Garnishment">Garnishments <i>(with or without commas)</i>:</label> 
			<input type="text" placeholder=" Enter Wage Garnishment" name="garnishment"><br>
		<center><button type="submit" class="btn save">Save</button>
		<button type="button" class="btn cancel" onclick="closeForm()">Cancel</button></center>
		</form>
		<script> //open or close form
			function openForm(){
			document.getElementById("createPay").style.display="block";}
			function closeForm() {
			document.getElementById("createPay").style.display="none";}
		</script> 
		</div>	
	<!--*****SEARCH PAYROLL*****-->
<!--form-->
	<div id="search">
		<h1><center>Search Employee Payroll Records</center></h1>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
			<label>Employee No: </label><input type="text" id="eNo" name="eNo"> 
			<label>First Name: </label><input type="text" id="fName" name="fName">
			<label>Last Name: </label><input type="text" id="lName" name="lName">
			<label>Payroll ID: </label><input type="text" id="Pid" name="Pid">
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
		$Eid= mysqli_query($conn, "SELECT Emp_Number, Payroll_ID, First_Name, Last_Name, Salary, Garnishments 
								FROM employee 
								LEFT JOIN payroll on P_ID=Payroll_ID where Emp_Number=$Emp_Number");
		echo '<table>
	<tr>
		<th>Payroll ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Salary</th>
		<th>Garnishments</th>
		<th></th>
	</tr>';
			while ($row = mysqli_fetch_array($Eid)) {
				$id=$row['Payroll_ID'];
				echo "<tr>";
				echo "<td>" . $row['Payroll_ID'] . "</td>";
				echo "<td>" . $row['First_Name'] . "</td>";
				echo "<td>" . $row['Last_Name'] . "</td>";
				echo "<td>" . $row['Salary'] . "</td>";
				echo "<td>" . $row['Garnishments'] . "</td>";
				echo "<td class='details'><a href='UpdatePayrollForm.php?id=$id'><b>Update</b></a></td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['fName']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$First_Name= $_POST['fName'];
		$fName= mysqli_query($conn, "SELECT Emp_Number, Payroll_ID, First_Name, Last_Name, Salary, Garnishments 
									FROM employee 
									LEFT JOIN payroll on P_ID=Payroll_ID where First_Name like '%$First_Name%'");
		echo '<table>
	<tr>
		<th>Payroll ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Salary</th>
		<th>Garnishments</th>
		<th></th>
	</tr>';
		while ($row = mysqli_fetch_array($fName)) {
				$id=$row['Payroll_ID'];
				echo "<tr>";
				echo "<td>" . $row['Payroll_ID'] . "</td>";
				echo "<td>" . $row['First_Name'] . "</td>";
				echo "<td>" . $row['Last_Name'] . "</td>";
				echo "<td>" . $row['Salary'] . "</td>";
				echo "<td>" . $row['Garnishments'] . "</td>";
				echo "<td class='details'><a href='UpdatePayrollForm.php?id=$id'><b>Update</b></a></td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['lName']){
		echo "<style>
			.formDefault{
				display: none;
			} </style>";
		$Last_Name= $_POST['lName'];
		$lName= mysqli_query($conn, "SELECT Emp_Number, Payroll_ID, First_Name, Last_Name, Salary, Garnishments 
									FROM employee 
									LEFT JOIN payroll on P_ID=Payroll_ID where Last_Name like '%$Last_Name%'");
		echo '<table>
	<tr>
		<th>Payroll ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Salary</th>
		<th>Garnishments</th>
		<th></th>
	</tr>';
		while ($row = mysqli_fetch_array($lName)) {
				$id=$row['Payroll_ID'];
				echo "<tr>";
				echo "<td>" . $row['Payroll_ID'] . "</td>";
				echo "<td>" . $row['First_Name'] . "</td>";
				echo "<td>" . $row['Last_Name'] . "</td>";
				echo "<td>" . $row['Salary'] . "</td>";
				echo "<td>" . $row['Garnishments'] . "</td>";
				echo "<td class='details'><a href='UpdatePayrollForm.php?id=$id'><b>Update</b></a></td>";
				echo "</tr>";}
		echo '</table>';}
	elseif ($_POST['Pid']){
		echo "<style>
				.formDefault{
					display: none;
				} </style>";
		$Payroll_ID= $_POST['Pid'];
		$Pid= mysqli_query($conn, "SELECT Emp_Number, Payroll_ID, First_Name, Last_Name, Salary, Garnishments 
								FROM employee 
								RIGHT JOIN payroll on P_ID=Payroll_ID where Payroll_ID=$Payroll_ID");
		echo '<table>
	<tr>
		<th>Payroll ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Salary</th>
		<th>Garnishments</th>
		<th></th>
	</tr>';
			while ($row = mysqli_fetch_array($Pid)) {
				$id=$row['Payroll_ID'];
				echo "<tr>";
				echo "<td>" . $row['Payroll_ID'] . "</td>";
				echo "<td>" . $row['First_Name'] . "</td>";
				echo "<td>" . $row['Last_Name'] . "</td>";
				echo "<td>" . $row['Salary'] . "</td>";
				echo "<td>" . $row['Garnishments'] . "</td>";
				echo "<td class='details'><a href='UpdatePayrollForm.php?id=$id'><b>Update</b></a></td>";
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
	//$result= mysqli_query($conn, "SELECT * FROM payroll");
	$result= mysqli_query($conn, "SELECT Payroll_ID, employee.First_Name, employee.Last_Name, Salary, Garnishments
							  FROM payroll 
							  LEFT JOIN employee ON employee.P_ID = payroll.Payroll_ID");							  
	echo '<div class = "formDefault"><table>
	<tr>
		<th>Payroll ID</th>
		<th>Employee Name</th>
		<th>Salary</th>
		<th>Garnishments</th>
		<th></th>
		<th></th>
	</tr>';
	while ($row = mysqli_fetch_array($result)) {
		$id=$row['Payroll_ID'];
		echo "<tr>";
		echo "<td>" . $row['Payroll_ID'] . "</td>";
		echo "<td>" . $row['First_Name'] . ' ' . $row['Last_Name'] . "</td>";
		echo "<td>" . '$'. $row['Salary'] . "</td>";
		echo "<td>" . '$'. $row['Garnishments'] . "</td>";
		echo "<td class='update'><a href='UpdatePayrollForm.php?id=$id'><b>Update</b></a></td>";
		echo "<td class='delete'><a href='deleteFormPay.php?id=$id'><b style= 'color: #993333;'>Delete</b></a></td>";
		echo "</tr>";
	}
	echo '</table></div>'; ?>	

		</div>
	
	</body>
</html>
