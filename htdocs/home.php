<?php ;
$DataBaseName = 'Ebookinglk'; // Data Base Name


$db = mysqli_connect('localhost','root','',$DataBaseName); 









	if(isset($_GET['page'])){
		$show_page=$_GET['page'];
		$plimit = (($show_page*15)-15);}
	if(!isset($_GET['page'])){
		$plimit = 0;
		$show_page = 1;
	}

	$GetMovieNames = "SELECT M_ID,MovieName FROM movie ORDER BY M_ID DESC LIMIT $plimit,15";
	$GetAllValues = "SELECT M_ID FROM movie";
	$GetMovieNames2 = mysqli_query($db,$GetMovieNames);
	$GetAllValues2 = mysqli_query($db,$GetAllValues);
	$num_of_itm = mysqli_num_rows($GetAllValues2);
	$pages1 = $num_of_itm/15;
	$page2 = ceil($pages1);





	
	?>
<html>
<head>
	<title>EBooking.lk - Admin Home</title>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<script src="jquery.js"></script>

	<script type="text/javascript">
		var i=1;
		$(function(){
			$('.ck').click(function(){
				$('.divtext').append("<input type='text' class='cl"+i+"' name='actor"+i+"'/><input type='text' class='cl"+i+"' name='PlayingCharactor"+i+"'/></br>");
				i=i+1;

				document.cookie="actorCount="+i;

			


			})
			
		})
		



		$(function(){
			$('.ty').click(function(){
				$('.divty').append("<input type='text' name='new_movie_type' value=<?php echo $movie_type ?>></br>");
			})
		})
			

		
	</script>
	
</head>
<?php include 'html/header.html';?>
<body>

	<!-- Movie List -->

	<a href="home.php">Home Movie</a>
	<a href="addmovie.php">Add Movie</a>
	<a href="editmovie.php">Edite Movie</a>
	<a href="delete.php">Delete Movie</a>
			
		<div class="movielist">
	    	<?php $is = $plimit; ?>
	    	<?php while($MovieList_D = mysqli_fetch_array($GetMovieNames2)): ?>
	    		<?php $is = $is + 1 ; ?>
	      		<p><h5><i><?php echo $is,"." ;?><?php echo '<a href="deatails.php?MovieID='.$MovieList_D[0].'" >'; ?><b><?php echo $MovieList_D[1];?></a></h5></i></b>
			
			<?php endwhile ?>
			</div> 
		
			<div class="pageselect">
			<?php for($b=1 ; $b<=$page2 ; $b++) :?>
				<?php
				if($b == $show_page):?>
				 <?php echo '<a href="home.php?page='.$b.'" >'; ?><font color="red"><?php echo ".".$b."." ;?></a></font>
				<?php elseif($b == ($show_page+1)): ?>
					<?php echo '<a href="home.php?page='.$b.'" >'; ?><font color="blue"><?php echo ".Next Page."; ?></a></font>
				<?php elseif($b == ($show_page-1)): ?>
					<?php echo '<a href="home.php?page='.$b.'" >'; ?><font color="blue"><?php echo ".Previous Page."; ?></a></font>
				<?php else: ?>
					<?php echo '<a href="home.php?page='.$b.'" >'; ?><font color="black"><?php echo ".".$b."."; ?></a></font>
				<?php endif ?>
				<?php endfor ?>
			</div>
            <script src="js/homepage.js"></script>
<?php include 'html/footer.html';?>	
		
</body>
</html>