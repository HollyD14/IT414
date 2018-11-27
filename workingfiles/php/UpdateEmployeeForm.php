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
          <label for="address">Address: <input type="text" id="Address" name="Address" value="<?php echo htmlspecialchars($a); ?>"></label>
        </div>
		
        <div>
		  <label for="birth">Birthdate: <i>(YYYY-MM-DD)</i> <input type="text" id="Birth_Date" name="Birth_Date" value="<?php echo htmlspecialchars($b); ?>"></label>
        </div>

		<div>		
		  <label for="Sex">Sex: 	  
		  <select id="Sex" name="Sex">
		    <option selected="selected"><?php echo htmlspecialchars($s); ?></option>
			<option value="M">M</option>
			<option value="F">F</option>
		  </select>
          </label>
        </div>
		
        <div>
		  <label for="SSN">SSN: <i>(no dashes)</i> <input type="text" id="SSN" name="SSN" value="<?php echo htmlspecialchars($n); ?>"></label>
        </div>
		
		<div>
          <label for="Start_Date">Start Date: <i>(YYYY-MM-DD)</i> <input type="text" id="Start_Date" name="Start_Date" value="<?php echo htmlspecialchars($sd); ?>"></label>
        </div>
		
		<div>
		  <label for="J_ID">Position:	 
		  <select id="J_ID" name="J_ID">
		  <option selected="selected"><?php echo htmlspecialchars($j); ?></option>
		  <?php $sql= mysqli_query($conn, "SELECT Job_ID, Job_Title FROM position"); 
		  while ($row = mysqli_fetch_array($sql)) {
			echo '<option value="'.$row['Job_ID'] . '">' .$row['Job_Title'].'</option>'; }?>
		  </select>
		</div>	
		
		<div>
		  <label for="D_ID">Department:
		  <select id="D_ID" name="D_ID">	
		  <option selected="selected"><?php echo htmlspecialchars($d); ?></option>		  
		  <?php $sql= mysqli_query($conn, "SELECT Dept_ID, Dept_Name FROM department"); 
		  while ($row = mysqli_fetch_array($sql)) {
			echo '<option value="'.$row['Dept_ID'] . '">' . $row['Dept_Name'] .'</option>'; }?>
		  </select>	
		</div>
		
		<div>
		  <label for="V_ID">Vehicle:
		  <select id="V_ID" name="V_ID">	
		  <option selected="selected"><?php echo htmlspecialchars($v); ?></option>	
		  <?php $sql= mysqli_query($conn, "SELECT Vehicle_ID, Plate_Number FROM vehicle"); 
		  while ($row = mysqli_fetch_array($sql)) {
			echo '<option value="'.$row['Vehicle_ID'] .  '">' . $row['Plate_Number'] . '</option>';  }?>
		  </select>	
		</div>
		
		<div>
		  <label for="P_ID">Payroll ID:
		  <select id="P_ID" name="P_ID">	
		  <?php $sql= mysqli_query($conn, "SELECT Payroll_ID, Salary FROM payroll"); 
		  while ($row = mysqli_fetch_array($sql)) {
			echo '<option value="'.$row['Payroll_ID'] . '">' . $row['Salary'] . '</option>'; }?>
		  </select>	
        </div>
		
		<div>
		  <label for="Proj_ID">Project:
		  <select id="Proj_ID" name="Proj_ID">	
		  <option selected="selected"><?php echo htmlspecialchars($pr); ?></option>	
		  <?php $sql= mysqli_query($conn, "SELECT Project_ID, Project_Name FROM project"); 
		  while ($row = mysqli_fetch_array($sql)) {
			echo '<option value="'.$row['Project_ID'] . '">' . $row['Project_Name'] .  '</option>';  }?>
		  </select>	
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
