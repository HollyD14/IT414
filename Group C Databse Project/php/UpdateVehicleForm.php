<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Update Vehicle</title>
    <link href='../css/updateFormStyle.css' rel='stylesheet' type='text/css'/>
    <link href="../css/pageStyle.css" rel="stylesheet" type="text/css"/>
</head>


<?php
$id=$_GET['id'];
require 'open-db.php';
	
	$result= mysqli_query($conn, "SELECT Vehicle_ID, Make, Model, Year, Color, Plate_Number FROM vehicle WHERE Vehicle_ID=$id");
	
while ($row = mysqli_fetch_array($result)) {
	
	$v = $row['Vehicle_ID'];
	$m = $row['Make'];
	$o = $row['Model'];
	$y = $row['Year'];
	$c = $row['Color'];
	$p = $row['Plate_Number'];

?>
	<center><div class="formContainer" id="updateVehicle"> 
    <form action="updateVehicle" method="post">
       <h2>Update Vehicle</h2>
        <center><div>
          <label for="number">Vehicle Number: </label><input type="text" id="Vehicle_ID" name="Vehicle_ID" value="<?php echo htmlspecialchars($v); ?>" readonly="readonly">
        </div>
        <div>
          <label for="make">Make: </label><input type="text" id="Make" name="Make" value="<?php echo htmlspecialchars($m); ?>" required>
        </div>
        <div>
          <label for="model">Model: </label><input type="text" id="Model" name="Model" value="<?php echo htmlspecialchars($o); ?>" required>
        </div>
		<div>
          <label for="Year">Year: <br><i>(YYYY)</i> </label><input type="text" id="Year" name="Year" value="<?php echo htmlspecialchars($y); ?>" required>
        </div>
        <div>
		  <label for="color">Color: </label><input type="text" id="Color" name="Color" value="<?php echo htmlspecialchars($c); ?>">
        </div>
 		<div>
          <label for="Plate">Plate Number: <br><i>(XXX XXX)</i> </label><input type="text" id="Plate_Number" name="Plate_Number" value="<?php echo htmlspecialchars($p); ?>">
        </div>
        <div class="btn">
          <button class="save" type="submit">Update</button>
		  </div></center>
    </form>
	<button class="cancel" onclick="window.history.back()">Cancel</button>
	</div></center>

</html>
<?php } ?>
