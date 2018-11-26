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
	
	$result= mysqli_query($conn, "SELECT * FROM position WHERE Job_ID=$id");
	
while ($row = mysqli_fetch_array($result)) {
	$id = $row['Job_ID'];
	$t = $row['Job_Title'];
	$b = $row['Base_Salary'];
	
?>
<center>
<h1>Are you sure you want to delete this record?</h1><br>
	<div class="formContainer" id="updatePos"> 
    <form action="deletePos.php" method="post">
	<h2>Position</h2>
        <center><div>
          <label for="id">Job ID:</label> <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($id); ?>" readonly="readonly">
		</div>
	   <div>
          <label for="t">Job Title:</label> <input type="text" id="t" name="t" value="<?php echo htmlspecialchars($t); ?>" readonly="readonly">
        </div>
		<div>
          <label for="b">Base Salary:</label> <input type="text" id="b" name="b" value="<?php echo htmlspecialchars($b); ?>" readonly="readonly">
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
