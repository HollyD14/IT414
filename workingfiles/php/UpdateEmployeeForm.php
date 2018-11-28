<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Employee</title>
	<link href='../css/updateEmpFormStyle.css' rel='stylesheet' type='text/css'/>
	<link href="../css/pageStyle.css" rel="stylesheet" type="text/css"/>
   
     
</head>


<?php
$id=$_GET['id'];
require 'open-db.php';
	
	$result= mysqli_query($conn, "SELECT Emp_Number, First_Name, Last_Name, Address, Birth_Date, Sex, SSN,
										 employee.Start_Date as S_Date, position.Job_Title as J_Title, department.Dept_Name as D_Name,
										 project.Project_Name as Proj_Name, payroll.Salary as P_Salary, vehicle.Plate_Number as V_Plate, J_ID, D_ID, V_ID, P_ID, Proj_ID  
								  FROM employee 
								  LEFT JOIN position ON position.Job_ID = employee.J_ID 
								  LEFT JOIN department ON department.Dept_ID = employee.D_ID
								  LEFT JOIN project ON project.Project_ID = employee.Proj_ID
								  LEFT JOIN payroll ON payroll.Payroll_ID = employee.P_ID
								  LEFT JOIN vehicle ON vehicle.Vehicle_ID = employee.V_ID
								  WHERE Emp_Number=$id
								  ORDER BY Emp_Number");
	
	while ($row = mysqli_fetch_array($result)) {
		
		$e = $row['Emp_Number'];
		$f = $row['First_Name'];
		$l = $row['Last_Name'];
		$a = $row['Address'];
		$b = $row['Birth_Date'];
		$s = $row['Sex'];
		$n = $row['SSN'];
		$sd = $row['S_Date'];
		$jt = $row['J_Title'];
		$dn = $row['D_Name'];
		$pn = $row['Proj_Name'];
		$ps = $row['P_Salary'];
		$plate = $row['V_Plate'];
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
          <label for="number">Employee Number: </label><input type="text" id="Emp_Number" name="Emp_Number" value="<?php echo htmlspecialchars($e); ?>" readonly="readonly">
        </div>
		
        <div>
          <label for="fname">First Name: </label><input type="text" id="First_Name" name="First_Name" value="<?php echo htmlspecialchars($f); ?>" required>
        </div>
		
        <div>
          <label for="lname">Last Name: </label><input type="text" id="Last_Name" name="Last_Name" value="<?php echo htmlspecialchars($l); ?>" required>
        </div>
		
		<div>
          <label for="address">Address: </label><input type="text" id="Address" name="Address" value="<?php echo htmlspecialchars($a); ?>">
        </div>
		
        <div>
		  <label for="birth">Birthdate: <br><i>(YYYY-MM-DD)</i> </label><input type="text" id="Birth_Date" name="Birth_Date" value="<?php echo htmlspecialchars($b); ?>">
        </div>

		<div>		
		  <label for="Sex">Sex: </label>	  
		  <select id="Sex" name="Sex">
		    <option selected="selected"><?php echo htmlspecialchars($s); ?></option>
			<option value="M">M</option>
			<option value="F">F</option>
		  </select>
          </label>
        </div>
		
        <div>
		  <label for="SSN">SSN: <i>(no dashes)</i> </label><input type="text" id="SSN" name="SSN" value="<?php echo htmlspecialchars($n); ?>">
        </div>
		
		<div>
          <label for="Start_Date">Start Date: <br><i>(YYYY-MM-DD)</i> </label><input type="text" id="Start_Date" name="Start_Date" value="<?php echo htmlspecialchars($sd); ?>">
        </div>
		
		<div>
		  <label for="J_ID">Position: </label>	 
		  <select id="J_ID" name="J_ID">
		  <option value=<?php echo htmlspecialchars($j); ?> selected="selected"><?php echo htmlspecialchars($jt); ?></option>
		  <?php $sql= mysqli_query($conn, "SELECT Job_ID, Job_Title FROM position"); 
		  while ($row = mysqli_fetch_array($sql)) {
			echo '<option value="'.$row['Job_ID'] . '">' .$row['Job_Title'].'</option>'; }?>
		  </select>
		</div>	
		
        <div>
		  <input type="hidden" id="P_ID" name="P_ID" value="<?php echo htmlspecialchars($p); ?>">
		  <label for="P_Salary">Salary:</label> <input type="text" id="P_Salary" name="P_Salary" value="<?php echo htmlspecialchars($ps); ?>">
        </div>
		
		<div>
		  <label for="D_ID">Department:</label>
		  <select id="D_ID" name="D_ID">	
		  <option value=<?php echo htmlspecialchars($d); ?> selected="selected"><?php echo htmlspecialchars($dn); ?></option>
		  <?php $sql= mysqli_query($conn, "SELECT Dept_ID, Dept_Name FROM department"); 
		  while ($row = mysqli_fetch_array($sql)) {
			echo '<option value="'.$row['Dept_ID'] . '">' . $row['Dept_Name'] .'</option>'; }?>
		  </select>	
		</div>
		
		<div>
		  <label for="Proj_ID">Project:</label>
		  <select id="Proj_ID" name="Proj_ID">	
		  <option value=<?php echo htmlspecialchars($pr); ?> selected="selected"><?php echo htmlspecialchars($pn); ?></option>
		  <?php $sql= mysqli_query($conn, "SELECT Project_ID, Project_Name FROM project"); 
		  while ($row = mysqli_fetch_array($sql)) {
			echo '<option value="'.$row['Project_ID'] . '">' . $row['Project_Name'] .  '</option>';  }?>
		  </select>	
		</div>
		
		<div>
		  <label for="V_ID">Vehicle:</label>
		  <select id="V_ID" name="V_ID">	
		  <option value=<?php echo htmlspecialchars($v); ?> selected="selected"><?php echo htmlspecialchars($plate); ?></option>
		  <?php $sql= mysqli_query($conn, "SELECT Vehicle_ID, Plate_Number FROM vehicle"); 
		  while ($row = mysqli_fetch_array($sql)) {
			echo '<option value="'.$row['Vehicle_ID'] .  '">' . $row['Vehicle_ID'] . "-" . $row['Plate_Number'] . '</option>';  }?>
		  </select>	
		</div>
		
        <div class="btn">
          <button class="save" type="submit">Update</button>
		  </div></center>
    </form>
	<button class="cancel" onclick="window.history.back()">Cancel</button>
	</div></center>
   

</html>

<?php } ?>
