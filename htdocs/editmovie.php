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

	$GetMovieNames = "SELECT * FROM movie ORDER BY M_ID DESC LIMIT $plimit,15";
	$GetAllValues = "SELECT M_ID FROM movie";
	$GetMovieNames2 = mysqli_query($db,$GetMovieNames);
	$GetAllValues2 = mysqli_query($db,$GetAllValues);
	$num_of_itm = mysqli_num_rows($GetAllValues2);
	$pages1 = $num_of_itm/15;
	$page2 = ceil($pages1);





	
	?>
<html>
<head>
	<title>EBooking.lk - Edit Movie</title>
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

<body>

	<!-- Header Part -->


	<header class="header-main">
    	<div class="hdr-top">
        	<div class="hdr-left-sec">
            	<img src="../images/logo.png" alt="logo" class="hdr-logo">
        	</div>
        	<div class="hdr-middle-sec">
            	<ul class="hdr-menu-list">
                	<li><a href="#">Home</a></li>
               	 	<li><a href="#">Movie</a></li>
               	 	<li><a href="#">Theater</a></li>
               	 	<li><a href="#">Offers</a></li>
               	 	<li><a href="#">About Us</a></li>
               	 	<li><a href="#">Payment</a></li>
            	</ul>
        	</div>
        	<div class="hdr-right-sec">
            	<a class="hdr-login-link" href="#">login</a>
        	</div>
    	</div>
    	<div class="hdr-bottom">
        	<input class="hdr-search-section" type="text" name="search" placeholder="Search for Movie...">
    	</div>
	</header>


	<!-- Movie List -->

	<a href="home.php">Home Movie</a>
	<a href="addmovie.php">Add Movie</a>
	<a href="editmovie.php">Edite Movie</a>
	<a href="delete.php">Delete Movie</a>

		
		<div class="movielist">
	    	<?php $is = $plimit; ?>
	    	<?php while($MovieList_S = mysqli_fetch_array($GetMovieNames2)): ?>
	    		<?php $is = $is + 1 ; ?>
	      		<p><h5><i><?php echo $is,"." ;?><?php echo '<a href="edit.php?edit='.$MovieList_S[0].'" >'; ?><b><?php echo $MovieList_S[1];?></a></h5></i></b></i></h5>
	      		<h6>Movie Type :-
	      			<?php $GetMovieTypesWord="SELECT TypeName FROM movietype WHERE MT_ID='$MovieList_S[2]'";
	      					$GetMovieTypeDB= mysqli_query($db,$GetMovieTypesWord);
	      					$MovieValue = mysqli_fetch_array($GetMovieTypeDB);
								echo $MovieValue[0];  ?> </h6></p>
				<h6>Run Time :- 
					<?php echo $MovieList_S[3];?>
				</h6>
				<h6>Expiration date :- 
					<?php echo $MovieList_S[4];?>
				</h6>
				<h6>producer :- 
					<?php echo $MovieList_S[5];?>
				</h6>
				<h6>Writer :- 
					<?php echo $MovieList_S[6];?>
				</h6>
				<h6>Music :- 
					<?php echo $MovieList_S[7];?>
				</h6>
				<h6>Story Line :- 
					<?php echo $MovieList_S[8];?>
				</h6>
				<h6>Director :- 
					<?php echo $MovieList_S[9];?>
				</h6>
			<?php endwhile ?>
			</div> 
		
			<div class="pageselect">
			<?php for($b=1 ; $b<=$page2 ; $b++) :?>
				<?php
				if($b == $show_page):?>
				 <?php echo '<a href="editmovie.php?page='.$b.'" >'; ?><font color="red"><?php echo ".".$b."." ;?></a></font>
				<?php elseif($b == ($show_page+1)): ?>
					<?php echo '<a href="editmovie.php?page='.$b.'" >'; ?><font color="blue"><?php echo ".Next Page."; ?></a></font>
				<?php elseif($b == ($show_page-1)): ?>
					<?php echo '<a href="editmovie.php?page='.$b.'" >'; ?><font color="blue"><?php echo ".Previous Page."; ?></a></font>
				<?php else: ?>
					<?php echo '<a href="editmovie.php?page='.$b.'" >'; ?><font color="black"><?php echo ".".$b."."; ?></a></font>
				<?php endif ?>
				<?php endfor ?>
			</div>

