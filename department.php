<!doctype html>
<html lang ="en">
	<head>
		<title>Department</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../../css/pageStyle.css" rel="stylesheet" type="text/css"/>
		<link href="../../css/searchStyle.css" rel="stylesheet" type="text/css"/>
		<link href="../../css/resultStyle.css" rel="stylesheet" type="text/css"/>
		<?php include '../headerFooter.php'?>
	</head>
	
	<!--Click button to add department record -->
	<button class="openButton" onclick="openForm()"> + Add Department</button> 
	<div class="formPopup" id="createDept"> 
		<form action="addDept.php" method="post" class="formContainer">
			<h1>Add Department</h1>
			<label for="Department No."><b>Department No.</b></label>
			<input type="number" placeholder="Enter Department #" name="deptNo" required><br>
			<label for="Department Name"><b>Department Name</b></label>
			<input type="text" placeholder="Enter Department Name" name="deptName" required><br>
			<label for="Office Address"><b>Office Address</b></label>
			<input type="text" placeholder="Enter Office Address" name="deptAddr"><br>
			<label for="Phone Number"><b>Phone Number</b></label>
			<input type="number" placeholder="Enter Office Phone" name="deptPhone"><br>	
		<center><button type="submit" class="btn save">Save</button>
		<button type="button" class="btn cancel" onclick="closeForm()">Cancel</button></center>
		</form>
		<script>
			function openForm(){
			document.getElementById("createDept").style.display="block";}
			function closeForm() {
			document.getElementById("createDept").style.display="none";}
		</script> 
		</div>

<!--SEARCH DEPARTMENTS
Displays results on another page. Leaving this commented out for now because for some reason it runs when you click the update button. 
I think it's probably a simple fix I just haven't looked into it yet.
	<div id="search">
		<h1><center>Search Departments</center></h1>
		<form method="POST" action="searchDept.php">
			<label>Department No: </label><input type="text" id="dNo" name="dNo"> 
			<label>Department Name: </label><input type="text" id="dName" name="dName">
			<label>Address: </label><input type="text" id="dAddr" name="dAddr">
			<label>Phone Number: </label><input type="text" id="dPhone" name="dPhone">
			<input type="submit" id="searchButton" name="search" value="Search">
	</div> 
	
	<!--Display all department info by default on main department page-->
	<?php 
	echo '<link rel="stylesheet" type = "text/css" href="../css/results.css">';
	echo '<link rel="stylesheet" type = "text/css" href="../css/searchStyle.css">';
	echo '<link rel="stylesheet" type = "text/css" href="../css/style.css">';
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "telmon_database";

	$conn = new mysqli($servername, $username, $password, $dbname);
	$result= mysqli_query($conn, "SELECT Dept_ID, Dept_Name, Office_Addr, Office_Phone FROM department");
	echo '<table>
	<tr>
		<th>Department Number</th>
		<th>Department Name</th>
		<th>Office Address</th>
		<th>Office Phone</th>
		<th></th>
		<th></th>
	</tr>';
	while ($row = mysqli_fetch_array($result)) {
		$d = $row['Dept_ID'];
		$n = $row['Dept_Name'];
		$a = $row['Office_Addr'];
		$p = $row['Office_Phone'];	
		echo "<tr>";
		echo "<td>" . $row['Dept_ID'] . "</td>";
		echo "<td>" . $row['Dept_Name'] . "</td>";
		echo "<td>" . $row['Office_Addr'] . "</td>";
		echo "<td>" . $row['Office_Phone'] . "</td>";
	    echo "<td class='details'><a href='UpdateForm.php?id=$d'>Update</a></td>";
	  //echo "<td class='details'><a href='deleteDept.php'>Delete Record</a></td>";
		//echo "<td class='details'><button class='openButton' onclick='openForm2()'> Update Department</button></td>"; //update button pulls up form when clicked
		echo "<td class='details'><button class='openButton' onclick= 'openForm3()'>Delete</button></td>"; //delete button pulls up form when clicked
		echo "</tr>";
	}
	echo '</table>'; ?>	
	
<!--UPDATE DEPARTMENT POPUP FORM -->
<!--This is the form Jennifer created. I just put it in the main file instead of a separate file.--> 
	<div class="formPopup" id="updateDept"> 
	<form action="updateDept.php" method="POST">
        <div>
          <label for="number">Department Number:</label> <input type="text" id="dep_number" name="dep_number" value="<?php echo htmlspecialchars($d); ?>">
        </div>
        <div>
          <label for="name">Department Name:</label> <input type="text" id="dep_name" name="dep_name" value="<?php echo htmlspecialchars($n); ?>">
        </div>
        <div>
          <label for="address">Office Address:</label> <input    type="text" id="address" name="address" value="<?php echo htmlspecialchars($a); ?>">
        </div>
        <div>
          <label for="phone">Office Phone:</label> <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($p); ?>">
        </div>
		<button type="submit" class="btn save">Save</button>
		<button type="button" class="btn cancel" onclick="closeForm2()">Cancel</button>
    </form>
		<script>
			function openForm2(){
			document.getElementById("updateDept").style.display="block";}
			function closeForm2() {
			document.getElementById("updateDept").style.display="none";}
		</script> 
		
	</div>
	
	<!--DELETE POPUP FORM -->
	<!--Delete button is displayed on each record but currently this is only set to delete department 8 when you run it.
	The popup form asks if you want to delete before it performs the action -->
	<div class="formPopup" id="deleteDept"> 
	<form action="deleteDept.php" method="POST">
		<p>Are you sure you want to delete?</p>
		<button type="submit" class="btn save">Save</button>
		<button type="button" class="btn cancel" onclick="closeForm3()">Cancel</button>
    </form>
		<script>
			function openForm3(){
			document.getElementById("deleteDept").style.display="block";}
			function closeForm3() {
			document.getElementById("deleteDept").style.display="none";}
		</script> 
		</div>	
	</body>
</html>
