<?php
require 'Partials/_navbar.php';
require 'Partials/_dbconnect.php';
?>
<title>Show Employee Details</title>

<body>
	<div class="container my-3">
		<?php
		$sql = 'SELECT * FROM `employeelist`';
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			echo '<table class="table">';
			echo '	<thead class="thead-dark">';
			echo '		<tr>';
			echo '			<th scope="col">Employee ID</th>';
			echo '			<th scope="col">Employee Name</th>';
			echo '			<th scope="col">Employee Department</th>';
			echo '			<th scope="col">Employee Designation</th>';
			echo '		</tr>';
			echo '	</thead>';
			echo '	<tbody>';
			while ($row = mysqli_fetch_array($result)) {
				echo '		<tr>';
				echo '			<td>' . $row['empid'] . '</td>';
				echo '			<td>' . $row['name'] . '</td>';
				echo '			<td>' . $row['dept'] . '</td>';
				echo '			<td>' . $row['designation'] . '</td>';
				echo '		</tr>';
			}
			echo '	</tbody>';
			echo '</table>';
		} else {
			echo '<div class="alert alert-danger" role="alert">
						There is none employee details added.<br>
						Please add some employee details
				</div>';
		}
		?>
	</div>
</body>