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
	
	$result= mysqli_query($conn, "SELECT * FROM project WHERE Project_ID=$id");
	
while ($row = mysqli_fetch_array($result)) {
	$id = $row['Project_ID'];
	$n = $row['Project_Name'];
	$s = $row['Start_Date'];
	$e = $row['End_Date'];
	
?>
<center>
<h1>Are you sure you want to delete this record?</h1><br>
	<div class="formContainer" id="updateProj"> 
    <form action="deleteProj.php" method="post">
	<h2>Project</h2>
        <center><div>
          <label for="id">Project ID:</label> <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($id); ?>" readonly="readonly">
		</div>
	   <div>
          <label for="n">Project Name:</label> <input type="text" id="n" name="n" value="<?php echo htmlspecialchars($n); ?>" readonly="readonly">
        </div>
		<div>
          <label for="s">Start Date:</label> <input type="text" id="s" name="s" value="<?php echo htmlspecialchars($s); ?>" readonly="readonly">
        </div>
		<div>
          <label for="s">End Date:</label> <input type="text" id="e" name="e" value="<?php echo htmlspecialchars($e); ?>" readonly="readonly">
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
