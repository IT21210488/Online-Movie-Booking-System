<?php 

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'Ebookinglk') or die(mysqli_error($mysqli));

$C_ID = $_SESSION['userid'];
$update=false;
$fname='';
$lname='';
$email='';
$tel='';
$username='';

if(isset($_POST['save'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$username = $_POST['username'];

	$_SESSION['message'] = "Saved";
	$_SESSION['msg_type'] = "Success";

	header("location: profile.php");	
}

if(isset($_GET['edit'])){
	$C_ID = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM customer WHERE C_ID = $C_ID");
	if($result->num_rows == 1){
		$row = $result->fetch_array();
		$fname = $row['FirstName'];
		$lname = $row['LastName'];
		$email = $row['Email'];
		$tel = $row['TelNo'];
		$username = $row['UserName'];
	}
}

if(isset($_POST['update'])){
	$id = $C_ID;
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$username = $_POST['username'];

	$mysqli->query("UPDATE customer SET FirstName='$fname', LastName='$lname', Email='$email', TelNo='$tel', UserName='$username' WHERE C_ID = $C_ID") or die($mysqli->error);

	$_SESSION['message'] = "Updated";
	$_SESSION['msg_type'] = "warning";

	header('location: profile.php');
}

 ?>