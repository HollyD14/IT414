<!DOCTYPE html>
<html>
<body>
		<div id="container">
		<header>
			<div id="logo"><img src="../images/telmon_logo_v1.png" alt="Telmon"></div> 
			<h1>Howdy,user</h1>
			 <h3 id="date"></h3>
				<script>
					var d = new Date();
					document.getElementById("date").innerHTML = d;
				</script>
		</header>
	<nav>
		<ul> 
			<li><a href="/php/department.php">Department</a></li>
			<li><a href="/php/employee.php">Employees</a></li>
			<li><a href="/php/payroll.php">Payroll</a></li>
			<li><a href="/php/position.php">Positions</a></li>
			<li><a href="/php/project.php">Projects</a></li>
			<li><a href="/php/vehicle.php">Vehicles</a></li>
		</ul>
	</nav>
	</div>
	</body>

<footer>
		<p>&copy; 2018 Telmon ERIS</p>
	</footer>


</html>
