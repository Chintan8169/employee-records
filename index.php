<?php
require 'Partials/_navbar.php';
require 'Partials/_dbconnect.php';
$existemp = false;
if (isset($_POST['empid'])) {
	$empid = $_POST['empid'];
	$name = $_POST['name'];
	$dept = $_POST['dept'];
	$designation = $_POST['designation'];
	$sql = "SELECT `empid` FROM `employeelist` WHERE `empid`='$empid'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$existemp = true;
	} else {
		$existemp = false;
		$sql = "INSERT INTO `employeelist` (`empid`, `name`, `dept`, `designation`, `dt`) VALUES ('$empid', '$name', '$dept', '$designation', current_timestamp())";
		$result = mysqli_query($conn, $sql);
	}
}
?>


<title>Add Employee</title>

<body>
	<?php
	if (isset($_POST['empid'])) {
		if (!$existemp) {
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Success !</strong> Added Employeee successfully.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>';
		} else {
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Error !</strong> Employee already exists.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>';
		}
	}
	?>
	<div class="container my-3">
		<form action="/addemployee.php" method="post">
			<div class="form-group">
				<label for="empid">Employee ID</label>
				<input class="form-control" name="empid" class="empid" type="number" required>
			</div>
			<div class="form-group">
				<label for="name">Employee Name</label>
				<input class="form-control" name="name" class="name" type="text" required>
			</div>
			<div class="form-group">
				<label for="dept">Employee Department</label>
				<input class="form-control" name="dept" class="dept" type="text" required>
			</div>
			<div class="form-group">
				<label for="designation">Employee Designation</label>
				<input class="form-control" name="designation" class="designation" type="text" required>
			</div>
			<button type="submit" class="btn btn-primary">Add Employee</button>

		</form>
	</div>
</body>