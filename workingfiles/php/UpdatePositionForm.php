<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Position</title>
	<link href='../css/updateFormStyle.css' rel='stylesheet' type='text/css'/>
    <link href="../css/pageStyle.css" rel="stylesheet" type="text/css"/>
</head>


<?php
$id=$_GET['id'];
require 'open-db.php';
	
	$result= mysqli_query($conn, "SELECT Job_ID, Job_Title, Base_Salary FROM position WHERE Job_ID=$id");
	
while ($row = mysqli_fetch_array($result)) {
	
	$j = $row['Job_ID'];
	$t = $row['Job_Title'];
	$b = $row['Base_Salary'];

?>
	<center><div class="formContainer" id="updatePosition"> 
    <form action="updatePosition.php" method="post">
       <h2>Update Position</h2>
        <center><div>
          <label for="number">Payroll ID: </label><input type="text" id="Job_ID" name="Job_ID" value="<?php echo htmlspecialchars($j); ?>" readonly="readonly">
        </div>
        <div>
          <label for="title">Job Title: </label><input type="text" id="Job_Title" name="Job_Title" value="<?php echo htmlspecialchars($t); ?>" required>
        </div>
        <div>
          <label for="base">Base Salary: <br><i>(with or without commas)</i> </label><input type="text" id="Base_Salary" name="Base_Salary" value="<?php echo htmlspecialchars($b); ?>">
        </div>
        <div class="btn">
          <button class="save" type="submit">Update</button>
		  </div></center>
    </form>
	<button class="cancel" onclick="window.history.back()">Cancel</button>
	</div></center>

</html>
<?php } ?>
