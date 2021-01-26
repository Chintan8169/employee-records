<?php
require 'Partials/_navbar.php';
require 'Partials/_dbconnect.php';
$existemp = false;
$newexist = false;
if (isset($_POST['oldempid'])) {
	$oldempid = $_POST['oldempid'];
	$newempid = $_POST['newempid'];
	$name = $_POST['name'];
	$dept = $_POST['dept'];
	$designation = $_POST['designation'];
	$sql = "SELECT `empid` FROM `employeelist` WHERE `empid`='$oldempid'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 1) {
		$existemp = true;
		$sql = "SELECT `empid` FROM `employeelist` WHERE `empid`='$newempid'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) == 0) {
			$newexist = false;
			$sql = "UPDATE `employeelist` SET `empid`= '$newempid',`name` = '$name',`dept` = '$dept', `designation` = '$designation' WHERE `employeelist`.`empid` = '$oldempid'";
			$result = mysqli_query($conn, $sql);
		} else {
			$newexist = true;
		}
	} else {
		$existemp = false;
	}
}
?>
<title>Update employee details</title>

<body>
	<?php
	if (isset($_POST['oldempid'])) {
		if ($existemp) {
			if (!$newexist) {
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Success !</strong> Updated Employeee details successfully.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>';
			}
			else {
				echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Error !</strong> New Employee id is already exist.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>';
			}
		} else {
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Error !</strong> Employee does not exists.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>';
		}
	}
	?>
	<div class="container my-3">
		<form action="/Practical10/updatedetails.php" method="post">
			<div class="form-group">
				<label for="oldempid">Enter employee id whose data is wrong.</label>
				<input class="form-control" id="oldempid" name="oldempid" type="number" required>
			</div>
			<div class="form-group">
				<label for="newempid">New Employee ID</label>
				<input class="form-control" name="newempid" class="newempid" type="number" required>
			</div>
			<div class="form-group">
				<label for="name">New Employee Name</label>
				<input class="form-control" name="name" class="name" type="text" required>
			</div>
			<div class="form-group">
				<label for="dept">New Employee Department</label>
				<input class="form-control" name="dept" class="dept" type="text" required>
			</div>
			<div class="form-group">
				<label for="designation">New Employee Designation</label>
				<input class="form-control" name="designation" class="designation" type="text" required>
			</div>
			<button type="submit" class="btn btn-primary">Update Details</button>
		</form>
	</div>
</body>