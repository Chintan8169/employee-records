<?php
$server = 'localhost';
$username = 'root';
$password = '';
$flag = true;
$tflag = true;
$conn = mysqli_connect($server, $username, $password);
if (!$conn) {
	die("Cant connect to database due to" . mysqli_connect_error());
}
$sql1 = "SHOW DATABASES";
$r1 = mysqli_query($conn, $sql1);
foreach ($r1 as $key => $value) {
	foreach ($value as $k1 => $v1) {
		if ($v1 == 'employeedetails') {
			$flag = false;
		}
	}
}
if ($flag) {
	$cdb = "CREATE DATABASE employeedetails";
	$r2 = mysqli_query($conn, $cdb);
}
$conn = mysqli_connect($server, $username, $password, 'employeedetails');
$sql2 = "SHOW TABLES";
$r3 = mysqli_query($conn, $sql2);
foreach ($r3 as $key => $value) {
	foreach ($value as $k1 => $v1) {
		if ($v1 == 'employeelist') {
			$tflag = false;
		}
	}
}

if ($tflag) {
	$sql3 = 'CREATE TABLE `employeelist` ( `empid` INT(3) NOT NULL ,  `name` VARCHAR(50) NOT NULL ,  `dept` VARCHAR(30) NOT NULL ,  `designation` VARCHAR(30) NOT NULL ,  `dt` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`empid`))';
	$r4 = mysqli_query($conn, $sql3);
// 	$sql4 = ;
// 	$r5 = mysqli_query($conn, $sql4);
}