<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Delete Record</title>
	<link href="../css/updateFormStyle.css" rel="stylesheet" type="text/css"/>
	<link href="../css/pageStyle.css" rel="stylesheet" type="text/css"/>

</head>


<?php
$id=$_GET['id'];
require 'open-db.php';
	
	$result= mysqli_query($conn, "SELECT * FROM employee WHERE Emp_Number=$id");
	
while ($row = mysqli_fetch_array($result)) {
	$num = $row['Emp_Number'];
	$fName = $row['First_Name'];
	$lName = $row['Last_Name'];
	$DOB = $row['Birth_Date'];	
	$sex = $row['Sex'];
	$add = $row['Address'];
	$ssn = $row['SSN'];
	$start = $row['Start_Date'];
	
?>
<center>
<h1>Are you sure you want to delete this record?</h1><br>
	<div class="formContainer" id="updateEmp"> 
    <form action="deleteEmp.php" method="post">
	<h2>Employee</h2>
        <center><div>
          <label for="number">Employee Number:</label> <input type="text" id="emp_number" name="emp_number" value="<?php echo htmlspecialchars($num); ?>" readonly="readonly">
		</div>
	   <div>
          <label for="fName">First Name:</label> <input type="text" id="fName" name="f_name" value="<?php echo htmlspecialchars($fName); ?>" readonly="readonly">
        </div>
		<div>
          <label for="lName">Last Name:</label> <input type="text" id="lName" name="l_name" value="<?php echo htmlspecialchars($lName); ?>" readonly="readonly">
        </div>
		<div>
          <label for="DOB">Date of Birth:</label> <input type="text" id="DOB" name="DOB" value="<?php echo htmlspecialchars($DOB); ?>" readonly="readonly">
        </div>
		<div>
          <label for="sex">Sex:</label> <input type="text" id="sex" name="sex" value="<?php echo htmlspecialchars($sex); ?>" readonly="readonly">
        </div>
        <div>
		  <label for="address">Address:</label> <input    type="text" id="address" name="address" value="<?php echo htmlspecialchars($add); ?>" readonly="readonly">
        </div>
        <div>
          <label for="ssn">Social Security Number:</label> <input type="text" id="ssn" name="ssn" value="<?php echo htmlspecialchars($ssn); ?>" readonly="readonly">
        </div>
		<div>
          <label for="start">Start Date:</label> <input type="text" id="start" name="start" value="<?php echo htmlspecialchars($start); ?>" readonly="readonly">
        </div>
        <div class="btn">
          <button class="save" type="submit">Delete</button>
		  </div></center>
    </form>
	<button class="cancel" onclick="window.history.back()">Cancel</button>
	</div>
</center>	
</html>
<?php } ?>