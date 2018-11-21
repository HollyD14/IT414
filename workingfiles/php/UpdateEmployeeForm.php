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
	
	$result= mysqli_query($conn, "SELECT Emp_Number, First_Name, Last_Name, Address, Birth_Date, Sex, SSN, Start_Date, J_ID, D_ID, V_ID, Proj_ID FROM employee WHERE Emp_Number=$id");
	
while ($row = mysqli_fetch_array($result)) {
	
	$e = $row['Emp_Number'];
	$f = $row['First_Name'];
	$l = $row['Last_Name'];
	$a = $row['Address'];
	$b = $row['Birth_Date'];
	$s = $row['Sex'];
	$n = $row['SSN'];
	$sd = $row['Start_Date'];
	$j = $row['J_ID'];
	$d = $row['D_ID'];
	$v = $row['V_ID'];
	$p = $row['Proj_ID'];
?>
	<div class="formPopup" id="updateEmployee"> 
    <form action="updateEmployee.php" method="post">
        <div>
          <label for="number">Employee Number:</label> <input type="text" id="Emp_Number" name="Emp_Number" value="<?php echo htmlspecialchars($e); ?>" readonly="readonly">
        </div>
        <div>
          <label for="fname">First Name:</label> <input type="text" id="First_Name" name="First_Name" value="<?php echo htmlspecialchars($f); ?>" required>
        </div>
        <div>
          <label for="lname">Last Name:</label> <input type="text" id="Last_Name" name="Last_Name" value="<?php echo htmlspecialchars($l); ?>" required>
        </div>
		<div>
          <label for="address">Address:</label> <input type="text" id="Address" name="Address" value="<?php echo htmlspecialchars($a); ?>">
        </div>
        <div>
		  <label for="birth">Birthdate: <i>(YYYY-MM-DD)</i></label> <input type="text" id="Birth_Date" name="Birth_Date" value="<?php echo htmlspecialchars($b); ?>">
        </div>
 		<div>
          <label for="sex">Sex: <i>(M/F)</i></label> <input type="text" id="Sex" name="Sex" value="<?php echo htmlspecialchars($s); ?>">
        </div>
        <div>
		  <label for="SSN">SSN: <i>(no dashes)</i></label> <input type="text" id="SSN" name="SSN" value="<?php echo htmlspecialchars($n); ?>">
        </div>
		<div>
          <label for="Start_Date">Start Date: <i>(YYYY-MM-DD)</i></label> <input type="text" id="Start_Date" name="Start_Date" value="<?php echo htmlspecialchars($sd); ?>">
        </div>
        <div>
		  <label for="J_ID">Job ID:</label> <input type="text" id="J_ID" name="J_ID" value="<?php echo htmlspecialchars($j); ?>">
        </div>
        <div>
		  <label for="D_ID">Department ID:</label> <input type="text" id="D_ID" name="D_ID" value="<?php echo htmlspecialchars($d); ?>">
        </div>
        <div>
		  <label for="V_ID">Vehicle ID:</label> <input type="text" id="V_ID" name="V_ID" value="<?php echo htmlspecialchars($v); ?>">
        </div>
        <div>
		  <label for="Proj_ID">Project ID:</label> <input type="text" id="Proj_ID" name="Proj_ID" value="<?php echo htmlspecialchars($p); ?>">
        </div>
        <div class="button">
          <button type="submit">Submit</button>
        </div>
    </form>

</html>
<?php } 

	$result= mysqli_query($conn, "SELECT Dept_ID, Dept_Name, Office_Addr, Office_Phone FROM department");
	echo '<div class = "formDefault"><table>
	<tr>
		<th>Department ID</th>
		<th>Department Name</th>
	</tr>';
	while ($row = mysqli_fetch_array($result)) {
		$id=$row['Dept_ID'];
		echo "<tr>";
		echo "<td>" . $row['Dept_ID'] . "</td>";
		echo "<td>" . $row['Dept_Name'] . "</td>";
		echo "</tr>";}
	echo '</table></div>'; 
	
	$result2= mysqli_query($conn, "SELECT * FROM position");
	echo '<table>
	<tr>
		<th>Job ID</th>
		<th>Job Title</th>
	</tr>';
	while ($row = mysqli_fetch_array($result2)) {
		$id=$row['Job_ID'];
		echo "<tr>";
		echo "<td>" . $row['Job_ID'] . "</td>";
		echo "<td>" . $row['Job_Title'] . "</td>";
		echo "</tr>";
	}
	echo '</table>';
	
	$result3= mysqli_query($conn, "SELECT Project_ID, Project_Name FROM project");
	echo '<table>
	<tr>
		<th>Project ID</th>
		<th>Project Name</th>
	</tr>';
	while ($row = mysqli_fetch_array($result3)) {
		$id=$row['Project_ID'];
		echo "<tr>";
		echo "<td>" . $row['Project_ID'] . "</td>";
		echo "<td>" . $row['Project_Name'] . "</td>";
		echo "</tr>";
	}
	echo '</table>';
	
	$result4= mysqli_query($conn, "SELECT * FROM vehicle");
	echo '<table>
	<tr>
		<th>Vehicle ID</th>
		<th>Make</th>
		<th>Model </th>
		<th>Year</th>
		<th>Color</th>
		<th>Plate Number</th>
	</tr>';
	while ($row = mysqli_fetch_array($result4)) {
		$id=$row['Vehicle_ID'];
		echo "<tr>";
		echo "<td>" . $row['Vehicle_ID'] . "</td>";
		echo "<td>" . $row['Make'] . "</td>";
		echo "<td>" . $row['Model'] . "</td>";
		echo "<td>" . $row['Year'] . "</td>";
		echo "<td>" . $row['Color'] . "</td>";
		echo "<td>" . $row['Plate_Number'] . "</td>";
		echo "</tr>";
	}
	echo '</table>'; 
	?>