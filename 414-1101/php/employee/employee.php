<!doctype html>
<html lang ="en">
	<head>
		<title>Employee</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../css/style.css" rel="stylesheet" type="text/css"/>
		<link href="../css/searchStyle.css" rel="stylesheet" type="text/css"/>
		<link href="../css/results.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<div id="container">
		<header>
			<div id="logo"><img src="../images/telmon_logo_v1.png" alt="logo"></div> 
			<h1>Howdy, user</h1>
			<h2><?php include 'date.php'?></h2>
		</header>
	<nav>
		<ul>
			<li><a href="home.php">Home</a></li> <!--<img src="images/home2.png" alt="Home"></a></li> -->
			<li><a href="department.php">Department</a></li>
			<li><a href="employee.php">Employees</a></li>
			<li><a href="payroll.php">Payroll</a></li>
			<li><a href="position.php">Positions</a></li>
			<li><a href="project.php">Projects</a></li>
			<li><a href="vehicle.php">Vehicles</a></li>
			<!-- <li><a href="home.html"><img src="images/settings2.png" alt="settings"></a></li> -->
		</ul>
	</nav>
	<button class="openButton" onclick="openForm()">+ Add Employee</button>
	<div class="formPopup" id="createDept">
		<form action="/actionPage.php" class="formContainer">
			<h1>Add Employee</h1>
			
			<label for="Department No."><b>Employee No.</b></label>
			<input type="number" placeholder="Enter Employee #" name="deptNo" required><br>
			<label for="Department Name"><b>First Name</b></label>
			<input type="text" placeholder="Enter First Name" name="deptName" required><br>
			<label for="Department Name"><b>Last Name</b></label>
			<!--<input type="text" placeholder="Enter Last Name" name="deptName" required><br>
			<label for="Office Address"><b>Home Address</b></label> -->
			<input type="text" placeholder="Enter Home Address" name="deptAddr"><br>
			<label for="Phone Number"><b>Phone Number</b></label>
			<input type="number" placeholder="Enter Phone #" name="deptPhone"><br>
			<label for="Department Supervisor"><b>Group</b></label>
			<input type="text" placeholder="Enter Group" name="deptsupr" required><br>
		
		<center><button type="submit" class="btn save">Save</button>
		<button type="button" class="btn cancel" onclick="closeForm()">Cancel</button></center>
		</form>
		</div>
	<div id="search">
		<h1><center>Search Employees</center></h1>
		<form method="POST" action="search.php">
			<label>Employee No: </label><input type="text" id="dNo" name="dNo"> 
			<label>Employee Name: </label><input type="text" id="dName" name="dName">
			<label>Address: </label><input type="text" id="dAddr" name="dAddr">
			<label>Phone Number: </label><input type="text" id="dPhone" name="dPhone">
			<label>Group: </label><input type="text" id="dSuper" name="dSuper">
			<input type="submit" id="searchButton" value="Search">
	</div>
	<!--<table id="department">
		<tr>d
			<th>EID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Address</th>
			<th>Phone Number</th>
			<th>Group</th>
			<th></th>
		</tr>
		<tr>
			<td>1</td>
			<td>Holly</td>
			<td>Dickey</td>
			<td>5741 Woodward St Merriam, KS 66202</td>
			<td>913-957-0388</td>
			<td>ETS</td>
			<td class="details"><a href="empRec.html">View Details</a></td>
		<tr>
			<td>2</td>
			<td>Randy</td>
			<td>Marsh</td>
			<td>2001 E. Bonanaza St South Park, CO 80440</td>
			<td>123-456-7891</td>
			<td>ETS</td>
			<td class="details"><a href="empRec.html">View Details</a></td>
		</tr>
		<tr>
			<td>3</td>
			<td>Peter</td>
			<td>Griffin</td>
			<td>31 Spooner St Quahog, RI 00093</td>
			<td>234-567-8912</td>
			<td>CBG</td>
			<td class="details"><a href="empRec.html">View Details</a></td>
		</tr>
		<tr>
			<td>4</td>
			<td>Francine</td>
			<td>Smith</td>
			<td>416 Cherry St Langley Falls, VA 23665</td>
			<td>345-678-9123</td>
			<td>ORS</td>
			<td class="details"><a href="empRec.html">View Details</a></td>
		</tr> -->
	</table>
		<!--<script>
			function openForm(){
			document.getElementById("createDept").style.display="block";}
			function closeForm() {
			document.getElementById("createDept").style.display="none";} -->
		</script>
	<footer>
		<p>&copy; 2018 Telmon ERIS</p>
	</footer>
	
		</div>
	
	</body>
</html>