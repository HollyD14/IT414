<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Your first HTML form, styled</title>
    <style>
      form {
        /* Just to center the form on the page */
        margin: 0 auto;
        width: 400px;
        /* To see the outline of the form */
        padding: 1em;
        border: 1px solid #CCC;
        border-radius: 1em;
      }
      form div + div {
        margin-top: 1em;
      }
      label {
        /* To make sure that all labels have the same size and are properly aligned */
        display: inline-block;
        width: 200px;
        text-align: left;
      }
      input, textarea {
        /* To make sure that all text fields have the same font settings By default, textareas have a monospace font */
        font: 1em sans-serif;
        /* To give the same size to all text fields */
        width: 300px;
        box-sizing: border-box; /* To harmonize the look & feel of text field border */
        border: 1px solid #999;
      }
      input:focus, textarea:focus {
        /* To give a little highlight on active elements */
        border-color: #000;
      }
      textarea {
        /* To properly align multiline text fields with their labels */
        vertical-align: top;
        /* To give enough room to type some text */
        height: 5em;
      }
      .button {
        /* To position the buttons to the same position of the text fields */
        padding-left: 90px;
        /* same size as the label elements */
      }
      button {
        /* This extra margin represent roughly the same space as the space between the labels and their text fields */
        margin-left: .5em;
      }
    </style>
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
	<div class="formPopup" id="updateVehicle"> 
    <form action="updateVehicle" method="post">
        <div>
          <label for="number">Vehicle Number:</label> <input type="text" id="Vehicle_ID" name="Vehicle_ID" value="<?php echo htmlspecialchars($v); ?>" readonly="readonly">
        </div>
        <div>
          <label for="make">Make:</label> <input type="text" id="Make" name="Make" value="<?php echo htmlspecialchars($m); ?>" required>
        </div>
        <div>
          <label for="model">Model:</label> <input type="text" id="Model" name="Model" value="<?php echo htmlspecialchars($o); ?>" required>
        </div>
		<div>
          <label for="Year">Year: <i>(YYYY)</i></label> <input type="text" id="Year" name="Year" value="<?php echo htmlspecialchars($y); ?>" required>
        </div>
        <div>
		  <label for="color">Color:</label> <input type="text" id="Color" name="Color" value="<?php echo htmlspecialchars($c); ?>">
        </div>
 		<div>
          <label for="Plate">Plate Number: <i>(XXX XXX)</i></label> <input type="text" id="Plate_Number" name="Plate_Number" value="<?php echo htmlspecialchars($p); ?>">
        </div>
        <div class="button">
          <button type="submit">Submit</button>
        </div>
    </form>

</html>
<?php } ?>
