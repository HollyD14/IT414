<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Department</title>
	<link href='../css/updateFormStyle.css' rel='stylesheet' type='text/css'/>
	<link href="../css/pageStyle.css" rel="stylesheet" type="text/css"/>
</head>


<?php
$id=$_GET['id'];
require 'open-db.php';
	
	$result= mysqli_query($conn, "SELECT Dept_ID, Dept_Name, Office_Addr, Office_Phone FROM department WHERE dept_id=$id");
	
while ($row = mysqli_fetch_array($result)) {
	$d = $row['Dept_ID'];
	$n = $row['Dept_Name'];
	$a = $row['Office_Addr'];
	$p = $row['Office_Phone'];	
?>

	<center><div class="formContainer" id="updateDept">	
    <form action="updateDept.php" method="post">
	<h2>Update Department</h2>
        <center><div>
          <label for="number">Department Number: <input type="text" id="dep_number" name="dep_number" value="<?php echo htmlspecialchars($d); ?>" readonly="readonly"></label>
        </div>
        <div>
          <label for="name">Department Name: <input type="text" id="dep_name" name="dep_name" value="<?php echo htmlspecialchars($n); ?>" required></label>
        </div>
        <div>
		  <label for="address">Office Address: <input    type="text" id="address" name="address" value="<?php echo htmlspecialchars($a); ?>"></label>
        </div>
        <div>
          <label for="phone">Office Phone: <i>(with or without dashes)</i> <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($p); ?>"></label>
        </div>
        <div class="btn">
          <button class="save" type="submit">Update</button>
		  </div></center>
    </form>
	<button class="cancel" onclick="window.history.back()">Cancel</button>
	</div></center>

</html>
<?php } ?>
