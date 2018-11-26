<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Employee</title>
	<link href='../css/updateFormStyle.css' rel='stylesheet' type='text/css'/>
	<link href="../css/pageStyle.css" rel="stylesheet" type="text/css"/>
   
     
</head>


<?php
$id=$_GET['id'];
require 'open-db.php';
	
	$result= mysqli_query($conn, "SELECT Emp_Number, First_Name, Last_Name, Address, Birth_Date, Sex, SSN, Start_Date, J_ID, D_ID, V_ID, P_ID, Proj_ID FROM employee WHERE Emp_Number=$id");
	
while ($row = mysqli_fetch_array($result)) {
	
	$e = $row['Emp_Number'];
	$f = $row['First_Name'];
	$l = $row['Last_Name'];
	$a = $row['Address'];
	$b = $row['Birth_Date'];
	$s = $row['Sex'];
	$n = $row['SSN'];
	$sd = $row['Start_Date'];
	$j = $row['J_ID'];
	$d = $row['D_ID'];
	$v = $row['V_ID'];
	$p = $row['P_ID'];
	$pr = $row['Proj_ID'];
?>

	<center><div class="formContainer" id="updateEmployee"> 
    <form action="updateEmployee.php" method="post">
	<h2>Update Employee</h2>
        <center><div>
          <label for="number">Employee Number: <input type="text" id="Emp_Number" name="Emp_Number" value="<?php echo htmlspecialchars($e); ?>" readonly="readonly"></label>
        </div>
		
        <div>
          <label for="fname">First Name: <input type="text" id="First_Name" name="First_Name" value="<?php echo htmlspecialchars($f); ?>" required></label>
        </div>
		
        <div>
          <label for="lname">Last Name: <input type="text" id="Last_Name" name="Last_Name" value="<?php echo htmlspecialchars($l); ?>" required></label>
        </div>
		
		<div>
          <label for="address">Address: <input type="text" id="Address" name="Address" value="<?php echo htmlspecialchars($a); ?>" required></label>
        </div>
		
        <div>
		  <label for="birth">Birthdate: <i>(YYYY-MM-DD)</i> <input type="text" id="Birth_Date" name="Birth_Date" value="<?php echo htmlspecialchars($b); ?>"></label>
        </div>
		
 		<div>
          <label for="sex">Sex: <i>(M/F)</i> <input type="text" id="Sex" name="Sex" value="<?php echo htmlspecialchars($s); ?>"></label>
        </div>
		
        <div>
		  <label for="SSN">SSN: <i>(no dashes)</i> <input type="text" id="SSN" name="SSN" value="<?php echo htmlspecialchars($n); ?>"></label>
        </div>
		
		<div>
          <label for="Start_Date">Start Date: <i>(YYYY-MM-DD)</i> <input type="text" id="Start_Date" name="Start_Date" value="<?php echo htmlspecialchars($sd); ?>"></label>
        </div>
		
		<div>
		  <label for="J_ID">Job ID #: <input type="text" id="J_ID" name="J_ID" value="<?php echo htmlspecialchars($j); ?>">		 
		  <div class="dropdown">
		  <p class="dropbtn"><i>(Positions)</i></p></label>
		  <div class="dropContent">
		  <?php $sql= mysqli_query($conn, "SELECT Job_ID, Job_Title FROM position"); 
		  while ($row = mysqli_fetch_array($sql)) {
			echo $row['Job_ID'] . " - " . $row['Job_Title'] . "<br>"; }?>
			</div>
			</div>
		</div>
		
		<div>
		  <label for="D_ID">Department ID #: <input type="text" id="D_ID" name="D_ID" value="<?php echo htmlspecialchars($d); ?>">		 
		  <div class="dropdown">
		  <p class="dropbtn"><i>(Departments)</i></p> </label>
		  <div class="dropContent">
		  <?php $sql= mysqli_query($conn, "SELECT Dept_ID, Dept_Name FROM department"); 
		  while ($row = mysqli_fetch_array($sql)) {
			echo $row['Dept_ID'] . " - " . $row['Dept_Name'] . "<br>"; }?>
			</div>
			</div>
		</div>
		
		<div>
		  <label for="V_ID">Vehicle ID #: <input type="text" id="V_ID" name="V_ID" value="<?php echo htmlspecialchars($v); ?>">
		<div class="dropdown">
		<p class="dropbtn"><i>(Vehicles)</i></p></label>
		<div class="dropContent">
		  <?php $sql= mysqli_query($conn, "SELECT Vehicle_ID, Plate_Number FROM vehicle"); 
		  while ($row = mysqli_fetch_array($sql)) {
			echo $row['Vehicle_ID'] . " - " . $row['Plate_Number'] . "<br>"; }?>
			</div>
			</div>
		</div>
		
		<div>
		  <label for="P_ID">Payroll ID #: <input type="text" id="P_ID" name="P_ID" value="<?php echo htmlspecialchars($p); ?>">
		  <div class="dropdown">
		  <p class="dropbtn"><i>(Payroll)</i></p></label>
		  <div class="dropContent">
		  <?php $sql= mysqli_query($conn, "SELECT Payroll_ID, Salary FROM payroll"); 
		  while ($row = mysqli_fetch_array($sql)) {
			echo $row['Payroll_ID'] . " - " . $row['Salary'] . "<br>"; }?>
			</div>
			</div>
        </div>
		
		<div>
		  <label for="Proj_ID">Project ID #: <input type="text" id="Proj_ID" name="Proj_ID" value="<?php echo htmlspecialchars($pr); ?>">
		  <div class="dropdown">
		  <p class="dropbtn"><i>(Projects)</i></p></label>
		  <div class="dropContent">
		  <?php $sql= mysqli_query($conn, "SELECT Project_ID, Project_Name FROM project"); 
		  while ($row = mysqli_fetch_array($sql)) {
			echo $row['Project_ID'] . " - " . $row['Project_Name'] . "<br>"; }?>
			</div>
			</div>
		</div>
		
        <div class="btn">
          <button class="save" type="submit">Update</button>
		  </div></center>
    </form>
	<button class="cancel" onclick="window.history.back()">Cancel</button>
	</div></center>
   

</html>

<?php } 
	?>
