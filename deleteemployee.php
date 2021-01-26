<?php
require 'Partials/_navbar.php';
require 'Partials/_dbconnect.php';
if (isset($_POST['empid'])) {
	$empid = $_POST['empid'];
	$existemp = false;
	$sql = "SELECT `empid` FROM `employeelist` WHERE `empid`='$empid'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 1) {
		$existemp = true;
		$sql = "DELETE FROM `employeelist` WHERE `employeelist`.`empid` = '$empid'";
		$result=mysqli_query($conn,$sql);
	} else {
		$existemp = false;
	}
}
?>
<title>Delete Employee</title>

<body>
<?php
	if (isset($_POST['empid'])) {
		if ($existemp) {
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Success !</strong> Deleted Employeee successfully.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>';
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
		<form action="/deleteemployee.php" method="post">
			<div class="form-group">
				<label for="empid">Enter Employee id to delete</label>
				<input class="form-control" name="empid" class="empid" type="number" required>
			</div>
			<button type="submit" class="btn btn-primary">Delete Employee Details</button>
		</form>
	</div>
</body>