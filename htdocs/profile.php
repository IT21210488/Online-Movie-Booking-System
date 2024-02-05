<!DOCTYPE html>
<html>
<head>
	<title>EBooking.lk - My Profile</title>
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
</head>

<body>


	<header><?php include 'html/header.html'; ?></header><br>
	<!-- <h1>My Profile</h1> -->
	<?php require_once 'process.php'; ?>

	<?php 

	if(isset($_SESSION['message'])):

	 ?>

	 <div class="alert">
	 	<?php 
	 		echo $_SESSION['message'];
	 		unset($_SESSION['message']);
	 	?>
	 </div>
	<?php endif ?>

	<?php 

		$C_ID =$_SESSION['userid'];

		$mysqli = new mysqli('localhost', 'root', '', 'Ebookinglk') or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT * FROM customer where C_ID = $C_ID");
		//pre_r($result);

		$rows = array();
		while($row = mysqli_fetch_array($result))
		{
    		$rows[] = $row;
		}
		//print_r($rows);


		foreach($rows as $data){
			//echo $data['FirstName'];
		}
  		
		
	?>

	<div class="row">
		
		<table class="content-table">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Tel No.</th>
					<th>Username</th>
					<th colspan="2">Actions</th>
				</tr>
			</thead>
			
				 	<tr>
				 		<td><?php echo $data['FirstName']; ?></td>
				 		<td><?php echo $data['LastName']; ?></td>
				 		<td><?php echo $data['Email']; ?></td>
				 		<td><?php echo $data['TelNo']; ?></td>
				 		<td><?php echo $data['UserName']; ?></td>
				 		<td>	 			
							<button class="btn-1" onclick="location.href='profile.php?edit=<?php echo $data['C_ID']; ?>'" type="button">EDIT
							</button>
				 			

				 		</td>
				 	</tr>
		</table>

	</div>

	<?php

		function pre_r($array){
			echo '<pre>';
			print_r($array);
			echo '</pre>';
		}

		
	 ?>

	<div class="wrapper">

	<div class="form">
	<form  action="process.php" method="POST">
		<div class="input_field">
		<label>First Name</label>
		<input type="text" name="fname" value="<?php echo $fname; ?>" placeholder="enter first name" class="input">
		</div>
		<div class="input_field">
		<label>Last Name</label>
		<input type="text" name="lname" value="<?php echo $lname; ?>"  placeholder="enter last name" class="input">
		</div>
		<div class="input_field">
		<label>Email</label>
		<input type="text" name="email" value="<?php echo $email; ?>"  placeholder="enter email" class="input">
		</div>
		<div class="input_field">
		<label>Tel No.</label>
		<input type="text" name="tel" value="<?php echo $tel; ?>"  placeholder="enter tel no" class="input">
		</div>
		<div class="input_field">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>"  placeholder="enter username" class="input">
		</div>
		<div class="input_field">
		<?php
		if($update == true): 
		 ?>
			<button class="btn-1" type="submit" name="update">UPDATE</button>
		<?php else: ?>
			<button class="btn-1" type="submit" name="save">SAVE</button>
		<?php endif; ?>
		</div>
	</form>
	</div>
	</div>
	</div>
	<script src="js/homepage.js"></script>
	<footer><?php include 'html/footer.html'; ?></footer>
</body>
</html>