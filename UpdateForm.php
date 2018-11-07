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

$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "telmon_database";

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	$result= mysqli_query($conn, "SELECT Dept_ID, Dept_Name, Office_Addr, Office_Phone FROM department WHERE dept_id=$id");
	
while ($row = mysqli_fetch_array($result)) {
	$d = $row['Dept_ID'];
	$n = $row['Dept_Name'];
	$a = $row['Office_Addr'];
	$p = $row['Office_Phone'];	
?>
	<div class="formPopup" id="updateDept"> 
    <form action="updateDept.php" method="post">
        <div>
          <label for="number">Department Number:</label> <input type="text" id="dep_number" name="dep_number" value="<?php echo htmlspecialchars($d); ?>" readonly="readonly">
        </div>
        <div>
          <label for="name">Department Name:</label> <input type="text" id="dep_name" name="dep_name" value="<?php echo htmlspecialchars($n); ?>" required>
        </div>
        <div>
          <label for="address">Office Address:</label> <textarea type="text" id="address" name="address" value="<?php echo htmlspecialchars($a); ?>"></textarea>
		  <label for="address">Office Address:</label> <input    type="text" id="address" name="address" value="<?php echo htmlspecialchars($a); ?>">
        </div>
        <div>
          <label for="phone">Office Phone:</label> <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($p); ?>">
        </div>
        <div class="button">
          <button type="submit">Submit</button>
        </div>
    </form>


</html>
<?php } ?>
