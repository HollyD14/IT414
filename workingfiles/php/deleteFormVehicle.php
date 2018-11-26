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
	
	$result= mysqli_query($conn, "SELECT * FROM vehicle WHERE Vehicle_ID=$id");
	
while ($row = mysqli_fetch_array($result)) {
	$id = $row['Vehicle_ID'];
	$make = $row['Make'];
	$model = $row['Model'];
	$y = $row['Year'];
	$c = $row['Color'];
	$p = $row['Plate_Number'];
	
?>
<center>
<h1>Are you sure you want to delete this record?</h1><br>
	<div class="formContainer" id="updateVehicle"> 
    <form action="deleteVehicle.php" method="post">
	<h2>Vehicle</h2>
        <center><div>
          <label for="id">Vehicle ID:</label> <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($id); ?>" readonly="readonly">
		</div>
	   <div>
          <label for="make">Make:</label> <input type="text" id="make" name="make" value="<?php echo htmlspecialchars($make); ?>" readonly="readonly">
        </div>
		<div>
          <label for="model">Model:</label> <input type="text" id="model" name="model" value="<?php echo htmlspecialchars($model); ?>" readonly="readonly">
        </div>
		<div>
          <label for="y">Year:</label> <input type="text" id="y" name="y" value="<?php echo htmlspecialchars($y); ?>" readonly="readonly">
        </div>
		<div>
          <label for="c">Color:</label> <input type="text" id="c" name="c" value="<?php echo htmlspecialchars($c); ?>" readonly="readonly">
        </div>
		<div>
          <label for="p">Plate Number:</label> <input type="text" id="p" name="p" value="<?php echo htmlspecialchars($p); ?>" readonly="readonly">
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
