<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Payroll</title>
	<link href='../css/updateFormStyle.css' rel='stylesheet' type='text/css'/>
    <link href="../css/pageStyle.css" rel="stylesheet" type="text/css"/>
</head>


<?php
$id=$_GET['id'];
require 'open-db.php';
	
	$result= mysqli_query($conn, "SELECT Payroll_ID, Salary, Garnishments FROM payroll WHERE Payroll_ID=$id");
	
while ($row = mysqli_fetch_array($result)) {
	
	$p = $row['Payroll_ID'];
	$s = $row['Salary'];
	$g = $row['Garnishments'];

?>
	<center><div class="formContainer" id="updatePayroll"> 
    <form action="updatePayroll.php" method="post">
	<h2>Update Payroll</h2>
        <center><div>
        <div>
          <label for="number">Payroll ID: <input type="text" id="Payroll_ID" name="Payroll_ID" value="<?php echo htmlspecialchars($p); ?>" readonly="readonly"></label>
        </div>
        <div>
          <label for="salary">Salary: <i>(with or without commas)</i> <input type="text" id="Salary" name="Salary" value="<?php echo htmlspecialchars($s); ?>" required></label>
        </div>
        <div>
          <label for="garnish">Garnishments: <i>(with or without commas)</i> <input type="text" id="Garnishments" name="Garnishments" value="<?php echo htmlspecialchars($g); ?>"> </label>
        </div>
    <div class="btn">
          <button class="save" type="submit">Update</button>
		  </div></center>
    </form>
	<button class="cancel" onclick="window.history.back()">Cancel</button>
	</div></center>

</html>
<?php } ?>
