<?php
date_default_timezone_set("America/Chicago");
echo '<body>
		<div id="container">
		<header>
			<div id="logo"><img src="../images/telmon_logo_v1.png" alt="Telmon"></div> 
			<h1>Howdy,user</h1>';
			echo "<h2>" . date("m-d-y") . "</h2>";
			echo "<h2>" . date("h:s a") . "</h2>";
			echo '</header>';
echo '<nav>
		<ul>
			<li><a href="home.php">Home</a></li> 
			<li><a href="department.php">Department</a></li>
			<li><a href="employee.php">Employees</a></li>
			<li><a href="payroll.php">Payroll</a></li>
			<li><a href="position.php">Positions</a></li>
			<li><a href="project.php">Projects</a></li>
			<li><a href="vehicle.php">Vehicles</a></li>
		</ul>
	</nav>
	</div>
	</body>';

echo '<footer>
		<p>&copy; 2018 Telmon ERIS</p>
	</footer>';


?>