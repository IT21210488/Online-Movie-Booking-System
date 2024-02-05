<?php 

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'Ebookinglk') or die(mysqli_error($mysqli));

$id=0;
$C_ID = 13;
$update=false;
$theatre='';
$time='';
$seatno='';
if(isset($_POST['save'])){
	$theatre = $_POST['theatre'];
	$time = $_POST['time'];
	$seatno = $_POST['seatno'];

	$_SESSION['message'] = "Saved";
	$_SESSION['msg_type'] = "Success";

	header("location: booking.php");	
}

if(isset($_GET['delete'])){
	$B_ID = $_GET['delete'];
	$mysqli->query("DELETE FROM booking WHERE B_ID = $B_ID");

	$_SESSION['message'] = "Deleted";
	$_SESSION['msg_type'] = "Danger";

	header("location: booking.php");
}

if(isset($_GET['edit'])){
	$B_ID = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT  Time, SeatNo FROM booking b, movie m, customer c, theatre t where b.B_ID = $B_ID AND b.C_ID = c.C_ID AND b.M_ID = m.M_ID AND b.T_ID = t.T_ID;");
	if($result->num_rows == 1){
		$row = $result->fetch_array();
		//$theatre = $row['TheatreName'];
		$time = $row['Time'];
		$seatno = $row['SeatNo'];
	}
}

if(isset($_POST['update'])){
	$B_ID = $_POST['B_ID'];
	$time = $_POST['time'];
	$seatno = $_POST['seatno'];

	$mysqli->query("UPDATE booking SET Time='$time', SeatNo='$seatno' WHERE B_ID = $B_ID") or die($mysqli->error);

	$_SESSION['message'] = "Updated";
	$_SESSION['msg_type'] = "warning";

	header('location: booking.php');
}

 ?>