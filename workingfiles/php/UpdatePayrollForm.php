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
	
	$result= mysqli_query($conn, "SELECT Payroll_ID, Salary, Garnishments FROM payroll WHERE Payroll_ID=$id");
	
while ($row = mysqli_fetch_array($result)) {
	
	$p = $row['Payroll_ID'];
	$s = $row['Salary'];
	$g = $row['Garnishments'];

?>
	<div class="formPopup" id="updatePayroll"> 
    <form action="updatePayroll.php" method="post">
        <div>
          <label for="number">Payroll ID:</label> <input type="text" id="Payroll_ID" name="Payroll_ID" value="<?php echo htmlspecialchars($p); ?>" readonly="readonly">
        </div>
        <div>
          <label for="salary">Salary: <i>(with or without commas)</i></label> <input type="text" id="Salary" name="Salary" value="<?php echo htmlspecialchars($s); ?>" required>
        </div>
        <div>
          <label for="garnish">Garnishments: <i>(with or without commas)</i></label> <input type="text" id="Garnishments" name="Garnishments" value="<?php echo htmlspecialchars($g); ?>">
        </div>
        <div class="button">
          <button type="submit">Submit</button>
        </div>
    </form>

</html>
<?php } ?>