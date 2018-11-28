<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Project</title>
    <link href='../css/updateFormStyle.css' rel='stylesheet' type='text/css'/>
    <link href="../css/pageStyle.css" rel="stylesheet" type="text/css"/>
</head>


<?php
$id=$_GET['id'];
require 'open-db.php';
	
	$result= mysqli_query($conn, "SELECT Project_ID, Project_Name, Start_Date, End_Date FROM project WHERE Project_ID=$id");
	
while ($row = mysqli_fetch_array($result)) {
	$p = $row['Project_ID'];
	$n = $row['Project_Name'];
	$s = $row['Start_Date'];
	$e = $row['End_Date'];	
?>
	<center><div class="formContainer" id="updateProject"> 
    <form action="updateProject.php" method="post">
        <h2>Update Project</h2>
        <center><div>
          <label for="number">Project Number: </label><input type="text" id="Project_ID" name="Project_ID" value="<?php echo htmlspecialchars($p); ?>" readonly="readonly">
        </div>
        <div>
          <label for="name">Project Name: </label><input type="text" id="Project_Name" name="Project_Name" value="<?php echo htmlspecialchars($n); ?>" required>
        </div>
        <div>
		  <label for="bdate">Start Date: <br><i>(YYYY-MM-DD)</i></label> <input    type="text" id="Start_Date" name="Start_Date" value="<?php echo htmlspecialchars($s); ?>">        </div>
        <div>
          <label for="edate">End Date: <br><i>(YYYY-MM-DD)</i></label> <input type="text" id="End_Date" name="End_Date" value="<?php echo htmlspecialchars($e); ?>">
        </div>
        <div class="btn">
          <button class="save" type="submit">Update</button>
		  </div></center>
    </form>
	<button class="cancel" onclick="window.history.back()">Cancel</button>
	</div></center>

</html>
<?php } ?>