<script src="js/homepage.js"></script>
<footer class="ftr-main">
    <div class="ftr-top">
        <div class="ftr-top-sections">
            <h3 class="ftr-top-section-headers">About Us</h3>
            <div class="ftr-top-section-desc">
                Sri Lanka's largest online cinema ticket platform is EBooking.lk. We're partnered with the greatest movie therater to provide our customer with the best cinemetic experience possible. You can view, rate and even make bookings for your favourite movies.
            </div>
            <div class="ftr-top-section-desc">
                Keep and touch with us for the latest updates.
            </div>
        </div>

        <!-- Footer Menu Links Section -->
        <div class="ftr-top-sections">
            <h3 class="ftr-top-section-headers">Menu Links</h3>
            <ul class="ftr-menu-links-ul">
                <li class="ftr-menu-links-list-elements">
                    <a href="#" class="ftr-menu-links">Home</a>
                </li>
                <li class="ftr-menu-links-list-elements">
                    <a href="#" class="ftr-menu-links">Movie</a>
                </li>
                <li class="ftr-menu-links-list-elements">
                    <a href="#" class="ftr-menu-links">Theatre</a>
                </li>
                <li class="ftr-menu-links-list-elements">
                    <a href="#" class="ftr-menu-links">Offers</a>
                </li>
                <li class="ftr-menu-links-list-elements">
                    <a href="#" class="ftr-menu-links">About Us</a>
                </li>
                <li class="ftr-menu-links-list-elements">
                    <a href="#" class="ftr-menu-links">Login</a>
                </li>
                <li class="ftr-menu-links-list-elements">
                    <a href="#" class="ftr-menu-links">Payment</a>
                </li>
            </ul>
        </div>


        <!-- Footer Contact Us Section -->
        <div class="ftr-top-sections">
            <h3 class="ftr-top-section-headers">Contact</h3>
            <div class="ftr-contact-details-tbl">
                <div class="ftr-contact-details-row">
                    <div class="ftr-contact-details-row-key">Phone</div>
                    <div class="ftr-contact-details-row-value">: +94112462872</div>
                </div>
                <div class="ftr-contact-details-row">
                    <div class="ftr-contact-details-row-key">Whatsapp</div>
                    <div class="ftr-contact-details-row-value">: +94775844365</div>
                </div>
                <div class="ftr-contact-details-row">
                    <div class="ftr-contact-details-row-key">Email</div>
                    <div class="ftr-contact-details-row-value">: myemail@domain.com</div>
                </div>
                <div class="ftr-contact-details-row">
                    <div class="ftr-contact-details-row-key">Address</div>
                    <div class="ftr-contact-details-row-value">: No. 100, Sample road, sample street</div>
                </div>
            </div>
        </div>

        <!-- Footer Follow Us Section -->
        <div class="ftr-top-sections">
            <h3 class="ftr-top-section-headers">Follow Us</h3>
            <div class="ftr-top-section-desc">
                You can reach to use via the following social media platforms
            </div>
            <div class="ftr-social-media-icons-sec">
                <div class="ftr-social-media-icons-box">
                    <a href="google.com" class="ftr-social-media-links">
                        <img src="../images/facebook.png" alt="facebook" class="ftr-social-media-icons">
                    </a>
                </div>
                <div class="ftr-social-media-icons-box">
                    <a href="google.com" class="ftr-social-media-links">
                        <img src="../images/instagram.png" alt="instagram" class="ftr-social-media-icons">
                    </a>
                </div>
                <div class="ftr-social-media-icons-box">
                    <a href="google.com" class="ftr-social-media-links">
                        <img src="../images/linkedin.png" alt="linkedin" class="ftr-social-media-icons">
                    </a>
                </div>
                <div class="ftr-social-media-icons-box">
                    <a href="google.com" class="ftr-social-media-links">
                        <img src="../images/twitter.png" alt="twitter" class="ftr-social-media-icons">
                    </a>
                </div>
            </div>
        </div>
        <!-- +++++++++++++++++++++ -->

    </div>
    <div class="ftr-bottom">
        Credited by <span> MLB_WE_01.01_10</span> | all rights reserved!
    </div>
</footer>
		
		
</body>
</html>