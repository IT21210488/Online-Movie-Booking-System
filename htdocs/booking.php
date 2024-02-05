<!DOCTYPE html>
<html>
<head>
	<title>EBooking.lk - My Bookings</title>
	
	
	<link href="css/common.css"type="text/css" rel="stylesheet">
    <link href="css/footer.css"type="text/css" rel="stylesheet">
    <link href="css/header.css"type="text/css" rel="stylesheet">
    
</head>
<body>
	<header><?php include 'html/header.html'; ?></header><br>
	<?php require_once 'bookingProcess.php'; ?>

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

		$C_ID = $_SESSION['userid'];
		//echo $_SESSION['userid'];
		
		$mysqli= new mysqli('localhost', 'root', '', 'Ebookinglk') or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT B_ID, MovieName, TheatreName, Time, SeatNo FROM booking b, movie m, customer c, theatre t where b.C_ID =$C_ID AND b.C_ID = c.C_ID AND b.M_ID = m.M_ID AND b.T_ID = t.T_ID;");
		//pre_r($result);

		// $rows = array();
		// while($row = mysqli_fetch_array($result))
		// {
  //   		$rows[] = $row;
		// }
		// //print_r($rows);


		// foreach($rows as $data){
		// 	//echo $data['FirstName'];
		// }
  		
		
	?>

	<div class="row">
		
		<table class="content-table">
			<thead>
				<tr>
					<th>Booking No.</th>
					<th>Movie</th>
					<th>Theatre</th>
					<th>Time</th>
					<th>Seat No.</th>
					<th colspan="2">Actions</th>
				</tr>
			</thead>
			<?php 
			while($row = $result->fetch_assoc()): ?>
				 	<tr>
				 		<td><?php echo $row['B_ID']; ?></td>
				 		<td><?php echo $row['MovieName']; ?></td>
				 		<td><?php echo $row['TheatreName']; ?></td>
				 		<td><?php echo $row['Time']; ?></td>
				 		<td><?php echo $row['SeatNo']; ?></td>
				 		<td>	 			
							<button class="btn-1" onclick="location.href='booking.php?edit=<?php echo $row['B_ID']; ?>'" type="button">EDIT
							</button>
							<button class="btn-1" onclick="location.href='bookingProcess.php?delete=<?php echo $row['B_ID']; ?>'" type="button">DELETE
							</button>
				 			

				 		</td>
				 	</tr>
			<?php endwhile ?>
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
	<form action="bookingProcess.php" method="POST">
		<input type="hidden" name="B_ID" value="<?php echo $B_ID; ?>">
		<!-- div class="input_field">
		<label>Theatre</label>
		<input type="text" name="theatre" value="<?php echo $theatre; ?>" placeholder="enter theatre">
		</div> -->
		<div class="input_field">
		<label>Time</label>
		<input type="text" name="time" value="<?php echo $time; ?>"  placeholder="enter time" class="input">
		</div>
		<div class="input_field">
		<label>Seat No.</label>
		<input type="text" name="seatno" value="<?php echo $seatno; ?>"  placeholder="enter seat no." class="input">
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
	<script src="js/homepage.js"></script>
	<footer><?php include 'html/footer.html'; ?></footer>
</body>
</html>