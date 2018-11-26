<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Delete Record</title>
	<link href="../css/deleteFormStyle.css" rel="stylesheet" type="text/css"/>
	<link href="../css/pageStyle.css" rel="stylesheet" type="text/css"/>

</head>


<?php
$id=$_GET['id'];
require 'open-db.php';
	
	$result= mysqli_query($conn, "SELECT * FROM payroll WHERE Payroll_ID=$id");
	
while ($row = mysqli_fetch_array($result)) {
	$id = $row['Payroll_ID'];
	$s = $row['Salary'];
	$g = $row['Garnishments'];
	
?>
<center>
<h1>Are you sure you want to delete this record?</h1><br>
	<div class="formContainer" id="updatePay"> 
    <form action="deletePay.php" method="post">
	<h2>Payroll</h2>
        <center><div>
          <label for="id">Payroll ID:</label> <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($id); ?>" readonly="readonly">
		</div>
	   <div>
          <label for="salary">Salary:</label> <input type="text" id="salary" name="salary" value="<?php echo htmlspecialchars($s); ?>" readonly="readonly">
        </div>
		<div>
          <label for="g">Garnishments:</label> <input type="text" id="g" name="g" value="<?php echo htmlspecialchars($g); ?>" readonly="readonly">
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
